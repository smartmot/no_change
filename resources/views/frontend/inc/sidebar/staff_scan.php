<div>
    <div>
        <div class="_0auto w_120 pt_20 pb_20">
            <img class="w_120" src="<?php echo asset("scan.svg"); ?>" alt="">
        </div>

        <div class="ds_f">
            <input type="text" v-model="keyword" id="keyword" placeholder="Scan here" class="input-1 fs_16 pr_15 pl_15 pt_5 pb_5 fm-smreap wp_100" autocomplete="off" autofocus>
        </div>

        <div class="pt_10" v-if="error">
            <div class="fm-smreap c_6">
                <span class="fa fa-exclamation-triangle"></span> បានចុះវត្តមានមុននេះបន្តិចរួចហើយ!
            </div>
        </div>
        <div class="pt_10" v-if="exist">
            <div class="fm-smreap c_6">
                <span class="fa fa-exclamation-triangle"></span> បាន ស្គេន ចេញចូលរួចហើយ!
            </div>
        </div>
    </div>
</div>
