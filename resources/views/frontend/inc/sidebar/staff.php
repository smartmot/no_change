<div class="ds_f fm-smreap">
    <div><span>ឈ្មោះ</span></div>
    <div class="pr_10 pl_10">
        <div class="w_50 h_26 bc_2 b_r_30 csr-p" onclick="$('#swict').toggleClass('switched');">
            <div class="pr_3 pl_3 pt_3 pb_3">
                <div class="w_20 h_20 bc_7 b_r_c ts_080 unfloat" id="swict"></div>
            </div>
        </div>
    </div>
    <div><span>អត្តលេខ</span></div>
</div>
<div class="pt_10">
    <label class="ds_f searchbtn">
        <input class="input-2 wp_100 fm-smreap pr_10 pl_10 b_r_4 pb_3 pt_3" type="text" name="search" placeholder="ស្វែងរក..." autocomplete="off">
        <button class="oln_n bd_n fm-smreap pr_14 pl_10 csr-p bc_1 c_2 hbc-warning" onclick="">ស្វែងរក</button>
    </label>
</div>

<div class="pt_15">
    <div>
        <a href="<?php echo route("staff.add"); ?>" class="pr_20 pl_20 t_d_n fm-smreap oln_n bd_n pt_3 pb_3 b_r_5 bc_1 c_2 hbc-warning csr-p">បន្ថែមបុគ្គលិគ &nbsp;<span class="fa fa-plus-circle"></span></a>
    </div>
</div>

<div class="pr_10 pl_10 sidebar">
    <div class="pt_10 pb_5">
        <a href="<?php echo route("sell"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "sell" ? "active" : ""; ?>">បញ្ជីរាយនាមបុគ្គលិគ</a>
        <a href="<?php echo route("sell.customer"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "sell.customer" ? "active" : ""; ?>">របាយការណ៌បុគ្គលិគ</a>
    </div>
</div>
