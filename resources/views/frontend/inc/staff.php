<div style="height: calc(100% - 90px)" class="wp_100">
    <div class="ds_f hp_100 ovfx_h wp_100 mainpg">
        <div class="bc_4 p-r hp_100 side_menu ts_030">
            <div class="bc_4 child">
                <div class="pr_20 pl_20 pt_20 pb_20">
                    <?php
                    require "sidebar/". str_replace(".", "_", request()->route()->getName()) .".php";
                    ?>
                </div>
            </div>
        </div>
        <div class="bc_2 side_content ts_030">
            <div class="pt_20 pr_20 pl_20 pb_20">
                <?php
                require "contents/". str_replace(".", "_", request()->route()->getName()) .".php";
                ?>
            </div>
        </div>
    </div>
</div>
