<div class="pb_10 bdbtm_1_blk fm-smreap">
    Filter :
    <select class="fm-smreap input-1 bc_1 c_2 oln_n bd_n pr_10 pl_10">
        <option value="all">ទាំងអស់</option>
        <option v-for="year in <?php echo date("Y") - 2020; ?>">{{<?php echo date("Y"); ?> - year+1}}</option>
    </select>
</div>
