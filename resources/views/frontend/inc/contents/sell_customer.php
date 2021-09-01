<div id="customer">
    <div class="rowc">
        <div class="fm-smreap fx_12 t_a_c fs_20 pt_20" v-if="nocus">មិនទាន់មានអតិថិជន</div>
        <div class="xl-2p5 lg-4 md-6 sm-4 fx_6" v-for="cust in customers">
            <div class="pr_10 pl_10 pb_20">
                <div class="pr_10 pl_10 pt_10 pb_10 bc_1 c_2 p-r">
                    <div>
                        <a :href="'<?php echo route("sell.customer"); ?>/c/'+cust.id" class="ds_b t_d_n">
                            <img class="wp_100" v-bind:src="cust.photo == null ? '<?php echo asset(""); ?>/profile.svg' : '<?php echo asset("photo"); ?>/'+cust.photo+'_thumb.jpg'"  alt="">
                        </a>
                    </div>
                    <div class="fm-smreap lh_20 fs_15 pt_5">
                        <div>
                            <a class="t_d_n c_2 hc-warning" :href="'<?php echo route("sell.customer"); ?>/c/'+cust.id">{{ cust.name }}</a>
                        </div>
                        <div class="ds_f">
                            <div class="w_30">ID</div>
                            <div>: {{ numeral(cust.id).format('000') }}</div>
                        </div>

                        <div class="ds_f">
                            <div class="w_30">Tel</div>
                            <div>: {{ cust.tel }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let customer = new Vue({
        el:"#customer",
        data:{
            customers:[],
            params:[],
            nocus:false
        },
        methods:{

        },
        mounted:function (){
            let niiss=this;
            $_c.watch("config", function (){
                axios.get("<?php echo route("customer.index"); ?>", {
                    headers:$_i.headers,
                    params:niiss.params
                }).then(response=>{
                    niiss.customers = response.data;
                    if (response.data.length && response.data.length === 0){
                        niiss.nocus = true;
                    }
                }).catch(function (err){
                    alert(err);
                })
            });
        }
    });
</script>
