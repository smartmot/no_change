<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>លក់ចេញ - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>
<?php
require "inc/staff.php";
?>
<?php
require "inc/footer.php"
?>

<div class="p-f w_320 t_20 bc_2 box-s1 z_x_5" id="salary" style="right: calc(50% - 160px)" v-if="pay_progress">
    <div class="pr_20 pl_20 pt_10 pb_10">
        <div class="pb_10 bdbtm_1_blk">
            <div class="ds_f">
                <div class="fm-koulen fs_20">បើកប្រាក់ខែជូន៖</div>
                <div class="flx"></div>
                <div>
                    <div class="h_30 w_30 t_a_c lh_30 hc-danger csr-p" @click="pay_progress = false">
                        <span class="fa fa-close"></span>
                    </div>
                </div>
            </div>
            <div class="fm-smreap">ប្រាក់ខែ ខែ{{date()}}</div>
        </div>
        <div class="pt_10 fm-smreap">

            <div class="ds_f">
                <div class="w_100">
                    <img class="wp_100 box-s4" :src="payto.photo === null ? '<?php echo asset("profile.svg"); ?>' : '<?php echo asset("photo"); ?>/'+payto.photo+'_thumb.jpg'" alt="">
                </div>
                <div class="fm-smreap">
                    <div class="pl_10">
                        <div class="fw_b fs_18">{{payto.name}}</div>
                        <div>{{payto.department}}</div>
                        <div class="pt_5">
                            <img class="h_50" src="<?php echo asset("scan.svg"); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ds_f pt_10">
                <div class="w_100">ភេទ</div>
                <div>: {{payto.gender === "male" ? "ប្រុស" : "ស្រី"}}</div>
            </div>
            <div class="ds_f">
                <div class="w_100">វត្តមាន</div>
                <div>: {{payto.work}}ថ្ងៃ</div>
            </div>
            <div class="ds_f">
                <div class="w_100">ប្រាក់ខែគោល</div>
                <div>: {{numeral(payto.pre_salary).format("$0,0.00")}}</div>
            </div>
            <div class="ds_f pb_10 bdbtm_1_blk">
                <div class="w_100">ប្រាក់ខែ</div>
                <div>: {{numeral((payto.pre_salary/30)*payto.work).format("$0,0.00")}}</div>
            </div>
           <div class="pt_10">
               <label for="pay">បើកប្រាក់ខែ _$</label>
           </div>
            <form action="javascript:void 0" method="post" @submit="pay()">
                <div class="ds_f">
                    <input class="default" type="number" step="any" v-model="paid" id="pay" placeholder="ប្រាក់ខែបើកជាក់ស្ដែង" autofocus>
                </div>
                <div class="pt_10">
                    <label for="date">កាលបរិច្ឆេទ</label>
                </div>
                <div class="ds_f">
                    <input class="default" type="date" step="any" v-model="pay_date" id="date" placeholder="ប្រាក់ខែបើកជាក់ស្ដែង" autofocus>
                </div>

                <div class="pt_5">
                    <label>
                        <input type="checkbox" v-model="continuous">
                        <span>បន្តរបើកទៅអ្នកបន្ទាប់</span>
                    </label>
                </div>
                <div class="pb_20 pt_10">
                    <div class="ds_f">
                        <div class="flx">
                        </div>
                        <div>
                            <button type="submit" class="hbc-danger h_30 lh_30 pr_7 pl_7 fm-smreap oln_n bd_n bc_1 c_2 csr-p b_r_3 progress">
                                <span class="">បើកប្រាក់ខែ</span>
                                <img class="h_25 pt_2 pb_3" src="<?php echo asset("icon/loading.svg"); ?>" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $_accept();
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[4].classList.add("active");
    let salary = new Vue({
        el:"#salary",
        data:{
            payto:[],
            pay_progress:false,
            paid:0,
            pay_date:"<?php echo date("Y-m-d"); ?>",
            index:0,
            errors:[],
            continuous:false
        },
        methods:{
            pay:function (){
                let nis = this;
                axios.post("<?php echo route("salary.store"); ?>", null, {
                    headers:$_i.headers,
                    params:{
                        staff_id:nis.payto.id,
                        for:staff.month,
                        date:nis.pay_date,
                        salary:nis.paid
                    }
                })
                .then(function (paid){
                    if (paid.data.error){
                        nis.errors = paid.data.errors;
                    }else{
                        nis.payto.is_paid = paid.data.paid;
                        staff.staffs[nis.index] = nis.payto;
                        if (nis.continuous){
                            nis.index+=1
                            if (staff.staffs[nis.index]){
                                nis.payto = staff.staffs[nis.index];
                                nis.paid = ((nis.payto.pre_salary/30)*nis.payto.work).toFixed(2);
                                if (nis.payto.is_paid){
                                    nis.pay_progress = false;
                                }
                            }else{
                                nis.pay_progress = false;
                            }
                        }else{
                            nis.pay_progress = false;
                        }
                    }
                }).catch(function (err){
                    alert(err);
                })
            },
            date:function (){
                let str = staff.month.split("-");
                return a_a.month[parseInt(str[1])] + " " + str[0];
            }
        }
    });
    let staff = new Vue({
        el:".mainpg",
        data:{
            staffs:[],
            keyword:"",
            mode:"id",
            month:"<?php echo date("Y-m"); ?>",
        },
        watch:{
            mode:{
                handler(){
                    if (this.keyword !== ''){
                        this.search();
                    }
                }
            },
            month:{
                handler(){
                    this.load();
                }
            },
            keyword:{
                handler(){
                    let nis = this;
                    clearTimeout(this.timer);
                    this.timer = setTimeout(function (){
                        if (nis.keyword === ''){
                            nis.load();
                        }else{
                            nis.search();
                        }
                    },350);
                }
            }
        },
        mounted() {
            let nis = this;
            $_c.watch("config",function (){
                nis.load();
            });
        },
        methods:{
            search:function (){
                let nis = this;
                axios.get("<?php echo route("report.staff") ?>",{
                    headers:$_i.headers,
                    params:{
                        keyword:nis.keyword,
                        mode:nis.mode,
                        month:nis.month
                    }
                }).then(function (result){
                    nis.staffs = result.data;
                }).catch(function (error){
                    alert(error);
                })
            },
            load:function (){
                let nis = this;
                axios.get("<?php echo route("report.staff") ?>",{
                    headers:$_i.headers,
                    params:{
                        month:nis.month
                    }
                }).then(function (result){
                    nis.staffs = result.data;
                }).catch(function (error){
                    alert(error);
                })
            },
            paying:function (indexion){
                salary.payto = this.staffs[indexion];
                salary.pay_progress = true;
                salary.index = indexion;
                salary.paid = ((salary.payto.pre_salary/30)*salary.payto.work).toFixed(2);
            },
            timer:setTimeout(function (){

            },500)
        }
    });
</script>
</body>
</html>
