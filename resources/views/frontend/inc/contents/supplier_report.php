<div id="invoice">
    <div class="pb_10">
        <div class="bc_1 c_2 pr_10 pl_10 pt_10 pb_10">
            <div class="rowc">
                <div class="xl-4 lg-4 md-12 fx_12">
                    <div class="rowc">
                        <div class="xl-12 lg-12 md-12 ds_f pb_5">
                            <label for="filter" class="fm-smreap fs_12 w_40 ds_b">
                                Filters
                            </label>
                            <select id="filter" class="input-1 pr_5 pl_5 fm-smreap lh_20 fs_12 h_25 b_r_3 flx" v-model="params.filter" @change="load()">
                                <option value="">ទាំងអស់</option>
                                <option value="paid">ទូទាត់</option>
                                <option value="due">នៅខ្វះ</option>
                            </select>
                        </div>
                        <div class="xl-12 lg-12 md-12 ds_f pb_5">
                            <label for="date" class="fm-smreap fs_12 w_40 ds_b">Date</label>
                            <div class="flx ds_f">
                                <input type="date" v-model="params.from" id="date" class="input-1 fs_12 b_r_3 h_25 lh_20 wp_100 pr_5 pl_5" @change="select()">
                            </div>
                            <label for="date2" class="fm-smreap pr_5 pl_5">-</label>
                            <div class="flx ds_f">
                                <input type="date" v-model="params.to" id="date2" class="input-1 fs_12 b_r_3 h_25 lh_20 wp_100 pr_5 pl_5" @change="select()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl-8 lg-8 md-12 fx_12">
                   <div class="rowc pl_10">
                       <div class="xl-4 lg-3 md-12 fx_12 box-s5">
                           <div class="ds_f pr_10 pl_10 lh_20 pt_10 pb_10">
                               <div class="w_50 fm-smreap">
                                   <span class="pr_5 pl_5">សរុប៖</span>
                               </div>
                               <div class="t_a_r fm-smreap flx">
                                   <div><?php echo number_format($supplier->riel, 0, "", ","); ?></div>
                                   <div><?php echo number_format($supplier->dollar, 2); ?></div>
                                   <div><?php echo number_format($supplier->bath, 0, "", ","); ?></div>
                               </div>
                               <div class="fm-smreap w_40 pl_5">
                                   <div>រៀល</div>
                                   <div>$</div>
                                   <div>បាត</div>
                               </div>
                           </div>
                       </div>

                       <div class="xl-4 lg-3 md-12 fx_12 box-s5">
                           <div class="ds_f pr_10 pl_10 lh_20 pt_10 pb_10">
                               <div class="w_50 fm-smreap">
                                   <span>ទូទាត់៖</span>
                               </div>
                               <div class="t_a_r fm-smreap flx">
                                   <div><?php echo number_format($supplier->payments["paid"]["riel"], 0, "", ","); ?></div>
                                   <div><?php echo number_format($supplier->payments["paid"]["usd"], 2); ?></div>
                                   <div><?php echo number_format($supplier->payments["paid"]["bath"], 0, "", ","); ?></div>
                               </div>
                               <div class="fm-smreap w_40 pl_5">
                                   <div>រៀល</div>
                                   <div>$</div>
                                   <div>បាត</div>
                               </div>
                           </div>
                       </div>

                       <div class="xl-4 lg-3 md-12 fx_12 box-s5">
                           <div class="ds_f pr_10 pl_10 lh_20 pt_10 pb_10">
                               <div class="w_50 fm-smreap">
                                   <span>ខ្វះ៖</span>
                               </div>
                               <div class="t_a_r fm-smreap flx">
                                   <div><?php echo number_format($supplier->payments["due"]["riel"], 0, "", ","); ?></div>
                                   <div><?php echo number_format($supplier->payments["due"]["usd"], 2); ?></div>
                                   <div><?php echo number_format($supplier->payments["due"]["bath"], 0, "", ","); ?></div>
                               </div>
                               <div class="fm-smreap w_40 pl_5">
                                   <div>រៀល</div>
                                   <div>$</div>
                                   <div>បាត</div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="wp_100 ovfx_a ovfy_a">
            <table class="sreport fm-smreap">
                <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>ឈ្មោះបុង</th>
                    <th>កាលបរិច្ឆេទ</th>
                    <th>ចំនួនទឹកប្រាក់</th>
                    <th>ទូទាត់</th>
                    <th>កាលបរិច្ឆេទ</th>
                    <th>នៅខ្វះ</th>
                </tr>
                </thead>
                <tbody v-for="(invoice,ii) in invoices">
                <tr>
                    <td>{{ ii+1 }}</td>
                    <td>{{ invoice.name }}</td>
                    <td>{{ invoice.date }}</td>
                    <td>{{ money(invoice.total, invoice.currency) }}</td>
                    <td colspan="3">
                        <table class="tab_zero">
                            <tbody>
                            <tr v-for="(pay, pi) in invoice.payments">
                                <td>{{ money(pay.paid, invoice.currency) }}</td>
                                <td>{{ pay.date }}</td>
                                <td>{{ money(invoice.total - balance(invoice.payments, pi),invoice.currency) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    let invoices = new Vue({
        el:"#invoice",
        data:{
            invoices:[],
            params:{
                supplier_id:"<?php echo $supplier->id; ?>",
                filter:"",
                from:"",
                to:"",
            }
        },
        mounted:function (){
            let nis = this;
            $_c.watch("config",function (){
                nis.load();
            });
        },
        methods:{
            balance:function (paym,inx){
                let balance = 0;
                for (let nwi=0; nwi<=inx; nwi++){
                    balance += parseInt(paym[nwi].paid);
                }
                return balance;
            },
            money(money, curr){
                switch (curr){
                    case "usd":
                        return "$" + (parseInt(money)).toFixed(2);
                        break;
                        case "riel":
                            return parseInt(money)+"រៀល";
                            break;
                            case "bath":
                                return parseInt(money)+"បាត";
                                break;
                }
            },
            load:function (){
                let niis = this;
                axios.get("<?php echo route("supplier.reports"); ?>", {
                    headers:$_i.headers,
                    params:niis.params
                })
                    .then(response => {
                        niis.invoices = response.data.data;
                    })
                    .catch(function (err){

                    })
            },
            select:function (){
                this.load();
            }
        }
    });
</script>
