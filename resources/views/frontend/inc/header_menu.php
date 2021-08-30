<a class="fm-smreap <?php echo request()->route()->getName() == "buy" ? "active" : ""; ?>" href="<?php echo route("buy",null,true); ?>">ទិញចូល</a>
<a class="fm-smreap <?php echo request()->route()->getName() == "sell" ? "active" : ""; ?>" href="<?php echo route("sell",null,true); ?>">លក់ចេញ</a>
<a class="fm-smreap <?php echo request()->route()->getName() == "stock" ? "active" : ""; ?>" href="<?php echo route("stock",null,true); ?>">ស្តុក</a>
<a class="fm-smreap <?php echo request()->route()->getName() == "customer" ? "active" : ""; ?>" href="<?php echo route("customer"); ?>">អតិថិជន</a>
<a class="fm-smreap <?php echo request()->route()->getName() == "staff" ? "active" : ""; ?>" href="<?php echo route("staff"); ?>">បុគ្គលិក</a>
<a class="fm-smreap <?php echo request()->route()->getName() == "report" ? "active" : ""; ?>" href="<?php echo route("report"); ?>">របាយការណ៍</a>
