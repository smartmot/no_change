<div class="p-r h_90 wp_100 bc_1">
    <div class="h_90 wp_100 bc_1 t-0 r-0 box-s1 z_x_3 p-f">
        <div class="ds_f">
            <div>
                <div class="pr_20 pl_20 pt_10">
                    <img class="h_70" src="<?php echo asset("pos_logo.svg"); ?>" alt="Logo">
                </div>
            </div>
            <div class="flx h_90">
                <div class="cs2">
                    <div class="fm-popp fw_b fs_30 c_2 h_50 pl_10">
                        <?php
                        echo config("app.name")
                        ?>
                    </div>
                    <div class="h_40">
                        <div class="hmenu cs2">
                            <?php
                            require "header_menu.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="pl_20 pr_20" id="pos_bar">
                    <div class="ds_f p-r">
                        <div class="pt_20">
                            <div class="mt_5">
                                <img class="w_40 h_40 b_r_c box-s1" src="<?php echo asset("user.svg"); ?>" alt=""/>
                            </div>
                        </div>
                        <div class="pt_20">
                            <div class="w_40 h_40 b_r_c bc_2 t_a_c lh_45 mt_5 ml_10 csr-p p-r opener">
                                <span class="fs_30">
                                    <span class="fa fa-caret-down"></span>
                                </span>
                            </div>
                        </div>
                        <div class="pt_20 cs3">
                            <div class="w_40 h_40 b_r_c bc_2 t_a_c lh_45 mt_5 ml_10 csr-p p-r showmenu">
                                <span class="fs_25">
                                    <span class="fa fa-bars"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w_200 bc_2 p-a r-0 box-s1 menxzz ds_n oln_n" tabindex="1" style="top: 90px;">
                        <div class="t_a_l">
                            <div class="pr_10 pl_10 pt_10 pb_20">
                                <div class="mini_menu">
                                    <?php
                                    require "header_menu.php";
                                    ?>
                                    <div class="h_1 bc_1 mt_10 mb_10"></div>
                                </div>

                                <div class="ds_f us_n">
                                    <div class="w_30 h_30 b_r_c lh_30 t_a_c">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <div class="h_30 lh_30 pl_10">Profile</div>
                                </div>

                                <div class="ds_f us_n mt_10">
                                    <div class="w_30 h_30 b_r_c lh_30 t_a_c">
                                        <span class="fa fa-cog"></span>
                                    </div>
                                    <div class="h_30 lh_30 pl_10">Settings</div>
                                </div>
                                <div class="h_1 bc_1 mt_10 mb_10"></div>
                                <div class="t_a_c">
                                    <form action="<?php echo route("logout"); ?>" method="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <button class="pr_20 pl_20 oln_n bd_n pt_3 pb_3 fm-popp bc_1 c_2 csr-p hbc-warning">Log out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
