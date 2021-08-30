<div id="eleapp">

    <div class="p-f wp_100 hp_100 t-0 l-0 z_x_5 box-s1" v-if="ename" style="background-color: rgba(0,0,0,0.70);">
        <div class="cwc bc_4 fm-smreap">
            <form action="javascript:void 0" method="post" autocomplete="off" v-on:submit="eup()">
                <div class="pr_20 pl_20 pt_10 pb_20">
                    <div>
                        <div>
                            <div class="fm-koulen fs_25">កែសម្រួលវិក័យបត្រ៖</div>
                        </div>

                        <div class="pt_10">
                            <label for="name">ឈ្មោះ <span class="c_6" v-if="eerror.name">: {{ eerror.name[0] }}</span></label>
                            <div class="ds_f">
                                <input id="name" v-model="newname" name="name" type="text" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2">
                            </div>
                        </div>

                        <div class="pt_20">
                            <div class="ds_f">
                                <div class="flx"></div>
                                <div>
                                    <button class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="submit">រក្សារទុកកំណែ</button>
                                    <button v-on:click="ename = false" id="reseted" class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="reset">ថយក្រោយ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="p-f wp_100 hp_100 t-0 l-0 z_x_5 box-s1" v-if="onpay" style="background-color: rgba(0,0,0,0.70);">
        <div class="cwc bc_4 fm-smreap">
            <form action="javascript:void 0" method="post" id="payer" autocomplete="off" v-on:submit="ipay()">
                <div class="pr_20 pl_20 pt_10 pb_20">
                    <div>
                        <div>
                            <div class="fm-koulen fs_25">ទូទាត់វិក័យប័ត្រ៖</div>
                            <div class="c_5 fw_b t_a_c">{{ paying.name }}</div>
                        </div>

                        <div class="pt_10">
                            <label for="date">កាលបរិច្ឆេទ<span v-if="payerror.pay_date" class="c_6"> : {{ payerror.pay_date[0] }}</span></label>
                            <div class="ds_f">
                                <input id="date" name="pay_date" type="datetime-local" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2" value="<?php echo date("Y-m-d")."T".date("H:i"); ?>">
                            </div>
                        </div>

                        <div class="pt_10">
                            <label for="paid">ទូទាត់<span v-if="payerror.paid" class="c_6"> : {{ payerror.paid[0] }}</span></label>
                            <div class="ds_f">
                                <div class="w_50 h_30 lh_30 t_a_c bc_2 pt_2 pb_2 c_6">{{ currency[paying.currency] }}</div>
                                <input id="paid" v-on:change="changedue()" name="paid" style="width: calc(100% - 50px)" type="number" class="oln_n bd_n pr_10 fm-smreap h_30 lh_30 pt_2 pb_2" step="any" placeholder="ទូទាត់">
                            </div>
                        </div>

                        <div class="pt_10">
                            <label for="due">ខ្វះ</label>
                            <div class="ds_f">
                                <div class="w_50 h_30 lh_30 t_a_c bc_2 pt_2 pb_2 c_6">{{ currency[paying.currency] }}</div>
                                <input id="due" v-bind:value="duepay" style="width: calc(100% - 50px)" type="number" class="c0x oln_n bd_n pr_10 fm-smreap h_30 lh_30 pt_2 pb_2" step="any" placeholder="ខ្វះ" disabled>
                            </div>
                        </div>

                        <div class="pt_20">
                            <div class="ds_f">
                                <div class="flx"></div>
                                <div>
                                    <button id="reseted" class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="reset" v-on:click="onpay = false">ថយក្រោយ</button>
                                    <button class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="submit">ទូទាត់</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div>
        <div class="fm-smreap" v-if="invoices.length == 0">No data</div>
        <div class="rowc">
            <div class="xl-2p5 lg-3 md-4 sm-6 fx_12" v-for="(invoice, kindx) in invoices">
                <div class="pr_10 pl_10 pb_10">
                    <div class="bc_4 pb_10 pt_10 pr_10 pl_10 p-r">
                        <div class="t_a_r">
                            <button class="lipper" v-on:click="lip = (lip == invoice.id ? false : invoice.id)">
                                <span class="fa fa-ellipsis-h"></span>
                            </button>
                        </div>
                        <div class="p-a t_35 r-0 bc_1 z_x_3 box-s2" v-if="lip == invoice.id" tabindex="1" v-on:blur="lip = false" autofocus>
                            <div class="p-r">
                                <div class="p-a r_19 t-14h fs_19 c_1 z_x-1">
                                    <span class="fa fa-caret-up"></span>
                                </div>
                                <div class="lipitm fm-smreap">
                                    <a v-bind:href="invoice.clink">មើលវិក័យប័ត្រ</a>
                                    <a href="javascript:void 0" v-on:click="update(kindx)">កែសម្រួល</a>
                                    <a href="javascript:void 0" v-on:click="pay(kindx)" v-if="invoice.due > 0">ទូទាត់</a>
                                </div>
                            </div>
                        </div>
                        <a v-bind:href="invoice.link" class="t_d_n">
                            <img class="wp_100 b_r_c box-s1 ho_80 ts_030" v-bind:src="'<?php echo asset("photo"); ?>/'+invoice.photo+'_thumb.jpg'">
                        </a>
                        <div class="pt_5 pb_10">
                            <a class="fm-smreap c_1 fs_18 ds_b t_d_n hc-danger" v-bind:href="invoice.link">{{ invoice.name }}</a>
                            <div class="ds_f fs_12 fm-smreap">
                                <div class="w_50">ID</div>
                                <div class="">: {{ invoice.no }}</div>
                            </div>

                            <div class="ds_f fs_12 fm-smreap">
                                <div class="w_50">កាលប.រិ</div>
                                <div class="">: {{ invoice.date }}</div>
                            </div>

                            <div class="ds_f fs_12 fm-smreap">
                                <div class="w_50">លុយសរុប</div>
                                <div class="">: {{ money(invoice.total, invoice.currency) }}</div>
                            </div>

                            <div class="ds_f fs_12 fm-smreap">
                                <div class="w_50">នៅខ្វះ</div>
                                <div class="">: {{ money(invoice.due, invoice.currency) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    let getbar = new Vue({
        el:"#eleapp",
        data:{
            invoices:{},
            params:{
                id:"<?php echo $supplier->id; ?>",
            },
            lip:false,
            onpay:false,
            paying:[],
            duepay:0,
            currency:{
                usd:"$",
                bath:"បាត",
                riel:"រៀល"
            },
            payindex:0,
            payerror:[],
            newname:"",
            ename:false,
            eindex:0,
            eing:[],
            eerror:[]
        },
        methods:{
            money:function (money, curr){
                switch (curr){
                    case "usd":
                        return "$" + parseInt(money).toFixed(2);
                        break;
                    case "riel":
                        return money + "៛";
                        break;
                    case "bath":
                        return money + "បាត";
                        break;
                }
            },
            pay:function (payto){
                this.onpay = true;
                this.paying = this.invoices[payto];
                this.duepay = this.paying.due;
                this.payindex = payto;
            },
            ipay:function (){
                let tothe = "<?php echo route("payment.index"); ?>";
                let xcc = new FormData(document.getElementById("payer"));
                let niss = this;
                axios.post(tothe,xcc, {
                    headers:$_i.headers,
                    params:{
                        invoice_id:niss.paying.id
                    }
                })
                .then(response=>{
                    if (response.data.error){
                        niss.payerror = response.data.errors;
                    }else{
                        niss.invoices[niss.payindex] = response.data.invoice;
                        niss.paying =[];$("#reseted").click();
                    }
                }).catch(function (err){
                    alert(err);
                });
            },
            changedue:function (){
                this.duepay = this.paying.due - parseInt($("#paid").val());
            },
            eup:function (){
                let lar = this, nurl = "<?php echo route("invoice.index"); ?>/" + this.invoices[this.eindex].id;
                $_i["params"] = {
                    name:lar.newname
                };
                axios.put(nurl,null,$_i)
                    .then(response=>{
                        if (response.data.error){
                            lar.eerror = response.data.errors;
                        }else{
                            lar.ename = false;
                            lar.invoices[lar.eindex].name = lar.newname;
                        }
                    });
                lar.lip = false;
            },
            update:function (upto){
                this.eindex = upto;
                this.ename = true;
                this.newname = this.invoices[upto].name;
            },
        },
        mounted:function (){
            let niis = this;
            setTimeout(function (){
                axios.get("<?php echo route("invoice.index"); ?>", {
                    headers:$_i.headers,
                    params:niis.params
                })
                    .then(response => {
                        niis.invoices = response.data.data;
                    })
                .catch(function (error){
                    alert(error);
                })
            },500);
        }
    });
</script>
