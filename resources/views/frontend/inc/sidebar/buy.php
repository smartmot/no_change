<div id="buying">
    <div class="ds_f fm-smreap">
        <div><span>ឈ្មោះ</span></div>
        <div class="pr_10 pl_10">
            <div class="w_50 h_26 bc_2 b_r_30 csr-p" onclick="$('#swict').toggleClass('switched');suppliers.mode()">
                <div class="pr_3 pl_3 pt_3 pb_3">
                    <div class="w_20 h_20 bc_7 b_r_c ts_080 unfloat" id="swict"></div>
                </div>
            </div>
        </div>
        <div><span>អត្តលេខ</span></div>
    </div>
    <div class="pt_10">
        <label class="ds_f searchbtn">
            <input class="input-2 wp_100 fm-smreap pr_10 pl_10 b_r_4 pb_3 pt_3" type="text" v-model="find" name="search" placeholder="ស្វែងរក..." autocomplete="off">
            <button class="oln_n bd_n fm-smreap pr_14 pl_10 csr-p bc_1 c_2 hbc-warning" v-on:click="search()">ស្វែងរក</button>
        </label>
    </div>
    <div class="pt_10">
        <a href="<?php echo route("supplier.create"); ?>" class="t_d_n hbc-warning fm-smreap pr_15 pl_10 pt_3 pb_3 b_r_4 oln_n bd_n bc_1 c_2">
            <span class="fa fa-plus"></span>
            <span>&nbsp;បន្ថែមអ្នកផ្គត់ផ្គង់</span>
        </a>
    </div>
    <div class="pt_10">
        <div>
            <span>Filters : </span>
        </div>
        <div class="fm-smreap us_n">
            <div>
                <label>
                    <input type="checkbox" v-model="flt.due" class="input-1 bc_1 c_1 oln_n bd_n" @change="filter('due')">
                    <span>ជំពាក់</span>
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" v-model="flt.paid" class="input-1 bc_1 c_1 oln_n bd_n" @change="filter('paid')">
                    <span>បានទូទាត់</span>
                </label>
            </div>
            <!--<div>
                <label>
                    <input type="checkbox" v-model="params.popular" class="input-1 bc_1 c_1 oln_n bd_n" @change="load()">
                    <span>ឥវ៉ាន់ដាច់ច្រើន</span>
                </label>
            </div>-->
        </div>
    </div>
    <div class="pt_10">
        <div>
            <span>Sort by :</span>
        </div>
        <div class="pt_5">
            <label class="ds_f">
                <select v-model="order" class="fm-smreap input-1 oln_n bd_n pr_10 pl_10 pt_3 pb_3 b_r_5 wp_100" @change="sortz()">
                    <option value="created_at">កាលបរិច្ឆេទ</option>
                    <option value="invoice">ចំនួនបុង</option>
                    <option value="stock">ចំនួនឥវ៉ាន់</option>
                    <option value="total">ចំនួនលុយ</option>
                    <option value="due">ចំនួនលុយជំពាក់</option>
                </select>
            </label>
        </div>
    </div>
</div>
<div></div>
