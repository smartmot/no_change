<div class="pr_10 pl_10 sidebar" id="subbar">
    <div class="p-r">
        <div>
            <img id="newimgz" src="<?php echo asset("photo/".($supplier->photo == "6x7" ? "6x7.jpg" : $supplier->photo."_thumb.jpg")); ?>" alt="" class="wp_100 box-s1">
        </div>
        <label for="subpro" class="p-a w_30 h_30 bc_1 c_2 t_a_c lh_30 b_r_c b_10 r_50p15 csr-p">
            <span class="fa fa-camera"></span>
        </label>
    </div>
    <div id="progz1" class="h_3 w_80 bc_5 ts_050" style="width: 0"></div>
    <div class="t_a_c pt_4 fs_13 c_6 fm-smreap" id="errorz"></div>
    <div class="pt_0">
        <div class="t_a_c">
            <span class="fm-smreap fw_b fs_18">
                <?php echo $supplier->name; ?>
            </span>
            <button class="oln_n bd_n bc_t csr-p hc-danger" title="កែសម្រួល" onclick="editsub.edit = true">
                <span class="fa fa-edit"></span>
            </button>
            <?php
            if ($supplier->note != null){
                ?>
                <div class="fm-smreap lh_20">(<?php echo $supplier->note; ?>)</div>
                <?php
            }
            ?>
        </div>
        <div class="ds_f pt_5">
            <div class="w_40">
                <div class="h_25 w_25 t_a_c lh_25 bc-success c_2 b_r_c">
                    <span class="fa fa-id-badge"></span>
                </div>
            </div>
            <div class="lh_25 w100-40 fm-smreap"><?php echo $supplier->ids; ?></div>
        </div>

        <div class="ds_f pt_5">
            <div class="w_40">
                <div class="h_25 w_25 t_a_c lh_25 bc-success c_2 b_r_c">
                    <span class="fa fa-phone"></span>
                </div>
            </div>
            <div class="lh_25 fm-smreap w100-40"><?php echo $supplier->tel; ?></div>
        </div>

        <div class="ds_f pt_5">
            <div class="w_40">
                <div class="h_25 w_25 t_a_c lh_25 bc-success c_2 b_r_c">
                    <span class="fa fa-map-marker"></span>
                </div>
            </div>
            <?php
            if ($supplier->address != null){
                ?>
                <div class="lh_25 w100-40 fm-smreap"><?php echo $supplier->address; ?></div>
                <?php
            }else{
                ?>
                <div class="lh_25 w100-40 fm-smreap opc_50"><i>គ្មាន</i></div>
                <?php
            }
            ?>
        </div>

    </div>
    <div class="h_1 bc_1 mt_5 mb_5"></div>
    <div class="pt_5 pb_5">
        <a href="<?php echo route("suppliers.show", $supplier->id); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "suppliers.show" ? "active" : ""; ?>">វិក័យប័ត្រ <span class="c_6 <?php echo request()->route()->getName() == "invoices.show" ? "" : "ds_n";?>">/ឥវ៉ាន់</span></a>
        <a href="<?php echo route("invoices.create",$supplier->id); ?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "invoices.create" ? "active" : ""; ?>">បញ្ចូលវិក័យប័ត្រ</a>
    </div>

    <div class="pt_20 fm-smreap">របាយការណ៍</div>
    <div class="h_1 bc_1 mt_5 mb_5"></div>
    <div class="pt_5 pb_5">
        <a href="<?php echo route("supplier.report", $supplier->id);?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "supplier.report" ? "active" : ""; ?>">វិក័យប័ត្រ</a>
        <a href="<?php echo route("supplier.stock", $supplier->id);?>" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "supplier.stock" ? "active" : ""; ?>">ស្តុក</a>
    </div>
</div>

