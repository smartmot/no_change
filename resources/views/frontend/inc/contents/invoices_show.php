<div id="mstock">

    <div class="p-f wp_100 hp_100 t-0 l-0 z_x_5 box-s1" v-if="edit" style="background-color: rgba(0,0,0,0.70);">
        <div class="cwc bc_4 fm-smreap">
            <form action="javascript:void 0" method="post" id="editor" autocomplete="off" v-on:submit="editsave()">
                <div class="pr_20 pl_20 pt_10 pb_20">
                    <div>
                        <div>
                            <div class="fm-koulen fs_25">កែសម្រួលឥវ៉ាន់៖</div>
                            <div>
                                <img class="wp_100" v-bind:src="'<?php echo asset("photo"); ?>/'+editto.photo+'_thumb.jpg'" alt="">
                            </div>
                            <div class="c_6 t_a_c">{{ editto.name }}</div>
                        </div>

                        <div class="pt_10">
                            <label for="name">ឈ្មោះ</label>
                            <div class="ds_f">
                                <input id="name" v-bind:value="editto.name" name="name" type="text" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2" v-on:change="cnger()">
                            </div>
                        </div>

                        <div class="pt_20">
                            <div class="ds_f">
                                <div class="flx"></div>
                                <div>
                                    <button class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="submit">រក្សារទុកកំណែ</button>
                                    <button v-on:click="edit = !edit" id="reseted" class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="reset">ថយក្រោយ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="rowc">
        <div class="xl-2p5 lg-4 md-4 sm-6 fx_12" v-for="(stock, si) in stocks">
            <div class="pr_10 pl_10 pb_10 p-r">
                <div class="p-a t-0 r_10">
                    <button type="button" class="oln_n bd_n bc_1 pr_5 pl_5 pt_5 pb_2 csr-p hc-danger" v-on:click="editing(si)">
                        <span class="fa fa-edit"></span>
                    </button>
                </div>
                <div class="pr_10 pl_10 pt_10 pb_10 bc_1">
                    <div>
                        <img v-bind:src="'<?php echo asset("photo"); ?>/'+stock.photo+'_thumb.jpg'" class="wp_100 b_r_c box-s4" alt="">
                    </div>
                    <div class="pt_5 c_2 fm-smreap lh_25">
                        <div class="fm-smreap">{{ stock.name }}</div>
                        <div class="ds_f">
                            <div class="w_40">ID</div>
                            <div>: {{stock.ids}}</div>
                        </div>
                        <div class="ds_f">
                            <div class="w_40">ចំនួន</div>
                            <div>: {{stock.qty}}</div>
                        </div>
                    </div>
                    <div class="t_a_c">
                        <img class="h_35" v-bind:src="'<?php echo asset("photo/b"); ?>/'+stock.barcode_image" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let stocker = new Vue({
        el:"#mstock",
        data:{
            stocks:JSON.parse('<?php echo json_encode($stocks); ?>'),
            edit:false,
            editto:[],
            editerror:[]
        },
        mounted:function (){

        },
        methods:{
            editing:function (eindex){
                this.edit = !this.edit;
                if (this.edit){
                    this.editto = this.stocks[eindex];
                }else {
                    this.editto = [];
                }
            },
            editsave:function (){
                let $_to = "<?php echo route("invoice_item.index"); ?>/"+this.editto.id;
                let nisss = this;
                axios.put($_to,null,{
                    headers:$_i.headers,
                    params:{
                        name:nisss.editto.name,
                    }
                }).then(response=>{
                    let data = response.data;
                    if (data.error){
                        nisss.editerror = data.errors;
                    }else{
                        nisss.editto =[];
                        nisss.edit = false;
                    }
                }).catch(function (err){
                    alert(err);
                })
            },
            cnger:function (){
                this.editto.name = $("#name").val();
            }
        }
    });
</script>
