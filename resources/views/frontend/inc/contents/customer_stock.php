<div id="stocks">
    <div>
        <div class="ds_f pb_10 bdbtm_1_blk">
            <div class="fm-smreap">
                <span>Filters :</span>
                <select v-model="filter" class="oln_n bd_n pr_10 pl_10 fm-smreap bc_1 c_2 pt_2 pb_2 input-2">
                    <option value="all">ទាំងអស់</option>
                    <option value="due">ជំពាក់</option>
                </select>
            </div>
            <div class="flx"></div>
            <div>
                <div class="fm-smreap lh_20 cs13">
                    <div class="ds_f">
                        <div class="w_70"><span>សរុប ៖ </span></div>
                        <div class="w_100">$<?php echo number_format($total,2); ?></div>
                    </div>
                    <div class="ds_f">
                        <div class="w_70"><span>ទូទាត់ ៖ </span></div>
                        <div class="w_100">$<?php echo number_format($paid, 2); ?></div>
                    </div>
                    <div class="ds_f">
                        <div class="w_70"><span>នៅខ្វះ ៖ </span></div>
                        <div class="w_100">$<?php echo number_format($total - $paid, 2); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt_10">
        <div class="rowc">
            <div class="xl-2p5 lg-3 md-3" v-for="stock in stocks">
                <div class="pr_10 pl_10 pb_10 pt_10">
                    <div class="bc_1 c_2 pt_10">
                        <div class="pr_20 pl_20">
                            <div class="bc_2 b_r_c">
                                <img class="wp_100" src="<?php echo asset("icon/shoping_bag.svg"); ?>" alt="">
                            </div>
                        </div>
                        <div class="fm-smreap pr_10 pl_10 pb_10">
                            <div class="ds_f">
                                <div class="w_50">ID</div>
                                <div>: {{ stock.no }}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_50">សរុប</div>
                                <div>: {{ money(stock.total, stock.currency) }}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_50">នៅខ្វះ</div>
                                <div :class="stock.due > 0 ? 'c_6' : ''">: {{ money(stock.due, stock.currency) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
