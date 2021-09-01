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
                            <div class="ds_f pr_10 p-r">
                                <button @click="cus()" class="t_a_c wp_100 hbc-secondary hc-light lh_35 csr-p fm-smreap oln_n bd_n h_35 b_r_5 box-s4" type="button">អតិថិជនចាស់</button>
                                <div class="p-a wp_100 bc_2 r-0 pl_2 pt_5 t-5 box-s1 away_ing" v-if="put_cst">
                                   <div class="pr_10 pl_10 pb_10">
                                       <div class="h_30 ds_f">
                                           <div class="flx">
                                               <span class="fm-smreap">ជ្រើសរើសអតិថិជន</span>
                                           </div>
                                           <div>
                                               <div class="w_30 h_30 t_a_c lh_30 hc-danger csr-p" @click="choose([])">
                                                   <span class="fa fa-close"></span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="pb_10">
                                           <label class="ds_f">
                                               <input v-model="keyword" type="text" class="input-4 pr_10 pl_10 pt_5 pb_5 fm-smreap box-s4 wp_100" placeholder="អតិថិជន">
                                           </label>
                                       </div>
                                       <div class="fm-smreap h_270 ovfy_a scb-1">
                                           <div v-for="cmer in customers" class="pb_10">
                                               <div class="ds_f box-s4 hbc4 csr-p" @click="choose(cmer)">
                                                   <div class="h_50">
                                                       <img :src="cmer.photo == null ? '<?php echo asset(""); ?>/profile.svg' : '<?php echo asset("photo"); ?>/'+cmer.photo+'_thumb.jpg'" class="hp_100" alt="">
                                                   </div>
                                                   <div class="flx">
                                                       <div class="pl_10">{{cmer.name}}</div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl-6 fx_6">
                            <div class="ds_f pl_10">
                                <button @click="isnew=true" class="t_a_c wp_100 hbc-secondary hc-light lh_35 csr-p fm-smreap oln_n bd_n h_35 b_r_5 box-s4" type="button">អតិថិជនថ្មី</button>
                            </div>
                        </div>
                    </div>

                    <div class="pt_5 ds_f fm-smreap">
                        <div class="xl-6 lg-6 md-6 sm-6 fx_6">
                            <div class="pr_10">
                                <label for="paid">ទូទាត់ <span class="c_6" v-if="sale_errors.paid">: {{sale_errors.paid[0]}}</span></label>
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
                        <div class="lh_20 t_a_c pb_10">
                            <div class="pt_20 fs_18 fm-koulen">វិក័យប័ត្រ</div>
                            <div class="ds_f fs_14">
                                <div class="fx_6 t_a_l">
                                    <div class="ds_f">
                                        <div class="w_50">អតិថិជន</div>
                                        <div>: <span>{{customer.name}}</span></div>
                                    </div>
                                    <div class="ds_f">
                                        <div class="w_50">Tel</div>
                                        <div>: <span>{{customer.tel}}</span></div>
                                    </div>
                                </div>
                                <div class="fx_6 ds_f">
                                    <div class="flx"></div>
                                    <div class="w_50 t_a_l">TEL :</div>
                                    <div>
                                        <div>010 563 093</div>
                                        <div>092 235 043</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt_5 fs_14">
                            <div class="h_1 wp_100"></div>
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
    <div class="p-f w_300 z_x_5 t_15 bc_2 box-s1" style="right: calc(50% - 150px)" v-if="isnew">
        <div class="pr_15 pl_15 pb_20">
            <div class="ds_f bdbtm_1_gra">
                <div class="flx fm-smreap fs_18 lh_40">
                    បញ្ចូលអតិថិជនថ្មី
                </div>
                <div class="h_40 w_40 t_a_c fs_20 hc-danger lh_40 csr-p" @click="creset()">
                    <span class="fa fa-close"></span>
                </div>
            </div>
            <div class="pt_10">
                <div class="p-r">
                    <div class="w_180 _0auto">
                        <img id="newimg" class="wp_100 box-s4" src="<?php echo asset("profile.svg"); ?>" alt="">
                    </div>
                    <label for="thumb" class="p-a ds_b w_30 h_30 bc_1 c_2 b_r_c lh_30 t_a_c csr-p box-s1 b_10" style="right: calc(50% - 15px)">
                        <span class="fa fa-camera"></span>
                    </label>
                </div>
                <div class="h_3 bc_5 mt_2" style="width: 0" id="prog"></div>
            </div>
            <form action="javascript:void 0;" method="post" class="fm-smreap" autocomplete="off" @submit="addcus()">
                <div class="pt_5">
                    <label class="c_5 fw_b" for="c_name">ឈ្មោះ <span v-if="errors.name" class="c_6 fw_n">: {{errors.name[0]}}</span></label>
                    <div class="ds_f">
                        <input v-model="newc.name" class="input-4 pr_10 pl_10 pt_5 pb_5 fm-smreap box-s4 wp_100" id="c_name" type="text" placeholder="ឈ្មោះ">
                    </div>
                </div>

                <div class="pt_5">
                    <label class="c_5 fw_b" for="c_gender">ភេទ <span v-if="errors.gender" class="c_6 fw_n">: {{errors.gender[0]}}</span></label>
                    <div class="ds_f">
                        <select v-model="newc.gender" class="input-4 pr_10 pl_10 pt_5 pb_5 fm-smreap box-s4 wp_100" id="c_gender">
                            <option value="">ជ្រើសរើសភេទ</option>
                            <option value="male">ប្រុស</option>
                            <option value="female">ស្រី</option>
                        </select>
                    </div>
                </div>

                <div class="pt_5">
                    <label class="c_5 fw_b" for="c_tel">លេខទូរស័ព្ទ <span v-if="errors.tel" class="c_6 fw_n">: {{errors.tel[0]}}</span></label>
                    <div class="ds_f">
                        <input v-model="newc.tel" class="input-4 pr_10 pl_10 pt_5 pb_5 fm-smreap box-s4 wp_100" id="c_tel" type="text" placeholder="ឈ្មោះ">
                    </div>
                </div>

                <div class="pt_5">
                    <label class="c_5 fw_b" for="c_address">អាសយដ្ឋាន <span v-if="errors.address" class="c_6 fw_n">: {{errors.address[0]}}</span></label>
                    <div class="ds_f">
                        <input v-model="newc.address" class="input-4 pr_10 pl_10 pt_5 pb_5 fm-smreap box-s4 wp_100" id="c_address" type="text" placeholder="ឈ្មោះ">
                    </div>
                </div>

                <div class="pt_5">
                    <label class="c_5 fw_b" for="c_note">សំគាល់ <span v-if="errors.note" class="c_6 fw_n">: {{errors.note[0]}}</span></label>
                    <div class="ds_f">
                        <input v-model="newc.note" class="input-4 pr_10 pl_10 pt_5 pb_5 fm-smreap box-s4 wp_100" id="c_note" type="text" placeholder="ឈ្មោះ">
                    </div>
                </div>

                <div class="ds_f pt_10">
                    <div class="flx"></div>
                    <div>
                        <button type="submit" class="pr_10 pl_10 pt_5 pb_5 fm-smreap oln_n bd_n bc_1 c_2 csr-p b_r_3 hbc-danger"><span class="fa fa-save"></span> បញ្ចូល</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="cropx axaz1 box-s1 b_r_5 ds_n bc_1">
    <div class="h_30 lh_30">
        <div class="pr_20 pl_20 fm-ubt">Crop Image</div>
    </div>
    <div class="pr_20 pl_20">
        <div class="h_1 bcolor_4"></div>
        <div class="h_10"></div>
    </div>
    <div class="hp_100 wp_100 p-r">
        <div id="">
            <img id="cropimage" class="imgcz" src="" alt="">
        </div>
        <div class="h_50 wp_100">
            <div class="pr_20 pl_20 lh_50">
                <div class="t_a_c">
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" onclick="$('.axaz1').fadeOut('fast')">
                        <span>Cancel</span>
                    </button>
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-left"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-right"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" id="cropbtn">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="fileupload" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input id="thumb" onchange="$('#fileupload').submit()" type="file" name="upload" accept="image/jpeg" hidden>
    <input type="reset" hidden>
</form>
<form action="<?php echo asset("upload/crop"); ?>" method="post" id="cordform1">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="cord" value="" id="cord">
</form>
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
            customers:[],
            note:"",
            put_cst:false,
            isnew:false,
            newc:{
                name:"",
                gender:"",
                tel:"",
                address:"",
                note:""
            },
            errors:[],
            keyword:"",
            sale_errors:[],
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
            },
            keyword:{
                handler() {
                    clearTimeout(this.timer);
                    let nsz = this;
                    this.timer = setTimeout(function (){
                        nsz.search_cus();
                    },200);
                }
            }
        },
        mounted:function (){
            let nisz = this;
            $("#search").focus();
            $_c.watch("config",function (){
                nisz.load_cus();
            });

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
                let nisis = this;
                let prds = [];
                this.items.forEach(function (prd, pkey){
                    prds.push({
                        item_id:prd.info.id,
                        qty:prd.qty,
                        price:prd.price,
                    })
                });
                let params = {
                    customer_id:(this.customer.id ? this.customer.id : null),
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
                    if (resl.error){
                        nisis.sale_errors = resl.errors;
                    }else{
                        nisis.customer = [];
                        nisis.items = [];
                        nisis.paid = "";
                        nisis.note = "";
                        nisis.sale_errors = [];
                    }
                }).catch(function (err){
                    alert(err);
                });
            },
            cus:function (){
                let fxns = this;
                this.put_cst = true;
                setTimeout(function (){
                    window.onclick = function (){
                        fxns.put_cst = false;
                        window.onclick = null;
                        $(".away_ing").click(function (){
                            // something is ok!
                        });
                    };
                    $(".away_ing").click(function (event){
                        event.stopPropagation();
                    });
                },100);
            },
            choose:function (custmer){
                this.customer = custmer;
                this.put_cst = false;
                window.onclick = null;
                $(".away_ing").click(function (){
                    // something is ok!
                });
            },
            addcus:function (){
                let crte = this;
                crte.errors = [];
                axios.post("<?php echo route("customer.store"); ?>", null, {
                    headers:$_i.headers,
                    params:this.newc,
                }).then(function (created){
                    if (created.data.error){
                        crte.errors = created.data.errors;
                    }else{
                        crte.customer = created.data.customer;
                        crte.customers.push(created.data.customer);
                        crte.creset();
                    }
                }).catch(function (c_error){
                    alert(c_error);
                })
            },
            creset:function (){
                this.isnew = false;
                this.newc = {name:"", gender:"", tel:"", address:"", note:""};
            },
            load_cus:function (){
                let nisz = this;
                axios
                    .get("<?php echo route("customer.index"); ?>",$_i)
                    .then(function (loaded){
                        nisz.customers = loaded.data;
                    });
            },
            search_cus:function (){
                let nisz = this;
                axios
                    .get("<?php echo route("customer.index"); ?>",{
                        headers:$_i.headers,
                        params:{
                            keyword:nisz.keyword
                        }
                    })
                    .then(function (loaded){
                        nisz.customers = loaded.data;
                    });
            }
        }
    });
    let imagez = document.getElementById("cropimage");
    let img_url = "<?php echo asset("icon/16x9_pulse.svg"); ?>", croperz, cordsz = {};

    $("#cropbtn").click(function (){
        f.r({
            d:function (resp){
                if (!resp.error){
                    $("#newimg").attr("src", "<?php echo asset("icon/30x35_pulse.svg"); ?>");
                    $(".cropx").fadeOut();
                    croperz.destroy();
                    img.load("<?php echo asset("photo")."/"; ?>"+resp.url, function (){
                        $("#newimg")
                            .attr("src", '<?php echo asset("photo").'/'; ?>'+resp.url);
                        $("#prog")
                            .removeClass("ts_050")
                            .css("width", "0");
                        setTimeout(function (){
                            $("#prog").addClass("ts_050");
                        },1000);
                    });
                }else {
                    croperz.destroy();
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
        },{x:f.f($("#cordform1")),m:"post",t:"json",target:"<?php echo route("upload.crop"); ?>"});
    })
        .prev().click(function (){
        croperz.rotateTo(cdata.r + 90);
    })
        .prev().click(function (){
        croperz.rotateTo(cdata.r - 90);
    });

    $("#fileupload").submit(function (e){
        e.preventDefault();
        f.r({
            d:function (uploaded){
                if (uploaded.error){

                }else{
                    img_url = "<?php echo asset("photo"); ?>/" + uploaded.url;
                    imagez.src = "<?php echo asset("icon/16x9_pulse.svg"); ?>";
                    $(".cropx").fadeIn();
                    img.load(img_url, function (){
                        imagez.src = img_url;
                        setTimeout(function (){
                            croperz = $f.x(imagez,function (cord){
                                $("#cord").attr("value", JSON.stringify(cord));
                            },{
                                ratio:(6/7)
                            });
                        }, 200);
                    });
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
        },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("upload.image"); ?>"})
    });
</script>
