<div class="pr_10 pl_10 sidebar">
    <div class="pt_5 pb_5">
        <a href="<?php echo route("sell"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "sell" ? "active" : ""; ?>">លក់ចេញ <span class="c_6 <?php echo request()->route()->getName() == "invoices.show" ? "" : "ds_n";?>">/ឥវ៉ាន់</span></a>
        <a href="<?php echo route("sell.customer"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "sell.customer" ? "active" : ""; ?>">អតិថិជនចាស់</a>
        <a href="<?php echo route("sell.addcustomer"); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "sell.addcustomer" ? "active" : ""; ?>">បញ្ចូលពត៌មានអតិថិជន</a>
    </div>
</div>
