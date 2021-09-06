<div class="pt_10 pb_5 lh_32">
    <a href="<?php echo route("staff"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "staff" ? "active" : ""; ?>">បុគ្គលិក</a>
    <a href="<?php echo route("staff.scan"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "staff.scan" ? "active" : ""; ?>">វត្តមាន</a>
    <a href="<?php echo route("staff.list"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "staff.list" ? "active" : ""; ?>">បញ្ជីរាយនាមបុគ្គលិគ</a>
    <a href="<?php echo route("staff.report"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "staff.report" ? "active" : ""; ?>">របាយការណ៌បុគ្គលិគ</a>
</div>
