<div class="ds_f fm-smreap">
    <div><span>ឈ្មោះ</span></div>
    <div class="pr_10 pl_10">
        <div v-bind:class="'w_50 h_26 bc_2 b_r_30 csr-p'" @click="search_mode = (search_mode == 'ids' ? 'name' : 'ids')">
            <div class="pr_3 pl_3 pt_3 pb_3">
                <div :class="'w_20 h_20 bc_7 b_r_c ts_080 unfloat'+(search_mode=='ids' ? ' switched' : '')"></div>
            </div>
        </div>
    </div>
    <div><span>អត្តលេខ</span></div>
</div>
<div class="pt_10">
    <label class="ds_f searchbtn">
        <input v-model="keyword" class="input-2 wp_100 fm-smreap pr_10 pl_10 b_r_4 pb_3 pt_3" type="text" name="search" placeholder="ស្វែងរក..." autocomplete="off">
        <button class="oln_n bd_n fm-smreap pr_14 pl_10 csr-p bc_1 c_2 hbc-warning" onclick="">ស្វែងរក</button>
    </label>
</div>


<div class="pt_10">
    <div class="us_n">
        <span>Filters :</span>
    </div>
    <div class="fm-smreap us_n">
        <div>
            <div class="ds_f">
                <div class="flx h_30 lh_30">
                    <input v-model="params.num" id="minnum" type="checkbox" class="input-1 bc_1 c_1 oln_n bd_n csr-p" @change="load()">
                    <label for="minnum" class="csr-p">ចំនួនតិចបំផុត</label>
                </div>
                <div class="ds_f" style="width: calc(50% - 20px)">
                    <input v-model="params.value" type="number" class="pr_10 wp_100 pl_10 h_30 lh_35 fm-smreap bc_2 c_1 oln_n bd_n b_r_3" @change="load()">
                </div>
            </div>
        </div>

        <div class="">
            <input v-model="params.date" id="date" type="checkbox" class="input-1 bc_1 c_1 oln_n bd_n csr-p" @change="load()">
            <label for="date" class="csr-p">កាលបរិច្ឆេទ</label>
        </div>
        <div>
            <div class="ds_f">
                <div class="ds_f" style="width: calc(50% - 20px)">
                    <input v-model="params.from" class="wp_100 bc_2 c_1 oln_n pl_10 bd_n b_r_3 fs_12" type="date" @change="load()">
                </div>
                <div class="w_40 fm-smreap t_a_c">ទៅ</div>
                <div class="ds_f" style="width: calc(50% - 20px)">
                    <input v-model="params.to" class="wp_100 bc_2 c_1 oln_n pl_10 bd_n b_r_3 fs_12" type="date" @change="load()">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt_10">
    <div>
        <span>Sort by :</span>
    </div>
    <div class="pt_5">
        <label class="ds_f">
            <select class="fm-smreap input-1 oln_n bd_n pr_10 pl_10 pt_3 pb_3 b_r_5 wp_100" v-model="sorts">
                <option value="date,desc">កាលបរិច្ឆេទ</option>
                <option value="sold,asc">ឥវ៉ាន់លក់ដាច់ជាងគេ</option>
                <option value="sold,desc">ឥវ៉ាន់លក់មិនសូវដាច់</option>
                <option value="qtys,asc">ឥវ៉ាន់ច្រើនជាងគេ</option>
                <option value="qtys,desc">ឥវ៉ាន់តិចជាងគេ</option>
                <option value="qty,asc">ឥវ៉ាន់សល់ច្រើនជាងគេ</option>
            </select>
        </label>
    </div>
</div>
<?php
if (request()->route()->getName() != "stock.count"){
    ?>
    <div class="pt_15">
        <div>
            <a href="<?php echo route("stock.count"); ?>" class="pr_20 pl_20 t_d_n fm-smreap oln_n bd_n pt_3 pb_3 b_r_5 bc_1 c_2 hbc-warning csr-p">រាប់ស្តុក</a>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="pt_15">
        <div>
            <a href="<?php echo route("stock"); ?>" class="pr_20 pl_20 t_d_n fm-smreap oln_n bd_n pt_3 pb_3 b_r_5 bc_1 c_2 hbc-warning csr-p"><span class="fa fa-caret-left"></span> ថយក្រោយ</a>
        </div>
    </div>
    <?php
}
?>
