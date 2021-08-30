<div id="customer">
    <div class="rowc">
        <div class="fm-smreap fx_12 t_a_c fs_20 pt_20" v-if="customers.length === 0">មិនទាន់មានអតិថិជន</div>
        <div class="xl-2p5" v-for="cust in customers">
            <div class="pr_10 pl_10 pb_10">
                <div class="pr_10 pl_10 pt_10 pb_10 bc_1 c_2">
                    <div>
                        <img class="wp_100" v-bind:src="'<?php echo asset("photo"); ?>/'+cust.photo+'_thumb.jpg'"  alt="">
                    </div>
                    <div class="fm-smreap lh_20 fs_15 pt_5">
                        <div>{{ cust.name }}</div>
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
            params:[]
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
                }).catch(function (err){
                    alert(err);
                })
            });
        }
    });
</script>
