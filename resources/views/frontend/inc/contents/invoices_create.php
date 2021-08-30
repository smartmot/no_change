<div>
    <form id="inv" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input id="thumb" onchange="$('#inv').submit()" type="file" name="upload" accept="image/jpeg" hidden>
        <input type="reset" hidden>
    </form>
    <form id="items" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input id="thumbs" onchange="$('#items').submit()" type="file" name="upload" accept="image/jpeg" hidden>
        <input type="reset" hidden>
    </form>
    <div class="rowc" id="invoice">
        <div class="xl-6 lg-6 md-12 sm-12 fx_12 pb_10">
            <form action="javascript:void 0" method="post" @submit="create()" autocomplete="off">
                <div class="pl_10 cs6">
                    <div class="p-r pb_3">
                        <img id="img_inv" src="<?php echo asset("icon/blank.svg"); ?>" alt="" class="wp_100 box-s4">
                        <div class="p-a b_5" style="right: calc(50% - 15px)">
                            <label for="thumb" class="h_30 w_30 bc_1 c_2 b_r_c lh_30 t_a_c hbc-danger abc-danger csr-p ds_b">
                                <span class="fa fa-camera"></span>
                            </label>
                        </div>
                    </div>
                    <div id="prog" class="h_2 bc_1 ts_050" style="width: 0;"></div>
                    <div class="pt_10">
                        <label for="name" class="fm-smreap">ឈ្មោះបុង<span class="c_1" v-if="error.name"> : {{ error.name[0] }}</span></label>
                        <div class="ds_f">
                            <input type="text" v-model="params.name" name="name" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="name" placeholder="ឈ្មោះបុង">
                        </div>
                    </div>

                    <div class="ds_f">
                        <div class="fx_6">
                            <div class="pt_10 pr_5">
                                <label for="date" class="fm-smreap">កាលបរិច្ឆេទ<span class="c_1" v-if="error.date"> : Required</span></label>
                                <div class="ds_f">
                                    <input type="date" v-model="params.date" name="date" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="date">
                                </div>
                            </div>
                        </div>
                        <div class="fx_6">
                            <div class="pt_10 pl_5">
                                <label for="time" class="fm-smreap">ម៉ោង<span class="c_1" v-if="error.time"> : Required</span></label>
                                <div class="ds_f">
                                    <input type="time" v-model="params.time" name="time" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="time">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ds_f">
                        <div class="fx_6">
                            <div class="pt_10 pr_5">
                                <label for="no" class="fm-smreap">ID<span class="c_1" v-if="error.no"> : {{ error.no[0] }}</span></label>
                                <div class="ds_f">
                                    <input type="text" v-model="params.no" name="no" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="no" placeholder="បញ្ចូល ID">
                                </div>
                            </div>
                        </div>
                        <div class="fx_6">
                            <div class="pt_10 pl_5">
                                <label for="currency" class="fm-smreap">រូបបិយប័ណ្ណ<span class="c_1" v-if="error.currency"> : Invalid</span></label>
                                <div class="ds_f">
                                    <select name="currency" v-model="params.currency" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="currency">
                                        <option value="">រូបបិយប័ណ្ណ</option>
                                        <option value="riel">រៀល</option>
                                        <option value="usd">ដុល្លា</option>
                                        <option value="bath">បាត</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt_10">
                        <div>
                            <table class="fm-smreap invo">
                                <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ឈ្មោះ</th>
                                    <th>ចំនួន</th>
                                    <th>តម្លៃ/ឯកតា</th>
                                    <th>សរុប</th>
                                </tr>
                                </thead>
                                <tbody v-for="(item, index) in items">
                                <tr>
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.qty }}</td>
                                    <td>{{ money(item.unit_price, params.currency) }}</td>
                                    <td>{{ money(item.unit_price * item.qty, params.currency) }}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="t_a_c">សរុប</td>
                                    <td>{{ money(total(), params.currency) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="t_a_c">ទូទាត់</td>
                                    <td>{{ money(params.paid, params.currency) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="t_a_c">នៅខ្វះ</td>
                                    <td>{{ money(total() - params.paid, params.currency) }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="rowc">
                        <div class="xl-6 lg-6 md-6 fx_6">
                            <div class="pr_5">
                                <div class="pt_10">
                                    <label for="paid" class="fm-smreap">ទូទាត់<span class="c_1" v-if="error.paid"> : {{error.paid[0]}}</span></label>
                                    <div class="ds_f">
                                        <input type="number" v-model="params.paid" name="paid" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="paid" placeholder="ទូទាត់" step="any">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl-6 lg-6 md-6 fx_6">
                            <div class="pl_5">
                                <div class="pt_10">
                                    <label for="pay_date" class="fm-smreap">កាលបរិច្ឆេទ<span class="c_1" v-if="error.pay_date"> : Required</span></label>
                                    <div class="ds_f">
                                        <input type="date" v-model="params.pay_date" name="pay_date" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="pay_date" placeholder="កាលបរិច្ឆេទ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt_10">
                        <label for="due" class="fm-smreap">នៅខ្វះ</label>
                        <div class="ds_f">
                            <input type="number" :value="total() - params.paid" name="due" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="due" placeholder="នៅខ្វះ" step="any" disabled>
                        </div>
                    </div>

                    <input type="submit" id="subinv" hidden>
                </div>
            </form>
        </div>
        <div class="xl-6 lg-6 md-12 sm-12 fx_12">
            <form action="javascript:void 0" method="post" @submit="check()" autocomplete="off" >
                <input type="hidden" value="<?php echo csrf_token(); ?>" name="_token">
                <div class="pr_10 cs5">
                    <div class="p-r pb_1">
                        <img id="img_itm" src="<?php echo asset("icon/blank.svg"); ?>" alt="" class="wp_100 box-s4">
                        <div class="p-a b_5" style="right: calc(50% - 15px)">
                            <label for="thumbs" class="h_30 w_30 bc_1 c_2 b_r_c lh_30 t_a_c hbc-danger abc-danger csr-p ds_b">
                                <span class="fa fa-camera"></span>
                            </label>
                        </div>
                    </div>
                    <div id="progs" class="h_2 bc_1 ts_050" style="width: 0;"></div>
                    <div class="pt_5">
                        <div class="fm-smreap c_6" id="error" v-if="errors.photo">សូមបញ្ចូលរូបភាព</div>
                    </div>
                    <input type="hidden" v-model="item.photo" name="photo" id="iphoto">

                    <div class="pt_10">
                        <label for="pname" class="fm-smreap">ឈ្មោះឥវ៉ាន់<span class="c_1" v-if="errors.name"> : {{ errors.name[0] }}</span></label>
                        <div class="ds_f">
                            <input type="text" name="name" v-model="item.name" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="pname" placeholder="ឈ្មោះឥវ៉ាន់">
                        </div>
                    </div>

                    <div class="pt_10">
                        <label for="pids" class="fm-smreap">ID<span class="c_1" v-if="errors.ids"> : {{ errors.ids[0] }}</span></label>
                        <div class="ds_f">
                            <input type="text" name="ids" :value="params.no + '-0' + items.length" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="pids" placeholder="ID" disabled>
                        </div>
                    </div>

                    <div class="rowc">
                        <div class="fx_6">
                            <div class="pr_5">
                                <div class="pt_10">
                                    <label for="qty" class="fm-smreap">ចំនួន<span class="c_1" v-if="errors.qty"> : Invalid</span></label>
                                    <div class="ds_f">
                                        <input type="number" v-model="item.qty" step="any" name="qty" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="qty" placeholder="ចំនួន">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fx_6">
                            <div class="pl_5">
                                <div class="pt_10">
                                    <label for="unit_price" class="fm-smreap">តម្លៃ/ឯកតា<span class="c_1" v-if="errors.unit_price"> : Invalid</span></label>
                                    <div class="ds_f">
                                        <input type="number" step="any" v-model="item.unit_price" name="unit_price" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3" id="unit_price" placeholder="តម្លៃ/ឯកតា">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt_10">
                        <label for="total" class="fm-smreap">សរុប</label>
                        <div class="ds_f">
                            <input type="text" name="total" :value="item.qty*item.unit_price" class="input-1 pr_10 pl_10 pt_3 pb_3 fm-smreap wp_100 box-s4 b_r_3 csr-n" id="total" placeholder="សរុប" disabled>
                        </div>
                    </div>

                    <div class="pt_10" id="barcode">
                        <div class="fm-smreap">Barcode :</div>
                        <div>
                            <img id="newbar" src="" alt="" class="h_40">
                        </div>
                    </div>
                    <input type="submit" id="subitem" hidden>
                    <input type="reset" id="resetitm" hidden>
                </div>
            </form>
            <div class="pr_10 cs5">
                <div class="pt_10">
                    <div class="ds_f">
                        <div class="flx"></div>
                        <div class="pr_10">
                            <label for="subitem" class="fm-smreap pr_20 pl_20 pt_3 pb_3 oln_n bd_n bc_1 c_2 csr-p b_r_3">រក្សារទុក</label>
                        </div>
                        <div class="pl_10">
                            <label for="subinv" class="fm-smreap pr_20 pl_20 pt_3 pb_3 oln_n bd_n bc_1 c_2 csr-p b_r_3">រួចរាល់</label>
                        </div>
                    </div>
                </div>

                <div class="pt_10">
                    <span class="c_1 fm-smreap" v-if="error.items">សូមបញ្ចូលឥវ៉ាន់យ៉ាងតិច១</span>
                </div>
            </div>
        </div>
    </div>
    <div class="h_40 wp_100"></div>
</div>

<div class="cropx box-s1 b_r_5 ds_n closemez">
    <div class="h_30 lh_30">
        <div class="pr_20 pl_20 fm-ubt">Crop Image</div>
    </div>
    <div class="pr_20 pl_20">
        <div class="h_1 bcolor_4"></div>
        <div class="h_10"></div>
    </div>
    <div class="hp_100 wp_100 p-r">
        <div id="">
            <img id="tocropz" class="wp_100 imgcz" src="<?php echo asset("icon/1x1.svg"); ?>" alt="">
        </div>
        <div class="h_50 wp_100">
            <div class="pr_20 pl_20 lh_50">
                <div class="t_a_c">
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" onclick="$('.closemez').fadeOut('fast')">
                        <span>Cancel</span>
                    </button>
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-left"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-right"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" id="cropbtnz">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>


<form action="<?php echo route("upload.crop"); ?>" method="post" id="cordform">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="cord" value="" id="cordz">
</form>

<form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input id="thumb" onchange="$('#coverf').submit()" type="file" name="upload" accept="image/jpeg" hidden>
    <input type="reset" hidden>
</form>


<script type="text/javascript">
    let barcode = new Vue({
        el:"#invoice",
        watch:{

        },
        data:{
            params:{
                supplier_id:"<?php echo $supplier->id; ?>",
                no:"",
                name:"",
                date:"<?php echo date("Y-m-d"); ?>",
                time:"<?php echo date("H:i"); ?>",
                paid:0,
                pay_date:"<?php echo date("Y-m-d"); ?>",
                items:"",
                currency:"",
            },
            errors:[],
            error:[],
            items:[],
            item:{
                name:"",
                qty:"",
                unit_price:"",
                photo:""
            },
            exchange:JSON.parse('<?php echo json_encode(config("pos.exchange")); ?>'),
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
            check:function (){
                let n_itm = this;
                axios.post("<?php echo route("item.check"); ?>",null,{
                    headers:$_i.headers,
                    params:n_itm.item
                }).then(function (checked){
                    if (checked.data.error){
                        n_itm.errors = checked.data.errors;
                    }else{
                        n_itm.items.push(checked.data.data);
                        n_itm.item = {
                            name:"",
                            qty:"",
                            unit_price:"",
                            photo:""
                        };
                        $("#img_itm").attr("src", "<?php echo asset("icon/blank.svg"); ?>");
                    }
                })
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
            }
        },
        mounted:function (){

        }
    });


    var url = "<?php echo asset("icon/16x9_pulse.svg"); ?>",
        image = document.getElementById("tocropz"),
        crop, cdata = {};
    $("#cropbtnz").click(function (){
        f.r({
            d:function (resp){
                if (!resp.error){
                    $("#img_itm").attr("src", "<?php echo asset("icon/1x1_pulse.svg"); ?>");
                    $(".closemez").fadeOut();
                    crop.destroy();
                    img.load("<?php echo asset("photo")."/"; ?>"+resp.url, function (){
                        $("#iphoto").attr("value",resp.url);
                        barcode.item.photo = resp.url;
                        $("#error").text("");
                        $("#img_itm")
                            .attr("src", '<?php echo asset("photo").'/'; ?>'+resp.url);
                        $("#progs")
                            .removeClass("ts_050")
                            .css("width", "0");
                        setTimeout(function (){
                            $("#progs").addClass("ts_050");
                        },1000);
                    });
                }else {
                    crop.destroy();
                }
            },
            p:function (pro,status){
                $("#progs").css("width", status+"%");
            },
        },{x:f.f($("#cordform")),m:"post",t:"json",target:"<?php echo route("item.crop"); ?>"});
    })
        .prev().click(function (){
        crop.rotateTo(cdata.r + 90);
    })
        .prev().click(function (){
        crop.rotateTo(cdata.r - 90);
    });
    $("#inv").submit(function (e) {
        e.preventDefault();
        f.r({
            d:function (data){
                if (!data.error){
                    $("#img_inv").attr("src", "<?php echo asset("icon/1x1_pulse.svg"); ?>").next().show();
                    img.load("<?php echo asset("photo/inv.jpg")."?ver=".date("hism"); ?>", function (){
                        $("#img_inv").attr("src", "<?php echo asset("photo"); ?>/" + data.url);
                        $("#prog")
                            .removeClass("ts_050")
                            .css("width", "0");
                    });
                }else{
                    $("#prog")
                        .removeClass("ts_050")
                        .css("width", "0");
                    setTimeout(function (){
                        $("#prog").addClass("ts_050");
                    },1000);
                    $("#img_inv").attr("src", "<?php echo asset("icon/16x9_pulse.svg"); ?>");
                    $("#error").text(data.upload[0]);
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
            r:function (){
                $("#coverf").find("input[type='reset']").click();
            }
        },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("upload.invoice"); ?>"});
    });

    $("#items").submit(function (e) {
        e.preventDefault();
        f.r({
            d:function (data){
                if (!data.error){
                    url = "<?php echo asset("photo"); ?>/" + data.url;
                    $(".closemez").fadeIn();
                    image.src = "<?php echo asset("icon/1x1_pulse.svg"); ?>";
                    img.load("<?php echo asset("photo")."/"; ?>"+data.url, function (){
                        image.src = url;
                        setTimeout(function (){
                            crop = $f.x(image,function (cord){
                                $("#cordz").attr("value", JSON.stringify(cord));
                            },{
                                ratio:1
                            });
                        }, 200);
                    });

                }else{
                    $("#progs")
                        .removeClass("ts_050")
                        .css("width", "0");
                    setTimeout(function (){
                        $("#progs").addClass("ts_050");
                    },1000);
                    $("#img_itm").attr("src", "<?php echo asset("icon/1x1_pulse.svg"); ?>").next().show();
                    $("#error").text(data.upload[0]);
                }
            },
            p:function (pro,status){
                $("#progs").css("width", status+"%");
            },
            r:function (){
                $("#items").find("input[type='reset']").click();
            }
        },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("upload.items"); ?>"});
    });
</script>
