<div id="stafd">
    <div class="rowc">
        <div class="xl-2p5 lg-3 md-4 sm-4 fx_4">
            <div class="pr_10 pl_10 pb_10 pt_10">
                <form action="javascript:void 0" method="post" id="docform" @submit="upload()">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="staff_id" value="<?php echo $staff->id; ?>">
                    <div class="bc_1 c_2 box-s1 p-r">
                        <div>
                            <img class="wp_100" src="<?php echo asset("icon/blank.svg"); ?>" alt="">
                        </div>
                        <label for="upload" class="p-a ds_b w_30 h_30 t_a_c lh_30 c_1 fs_20 hc-danger csr-p" style="top: calc(50% - 15px); left: calc(50% - 15px)">
                            <span class="fa fa-camera"></span>
                        </label>
                        <div class="p-a h_3 bc_6 b_3 l-0" id="progzq"></div>
                    </div>
                    <input type="file" id="upload" @change="sub()" name="upload" accept="image/*" hidden>
                    <input type="submit" id="submiter" hidden>
                    <input type="reset" id="reseter" hidden>
                </form>
            </div>
        </div>
        <div class="xl-2p5 lg-3 md-4 sm-4 fx_4" v-for="doc in docs">
            <div class="pr_10 pl_10 pb_10 pt_10">
                <div>
                    <a :href="'<?php echo asset("photo");?>/'+doc.url" class="ds_b t_d_n">
                        <img class="wp_100" :src="'<?php echo asset("photo"); ?>/' + (doc.url).split('.')[0] + '_thumb.' + (doc.url).split('.')[1]" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let documents = new Vue({
        el:"#stafd",
        data:{
            docs:[]
        },
        mounted() {
            this.load();
            let nis = this;
            $("#docform").submit(function (){
                f.r({
                    d:function (done){
                        nis.docs.push(done.data);
                        $("#progzq").css("width", "0");
                        $("#reseter").click();
                    },
                    p:function (pr,status){
                        $("#progzq").css("width", status+"%");
                    }
                },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("doc.store"); ?>"});
            });
        },
        methods:{
            load:function (){
                let nis = this;
                axios.get("<?php echo route("doc.index"); ?>",{
                    params:{
                        _token:"<?php echo csrf_token(); ?>",
                        _method:"get",
                        staff_id:"<?php echo $staff->id; ?>",
                    }
                }).then(function (loaded){
                    nis.docs = loaded.data;
                }).catch(function (err){
                    alert(err);
                });
            },
            sub:function (){
                document.getElementById("submiter").click();
            }
        }
    });
</script>
