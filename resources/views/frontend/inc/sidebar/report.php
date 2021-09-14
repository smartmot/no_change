<div class="pr_10 pl_10 sidebar">
    <div class="pt_5 pb_5">
        <a href="<?php echo route("report"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "report" ? "active" : ""; ?>">ចំណូល</a>
        <a href="<?php echo route("report.expence"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "report.expence" ? "active" : ""; ?>">ចំណាយ</a>
        <a href="<?php echo route("report.net"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "report.net" ? "active" : ""; ?>">ចំណេញ</a>
    </div>
</div>
