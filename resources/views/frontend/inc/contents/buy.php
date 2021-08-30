<div class="wp_100">
    <div class="rowc" id="suppliers">
        <div class="xl-2 lg-3 md-4 sm-4 fx_6" v-for="supplier in suppliers">
            <div class="pr_10 pl_10 pb_20">
                <div class="bc_1">
                    <div class="pr_10 pl_10 pt_10 pb_10">
                        <a v-bind:href="'<?php echo asset("buy/suppliers", true); ?>/'+supplier.id" class="t_d_n">
                            <img v-bind:src="'<?php echo asset("photo", true); ?>/'+supplier.photo+'_thumb.jpg'" class="wp_100"  alt="">
                        </a>
                        <div class="fm-smreap lh_20 pt_5">
                            <div class="c_2 fs_16">
                                <a v-bind:href="'<?php echo asset("buy/suppliers"); ?>/'+supplier.id" class="t_d_n c_2 hc-danger">
                                    <span>{{supplier.name}}</span>
                                </a>
                            </div>
                            <div class="c_2 fs_14 ds_f">
                                <div class="w_30">ID</div>
                                <div> : {{ supplier.ids }}</div>
                            </div>
                            <div class="c_2 fs_14 ds_f">
                                <div class="w_30">Tel</div>
                                <div> : {{supplier.tel}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" defer>
    let suppliers = new Vue({
        el: ".mainpg",
        data:{
            suppliers:{},
            params:{
                filter:"",
            },
            order:"created_at",
            searchby:"name",
            find:"",
            flt:{
                due:false,
                paid:false,
            },
            status:"",
        },
        watch:{
            find:{
                handler(){
                    clearTimeout(suppliers.timer);
                    suppliers.timer = setTimeout(function (){
                        suppliers.search();
                    },200);
                }
            }
        },
        methods:{
            timer:setTimeout(function(){

            },200),
            load:function () {
                let nis = this;
                let odr = nis.order;
                axios.get("<?php echo route("supplier.index"); ?>", {
                    headers:$_i.headers,
                    params:this.params
                })
                .then(response => {
                    this.suppliers = response.data;
                })
            },
            search:function (){
                axios.get("<?php echo route("supplier.index"); ?>", {
                    headers:$_i.headers,
                    params:{
                        search:this.searchby,
                        find:this.find
                    }
                })
                    .then(response => {
                        this.suppliers = response.data
                    })
            },
            mode:function (){
                if (this.searchby === "name"){
                    this.searchby = "id"
                }else{
                    this.searchby = "name";
                }
            },
            sortz:function(){
                let odr = this.order;
                srtz(this.suppliers,odr);
            },
            filter:function (noof){
                if (noof === "due"){
                    this.flt.paid=false;
                }else{
                    this.flt.due=false;
                }
                if (this.flt.due === true){
                    this.params.filter = "due";
                }else if(this.flt.paid === true){
                    this.params.filter = "paid";
                }else{
                    this.params.filter = "all";
                }
                this.load();
            }
        },
        mounted:function (){
            let ns = this;
            $_c.watch("config",function (){
                ns.load();
            });
        }
    });
</script>
