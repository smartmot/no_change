<div>
    <div class="rowc">
        <div class="xl-2p5 lg-3 md-4 sm-6 fx_6" v-for="staff in staffs">
            <div class="pr_10 pl_10 pt_10 pb_10">
                <div class="bc_1 pr_10 pl_10 pt_10 pb_10">
                    <div>
                        <a class="t_d_n ds_b" :href="'<?php echo asset("staff"); ?>/'+staff.id">
                            <img class="wp_100" :src="'<?php echo asset("photo"); ?>/' + staff.photo + '_thumb.jpg'" alt="">
                        </a>
                    </div>
                    <div class="fm-smreap lh_20 fs_15 pt_5 c_2 pt_10">
                        <div>
                            <a class="t_d_n c_2 hc-warning" :href="'<?php echo asset("staff"); ?>/'+staff.id">{{ staff.name }}</a>
                        </div>
                        <div class="ds_f">
                            <div class="w_30">ID</div>
                            <div>: {{ numeral(staff.id).format('000') }}</div>
                        </div>

                        <div class="ds_f">
                            <div class="w_30">Tel</div>
                            <div>: {{ staff.tel }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
