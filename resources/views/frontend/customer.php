<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>អតិថិជន - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>

<div class="pt_20 pr_10 pl_10">
    <div id="customer">
        <div class="rowc">
            <div class="wp_100 t_a_c" v-if="customers.length === 0">
                <div class="fm-smreap">គ្មាន អតិថិជន</div>
            </div>
            <div class="xl-2 lg-2p5 md-3 sm-6 fx_12" v-for="cust in customers">
                <div class="pr_10 pl_10 pb_10">
                    <div class="pr_10 pl_10 pt_10 pb_10 bc_1 c_2">
                        <div>
                            <a :href="'<?php echo route("sell.customer"); ?>/c/'+cust.id" class="ds_b t_d_n">
                                <img class="wp_100" v-bind:src="'<?php echo asset("photo"); ?>/'+cust.photo+'_thumb.jpg'"  alt="">
                            </a>
                        </div>
                        <div class="fm-smreap lh_20 fs_15 pt_5">
                            <div>
                                <a :href="'<?php echo route("sell.customer"); ?>/c/'+cust.id" class="t_d_n ds_b c_2 hc-danger">{{ cust.name }}</a>
                            </div>
                            <div class="ds_f">
                                <div class="w_30">ID</div>
                                <div>: 001</div>
                            </div>

                            <div class="ds_f">
                                <div class="w_30">Tel</div>
                                <div>: 010563093</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "inc/footer.php"
?>
<script type="text/javascript" defer>
    $_accept();
    let customer = new Vue({
        el:"#customer",
        data:{
            customers:[],
            params:[]
        },
        methods:{
            load:function (){
                let nis = this;
                axios.get("<?php echo route("customer.index"); ?>", {
                    headers:$_i.headers,
                    params:nis.params
                }).then(response=>{
                    nis.customers = response.data;
                }).catch(function (err){
                    alert(err);
                })
            }
        },
        mounted:function (){
            let nis=this;
            $_c.watch("config",function (){
                nis.load();
            });
        }
    });
</script>
</body>
</html>
