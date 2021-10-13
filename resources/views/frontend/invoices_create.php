<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>បញ្ចូលវិក័យប័ត្រ - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>

<?php
require "inc/buy.php";
?>

<?php
require "inc/footer.php";
require "inc/component/edit_suplier.php";
?>
<div id="pop5" v-if="opop" class="z_x_5 w_320 h_100 bc_2 p-f r-0 t_20 box-s1 b_r_3" style="left: calc(50% - 160px);height: 410px;">
    <div class="pr_10 pl_10 pt_10 pb_10">
        <div class="h_30 lh_30 fm-smreap pb_10">
            <div class="ds_f">
                <div>ស្វែងរកឥវ៉ាន់</div>
                <div class="flx"></div>
                <div>
                    <button class="default" @click="opop=false;barcode.reset()">
                        <span class="fa fa-close"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="ds_f pb_10">
            <input type="text" placeholder="ស្វែងរក" class="default">
        </div>
        <div class="fm-smreap ovfy_a scb-1 wp_100" style="height: 300px;">
            <div v-for="product in productz">
                <div class="pb_5 pt_5">
                    <div class="ds_f box-s1 hc-danger us_n csr-p" @click="select(product)">
                        <div>
                            <img height="40" :src="'<?php echo asset("photo"); ?>/'+product.photo+'_thumb.jpg'" alt="">
                        </div>
                        <div class="h_40 lh_40">
                            <div class="pl_10 fs_12">{{product.name}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $_accept();
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[0].classList.add("active");
    let prod = new Vue({
        el:"#pop5",
        data:{
            productz:[],
            issearch:false,
            opop:false,
        },
        watch:{
            issearch:{
                handler(){
                    if (this.issearch){
                        barcode.search();
                        barcode.errors = [];
                    }
                }
            }
        },
        methods:{
            select:function (prodc){
                barcode.item = {
                    name:prodc.name,
                    qty:barcode.item.qty,
                    unit_price:prodc.unit_price,
                    photo:prodc.photo,
                    ids:prodc.ids
                };
                $("#img_itm").attr("src", "<?php echo asset("photo"); ?>/"+prodc.photo + ".jpg");
                this.opop = false;
                $("#qty").focus();
            }
        },
    });
    let barcode = new Vue({
        el:"#invoice",
        watch:{
            addstock:{
                handler(){

                }
            }
        },
        data:{
            params:{
                supplier_id:"<?php echo $supplier->id; ?>",
                no:"<?php echo $inv_num; ?>",
                name:"",
                date:"<?php echo date("Y-m-d"); ?>",
                time:"<?php echo date("H:i"); ?>",
                paid:0,
                pay_date:"<?php echo date("Y-m-d"); ?>",
                items:"",
                currency:"",
            },
            errors:[],
            estock:false,
            error:[],
            items:[],
            item:{
                name:"",
                qty:"",
                unit_price:"",
                photo:"",
                ids:"",
            },
            exchange:JSON.parse('<?php echo json_encode(config("pos.exchange")); ?>'),
            searched:[],
        },
        methods:{
            money:function (money,currency){
                switch (currency){
                    case "riel":
                        return numeral(money).format('0,0') + "៛";
                        break;
                    case "usd":
                        return numeral(parseFloat(money)).format('0,0.00$');
                        break;
                    case "bath":
                        return numeral(money).format('0,0') + "បាត";
                        break;
                    default:
                        return numeral(parseFloat(money)).format('$0,0.00');
                        break;
                }
            },
            adds:function (){
                if (this.params.currency === ""){
                    this.estock = true;
                    let nis = this;
                    setTimeout(function (){
                        nis.estock = false;
                    },1800);
                }else{
                    prod.issearch=prod.opop=true;
                    $("#currency").attr("disabled","disabled");
                }
            },
            check:function (){
                let n_itm = this;
                if (prod.issearch){
                    let isExist = n_itm.loto(n_itm.item.ids);
                    if (isExist !== false){
                        n_itm.items[isExist].qty = n_itm.item.qty;
                    }else{
                        n_itm.items.push(n_itm.item);
                    }
                    n_itm.reset();
                    prod.issearch = false;
                }else{
                    axios.post("<?php echo route("item.check"); ?>",null,{
                        headers:$_i.headers,
                        params:n_itm.item
                    }).then(function (checked){
                        if (checked.data.error){
                            n_itm.errors = checked.data.errors;
                        }else{
                            n_itm.items.push(checked.data.data);
                            n_itm.reset();
                        }
                    })
                }
            },
            total:function (){
                let totalz = 0;
                this.items.forEach(function (produ, krp){
                    totalz += produ.qty * produ.unit_price;
                });
                return totalz;
            },
            create:function (){
                let c_nis = this;
                if (this.params.paid > this.total()){
                    this.error["paid"] = ["បង់លុយលើសចំនួន"];
                }else {
                    this.params["items"] = JSON.stringify(this.items);
                    axios.post("<?php echo route("invoice.store") ;?>",null,{
                        headers:$_i.headers,
                        params:this.params
                    }).then(function (created){
                        if (created.data.error){
                            c_nis.error = created.data.errors;
                        }else{
                            window.location.href = "<?php echo route("suppliers.show", $supplier->id) ?>";
                        }
                    }).catch(function (error){
                        alert(error);
                        if (error.response) {
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        }
                    })
                }
            },
            search:function (data={currency: this.params.currency}){
                let nis = this;
                axios.get("<?php echo route("product.search"); ?>",{
                    headers:$_i.headers,
                    params:data
                }).then(function (result){
                    nis.searched = result.data;
                    prod.productz = nis.searched;
                }).catch(function (err){
                    alert(err);
                })
            },
            reset:function (){
                this.item = {
                    name:"",
                    qty:"",
                    unit_price:"",
                    photo:"",
                    ids:("<?php echo $inv_num; ?>" + '-' + (this.items.length+1))
                };
                this.errors = [];
                $("#newbar").attr("src", "<?php echo asset("barcode"); ?>/"+this.item.ids);
                $("#img_itm").attr("src", "<?php echo asset("icon/blank.svg"); ?>");
            },
            loto:function (keyw){
                let nis = this;
                let found = false;
                for (let ix = 0; ix < nis.items.length; ix++){
                    if (nis.items[ix].ids === keyw){
                        found = ix;
                    }
                }
                return found;
            }
        },
        mounted:function (){
            let nis = this;
            this.item.ids = ("<?php echo $inv_num; ?>" + '-' + (this.items.length+1));
            $("#newbar").attr("src", "<?php echo asset("barcode"); ?>/"+this.item.ids);
            $_c.watch("config", function (){
                //nis.search();
            });
        }
    });
</script>
</body>
</html>
