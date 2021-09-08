<div class="w_320 h_200 bc_2 p-f t_20 z_x_5 box-s3 pop1" style="left: calc(50% - 160px);" v-if="del">
    <div class="pr_20 pl_20 pt_20 pb_20">
        <div class="fm-koulen fs_20 pb_10 bdbtm_1_blk">បញ្ជាក់ការលុប៖</div>
        <div class="fm-smreap t_a_c pt_10 pb_10 bdbtm_1_blk">
            លុបវត្តមាន <span class="fw_b"><?php echo $staff["name"];?></span>
            <br/>
            នៅ ថ្ងៃទី {{ a_a.date(trash.date, "kh") }} ?
        </div>
        <div class="pt_10">
            <div class="ds_f">
                <div class="fx_6">
                    <div class="pr_5">
                        <button @click="del=false" class="pr_10 wp_100 pl_10 pt_1 pb_1 fm-smreap oln_n bd_n fs_14 b_r_3 bc_1 c_2 hbc-danger csr-p"><span class="fa fa-close"></span>&nbsp;ផ្អាក</button>
                    </div>
                </div>
                <div class="fx_6">
                    <div class="pl_5 ds_f">
                        <button @click="goDel()" class="pr_10 wp_100 pl_10 pt_1 pb_1 fm-smreap oln_n bd_n fs_14 b_r_3 bc_1 c_2 hbc-danger csr-p"><span class="fa fa-trash-o"></span>&nbsp;លុប</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" defer>
    let pop1 = new Vue({
        el:".pop1",
        data:{
            trash:[],
            del:false,
            errors:[],
        },
        methods:{
            goDel:function (){
                let nisz = this;
                axios.delete("<?php echo route("del.scan"); ?>",{
                    headers:$_i.headers,
                    params:{
                        staff_id:"<?php echo $staff["id"]; ?>",
                        date:nisz.trash.date
                    }
                }).then(function (deleted){
                    if (deleted.data.error){
                        nisz.errors = deleted.data.errors;
                    }else{
                        nisz.del = false;
                        nisz.trash = [];
                        nisz.errors = [];
                        scanned.load();
                    }
                })
            }
        }
    });
    let scanned = new Vue({
        el:"#scan",
        data:{
            month:"<?php echo date("Y-m"); ?>",
            staff_id:"<?php echo $staff["id"]; ?>",
            scans:[],
        },
        watch:{
            month:{
                handler(){
                    this.load();
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
            load:function (){
                let nsi = this;
                axios.get("<?php echo route("scan.index"); ?>",{
                    headers:$_i.headers,
                    params:{
                        staff_id:nsi.staff_id,
                        month:nsi.month,
                    }
                }).then(function (loaded){
                    if (!loaded.data.error){
                        nsi.scans = loaded.data.scan;
                    }
                }).catch(function (err){
                    alert(err)
                })
            },
            timez:function (valis){
                var timz = valis.split(":");
                var hour = timz[0];
                var a_p = " AM";
                if (hour > 12){
                    hour = hour - 12;
                    a_p = " PM";
                }
                return numeral(hour).format("00") + ":" + numeral(timz[1]).format("00") + a_p;
            },
            trash:function (targ, inx){
                pop1.trash = targ;
                pop1.del = true;
            }
        }
    });
</script>
