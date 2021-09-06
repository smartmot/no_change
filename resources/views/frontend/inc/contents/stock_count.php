<div id="stockcontrol">
    <div>
        <table class="gentab fm-smreap">
            <thead>
            <tr>
                <th>ល.រ</th>
                <th>ឈ្មោះឥវ៉ាន់</th>
                <th>កាលបរិច្ឆេទ</th>
                <th>ចំនួន</th>
                <th>តម្លៃ/ឯកតា</th>
                <th>ID</th>
                <th>រូបភាព</th>
                <th>លើស/ខ្វះ</th>
                <th>កាលបរិច្ឆេទ</th>
            </tr>
            </thead>
            <tbody v-for="(stock, ii) in stocks">
            <tr>
                <td>{{ ii+1 }}</td>
                <td @click="count.is = ii; count.item_id = stock.id">{{ stock.name }}</td>
                <td class="p-r">
                    {{ stock.date }}
                    <div class="bc_1 c_2 p-a t-0 l-0 z_x_1 box-s1" v-if="count.is === ii">
                        <div class="pr_15 pl_15 pb_10 pt_10 z_x_2">
                            <div class="fm-smreap fw_b fs_18 bdbtm_1_whi pb_5 ds_f">
                                <div>ផ្ទៀផ្ទាត់</div>
                                <div class="flx"></div>
                                <div @click="count.is = 'on'" class="csr-p">
                                    <span class="fa fa-close"></span>
                                </div>
                            </div>
                            <div class="pt_10">
                                <div class="ds_f pb_10">
                                    <div class="w_80">សរុប</div>
                                    <div class="w_80 ds_f">
                                        :&nbsp;<span>{{ stock.qty }}</span>
                                    </div>
                                </div>

                                <div class="ds_f pb_10">
                                    <div class="w_80">ជាក់ស្ដែង</div>
                                    <div class="w_120 ds_f">
                                        <input v-model="count.count" type="number" class="pr_10 wp_100 pl_10 h_30 lh_35 fm-smreap bc_2 c_1 box-s4 oln_n bd_n b_r_3">
                                    </div>
                                </div>
                                <div class="ds_f pb_10">
                                    <div class="w_80">កាលបរិច្ឆេទ</div>
                                    <div class="w_120 ds_f">
                                        <input v-model="count.date" type="date" class="pr_10 wp_100 pl_10 h_30 lh_35 fs_14 fm-smreap bc_2 c_1 box-s4 oln_n bd_n b_r_3">
                                    </div>
                                </div>
                                <div class="ds_f">
                                    <div class="flx"></div>
                                    <div>
                                        <button @click="countf(ii)" class="fm-smreap pr_10 wp_100 pl_10 h_30 lh_35 bc_2 c_1 box-s4 oln_n bd_n b_r_3 csr-p hbc-warning hc-light">រក្សាទុក</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-a l-10 t_10 fs_30 z_x_1 c_1">
                            <span class="fa fa-caret-left"></span>
                        </div>
                    </div>
                </td>
                <td>{{ numeral(stock.qty).format("0,0") }}</td>
                <td>{{ money(stock.unit_price,stock.currency) }}</td>
                <td>{{ stock.ids }}</td>
                <td>
                    <img class="w_50" v-bind:src="'<?php echo asset("photo"); ?>/'+stock.photo+'_thumb.jpg'" alt="">
                </td>
                <td>{{ numeral(stock.lost).format("0,0") }}</td>
                <td>{{stock.lost_date}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="h_50"></div>
</div>
