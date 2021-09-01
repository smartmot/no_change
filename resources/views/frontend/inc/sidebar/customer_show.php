<div class="pr_10 pl_10 sidebar" id="subbar">
    <div class="p-r">
        <div>
            <img id="newimgz" :src="image()" alt="" class="wp_100 box-s1">
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
                {{customer.name}}
            </span>
            <button class="oln_n bd_n bc_t csr-p hc-danger" title="កែសម្រួល" onclick="customer.edit = true">
                <span class="fa fa-edit"></span>
            </button>
            <div class="fm-smreap lh_20" v-if="customer.note != ''">({{customer.note}})</div>
        </div>
        <div class="ds_f pt_5">
            <div class="w_40">
                <div class="h_25 w_25 t_a_c lh_25 bc-success c_2 b_r_c">
                    <span class="fa fa-id-badge"></span>
                </div>
            </div>
            <div class="lh_25 w100-40 fm-smreap"><?php echo str_pad($customer["id"], 3, 0, STR_PAD_LEFT); ?></div>
        </div>

        <div class="ds_f pt_5">
            <div class="w_40">
                <div class="h_25 w_25 t_a_c lh_25 bc-success c_2 b_r_c">
                    <span class="fa fa-phone"></span>
                </div>
            </div>
            <div class="lh_25 fm-smreap w100-40">
                <div class="lh_25 w100-40 fm-smreap" v-if="customer.tel != ''">{{ customer.tel }}</div>
                <div class="lh_25 w100-40 fm-smreap opc_50" v-if="customer.tel === ''"><i>គ្មាន</i></div>
            </div>
        </div>

        <div class="ds_f pt_5">
            <div class="w_40">
                <div class="h_25 w_25 t_a_c lh_25 bc-success c_2 b_r_c">
                    <span class="fa fa-map-marker"></span>
                </div>
            </div>
            <div class="lh_25 w100-40 fm-smreap" v-if="customer.address != ''">{{customer.address}}</div>
            <div class="lh_25 w100-40 fm-smreap opc_50" v-if="customer.address === ''"><i>គ្មាន</i></div>
        </div>

    </div>
    <div class="h_1 bc_1 mt_5 mb_5"></div>
    <div class="pt_5 pb_5">
        <a href="" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "customer.show" ? "active" : ""; ?>">វិក័យប័ត្រ</a>
        <a href="" class="ds_b fm-smreap t_d_n c_8 <?php echo request()->route()->getName() == "invoices.create" ? "active" : ""; ?>">ស្តុក</a>
    </div>

</div>

