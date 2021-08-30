<div id="sell">
    <div class="rowc">
        <div class="xl-6 lg-12 fx_12">
            <div class="cs12">
                <form action="javascript:void 0" method="post" autocomplete="off">
                    <div>
                        <div class="ds_f p-r">
                            <input id="search" v-model="searching" class="input-1 pr_10 pl_10 pt_5 pb_5 fm-smreap h_35 lh_35 box-s4 b_r_5 wp_100" type="text" name="search" placeholder="ស្វែងរក" autocomplete="off" autofocus>
                            <label class="p-a w_30 h_30 lh_30 bc_1 c_2 t_a_c b_r_c" style="top:7.5px; right: 8px">
                                <span class="fa fa-camera"></span>
                            </label>
                        </div>

                        <div class="pt_5" v-if="exist">
                            <div class="fm-smreap c_6">
                                <span>មានក្នុងវិក័យបត្ររួចហើយ</span>
                            </div>
                        </div>

                        <div class="pt_5 fm-smreap">
                            <div class="ds_f">
                                <div class="w_80">
                                    <span>ឈ្មោះ</span>
                                </div>
                                <div>: {{ found.name }}
                                    <span v-if="error" class="c_6">គ្មានក្នុងបញ្ចី</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt_5 fm-smreap">
                            <div class="ds_f">
                                <div class="w_80">
                                    <span>ស្តុក</span>
                                </div>
                                <div>: {{ found.qty }}</div>
                            </div>
                        </div>

                        <div class="pt_5 fm-smreap">
                            <div class="ds_f">
                                <div class="w_80">
                                    <span>តម្លៃ/ឯកតា</span>
                                </div>
                                <div>: <span v-if="found.invoice">{{ money(found.unit_price, found.invoice.currency) }}</span></div>
                            </div>
                        </div>

                        <div class="fm-smreap pt_5">
                            <div class="ds_f">
                                <div class="xl-6 lg-6 md-6 fx_6">
                                    <div class="pr_5">
                                        <label for="qty">ចំនួន <span v-if="e_qty" class="c_6">: សូមបញ្ចូលចំនួន</span></label>
                                        <div class="ds_f">
                                            <input v-model="qty" class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="number" step="any" id="qty" placeholder="ចំនួន">
                                        </div>
                                    </div>
                                </div>
                                <div class="xl-6 lg-6 md-6 fx_6">
                                    <div class="pl_5">
                                        <label for="price">តម្លៃ <span v-if="e_price" class="c_6">: សូមបញ្ចូលតម្លៃ</span></label>
                                        <div class="ds_f">
                                            <input v-model="price" class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="number" step="any" id="price" placeholder="តម្លៃ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt_5">
                            <div class="ds_f">
                                <div class="flx"></div>
                                <div>
                                    <button type="submit" class="pr_20 pl_20 oln_n bd_n fm-smreap pt_3 pb_3 bc_1 c_2 b_r_5 csr-p hbc-warning" @click="add">
                                        <span v-if="!exist">បន្ថែម</span>
                                        <span v-if="exist">រក្សារកំណែរ</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="h_1 wp_100 bc_1 mt_10"></div>
                <form action="javascript:void 0" method="post">
                    <div class="pt_10 ds_f">
                        <div class="xl-6 fx_6">
                            <div class="ds_f pr_10">
                                <button class="t_a_c wp_100 hbc-secondary hc-light lh_35 csr-p fm-smreap oln_n bd_n h_35 b_r_5 box-s4" type="button">អតិថិជនចាស់</button>
                            </div>
                        </div>
                        <div class="xl-6 fx_6">
                            <div class="ds_f pl_10">
                                <button class="t_a_c wp_100 hbc-secondary hc-light lh_35 csr-p fm-smreap oln_n bd_n h_35 b_r_5 box-s4" type="button">អតិថិជនថ្មី</button>
                            </div>
                        </div>
                    </div>

                    <div class="pt_5 ds_f fm-smreap">
                        <div class="xl-6 lg-6 md-6 sm-6 fx_6">
                            <div class="pr_10">
                                <label for="paid">ទូទាត់</label>
                                <div class="ds_f">
                                    <input :max="total()" min="0" v-model="paid" class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="number" step="any" id="paid" placeholder="ទូទាត់">
                                </div>
                            </div>
                        </div>
                        <div class="xl-6 lg-6 md-6 sm-6 fx_6">
                            <div class="pl_10">
                                <label for="currency">រូបបិយប័ណ្ណ</label>
                                <div class="ds_f">
                                    <select class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" v-model="currency" id="currency">
                                        <option value="riel">រៀល</option>
                                        <option value="usd">ដុល្លា</option>
                                        <option value="bath">បាត</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt_10 fm-smreap">
                        <label for="note">ចំណាំ៖</label>
                        <div class="ds_f">
                            <input v-model="note" class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="text" id="note" placeholder="ចំណាំ" name="note">
                        </div>
                    </div>
                    <div class="h_30 wp_100"></div>

                </form>
            </div>
        </div>

        <div class="xl-6 lg-12 fx_12">
            <div class="cs12">
                <div class="box-s4 b_r_3" style="min-height: 470px;height: auto">
                    <div class="fm-smreap pr_20 pl_20">
                        <div class="lh_20 t_a_c">
                            <div class="fw_b pt_20 fs_18">វិក័យប័ត្រ</div>
                            <div class="fs_14">
                                <span>អាសយដ្ឋាន : ទួលគោកភ្នំពេញ</span>
                            </div>
                            <div class="fs_14">ទូរស័ព្ទលេខ : 010 563 093</div>
                        </div>

                        <div class="pt_5 fs_14">
                            <table class="invmini">
                                <thead>
                                <tr>
                                    <th colspan="2" style="text-align: left">ឈ្មោះ / មុខទំនិញ</th>
                                    <th class="t_a_c">ចំនួន</th>
                                    <th class="t_a_r">តម្លៃ</th>
                                    <th class="t_a_r">សរុប&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, ikey) in items">
                                    <td>{{ ikey + 1 }}</td>
                                    <td>{{ item.info.name }}</td>
                                    <td>{{ item.qty }}</td>
                                    <td>{{ money(item.price, item.info.invoice.currency) }}</td>
                                    <td>{{ money(item.qty*item.price, item.info.invoice.currency) }}</td>
                                </tr>
                                <tr v-if="items.length < 3">
                                    <td>{{ items.length + 1 }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr v-if="items.length < 4">
                                    <td>{{ items.length + 2 }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr v-if="items.length < 5">
                                    <td>{{ items.length + 3 }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="3"></th>
                                    <th class="t_a_r">សរុប</th>
                                    <th class="t_a_r">{{ money(total(), currency) }}</th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th class="t_a_r">ទូទាត់</th>
                                    <th class="t_a_r">{{ money(paid, currency) }}</th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th class="t_a_r">ខ្វះ</th>
                                    <th class="t_a_r">{{ money(total() - parseFloat(paid), currency) }}</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="h_30 wp_100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt_20 pb_20 t_a_r">
                    <button class="csr-p oln_n bd_n pr_20 pl_20 pt_4 pb_4 b_r_3 fs_16 bc_1 c_2" @click="save()"><span class="fa fa-print"></span>&nbsp;Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let receipt= new Vue({
        el:"#sell",
        data:{
            searching:"",
            found:[],
            timer:setTimeout(function (){},700),
            error:false,
            items:[],
            price:"",
            qty:"",
            e_price:false,
            e_qty:false,
            exist:false,
            currency:"usd",
            exchange:JSON.parse('<?php echo json_encode(config("pos.exchange")); ?>'),
            paid:0,
            customer:[],
            note:"",
        },
        watch:{
            searching:{
                handler(){
                    clearTimeout(this.timer);
                    let nsz = this;
                    this.timer = setTimeout(function (){
                        if (nsz.searching !== ""){
                            nsz.find();
                        }else{
                            nsz.found =[];
                            nsz.error =false;
                            if (nsz.exist){
                                nsz.exist = false;
                                nsz.reset();
                            }
                        }
                    },100);
                },
            }
        },
        mounted:function (){
            $("#search").focus();
        },
        methods:{
            find:function (){
                let param = {
                    action:"find",
                    ids:this.searching
                };
                axios.get("<?php echo route("invoice_item.index"); ?>", {
                    headers:$_i.headers,
                    params:param
                }).then(response=>{
                    if (response.data.error){
                        this.error = true;
                        this.found = [];
                        if (this.exist){
                            this.exist = false;
                            this.price = "";this.qty = "";
                        }
                    }else{
                        this.found = response.data.data;
                        this.error = false;
                        if (this.check()){
                            this.exist = true;
                            this.price = this.check().price;
                            this.qty = this.check().qty;
                        }else{
                            this.exist = false;
                            this.price = "";this.qty = "";
                        }
                    }
                })
            },
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
            add:function (){
                let no_err=true;
                if (this.price === ""){
                    this.e_price = true;
                    no_err=false;
                }else{
                    this.e_price = false;
                }
                if (this.qty === "" || this.qty <= 0){
                    this.e_qty = true;
                    no_err=false;
                }else{
                    this.e_qty = false;
                }
                if (this.exist && no_err){
                    no_err = false;
                    this.check().qty = this.qty;
                    this.check().price = this.price;
                    this.reset();
                    this.exist = false;
                    $("#search").focus();
                }
                if (this.found.name && no_err){
                    let itm = {
                        item_id:this.found.id,
                        price:this.price,
                        qty:this.qty,
                        info:this.found
                    };
                    this.items.push(itm);
                    this.reset();
                    $("#search").focus();
                }else{
                    if (!this.found.name){
                        this.e_price = this.e_qty = false;
                    }
                }
            },
            check:function (){
                let keyw = this.searching;
                return this.items.find(function (products){
                    return products.info.ids === keyw;
                });
            },
            reset:function (){
                this.found = [];
                this.price = "";
                this.qty = "";
                this.searching = "";
            },
            total:function (){
                let total = 0, nis = this.exchange;
                let nszz = this;
                this.items.forEach(function (itm, ikey){
                    total += nszz.change(itm.qty * itm.price,itm.info.invoice.currency);
                });
                return total;
            },
            change:function (money, change_from){
                let change_to = this.currency;
                let from_to = change_from + "_" + change_to;
                let changed = money;
                let rate=this.exchange;
                switch (from_to){
                    case "riel_usd":
                        changed = money/rate.riel_usd;
                        break;
                    case "riel_bath":
                        changed = money/rate.riel_bath;
                        break;
                    case "usd_riel":
                        changed = money*rate.riel_usd;
                        break;
                    case "usd_bath":
                        changed = money*rate.bath_usd;
                        break;
                    case "bath_riel":
                        changed = money*rate.riel_bath;
                        break;
                    case "bath_usd":
                        changed = money/rate.bath_usd;
                        break;
                    default:
                        changed = money;
                        break;
                }
                return changed;
            },
            save:function (){
                let prds = [];
                this.items.forEach(function (prd, pkey){
                    prds.push({
                        item_id:prd.info.id,
                        qty:prd.qty,
                        price:prd.price,
                    })
                });
                let params = {
                    customer_id:this.customer.id ? null : this.customer.id,
                    currency:this.currency,
                    note:this.note,
                    items:JSON.stringify(prds),
                    paid:this.paid,
                    total:this.total()
                };
                axios.post("<?php echo route("sale.store"); ?>",null,{
                    headers: $_i.headers,
                    params:params
                }).then(function (resp){
                    let resl = resp.data;
                    alert(JSON.stringify(resl));
                }).catch(function (err){
                    alert(err);
                });
            }
        }
    });
</script>
