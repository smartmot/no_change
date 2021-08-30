<div>
    <div class="rowc">
        <div class="xl-4 lg-12 md-12 fx_12">
            <div class="pr_10 pl_10">
                <div>
                    <a class="ds_b t_d_n" href="<?php echo asset("photo/".$invoice['photo'].".jpg"); ?>">
                        <img class="wp_100" src="<?php echo asset("photo/".$invoice['photo'].".jpg"); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="xl-8 lg-12 md-12 fx_12">
            <div class="pr_10 pl_10">
                <div class="fm-smreap box-s4 pr_30 pl_30 pt_10 pb_20">
                    <div class="t_a_c">
                        <div class="fs_24 fm-koulen">វិក័យប័ត្រ</div>
                        <div>
                            <img class="w_80" src="<?php echo asset("icon/symb/3.svg"); ?>">
                        </div>
                    </div>
                    <div class="ds_f">
                        <div class="fx_6">
                            <div><?php echo $invoice["name"];?></div>
                            <div><?php $supplier->tel;?></div>
                            <div><?php $supplier->address;?></div>
                        </div>
                        <div class="fx_6">
                            <div class="pl_10 t_a_r">
                                <?php echo date_format(date_create($invoice["date"]), "ថ្ងៃទីd ខែm ឆ្នាំY"); ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <table class="gentab verx">
                            <thead class="bc_1 c_2">
                            <tr>
                                <th>ល.រ</th>
                                <th>ឥវ៉ាន់</th>
                                <th>ចំនួន</th>
                                <th>តម្លៃរាយ</th>
                                <th>តម្លៃសរុប</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            function money($mon, $curr){
                                switch ($curr){
                                    case "usd":
                                        return "$". number_format($mon, 2, ".",",");
                                        break;
                                    case "riel":
                                        return number_format($mon, 0, "", ",")."៛";
                                        break;
                                    case "bath":
                                        return number_format($mon, 0, "", ","); break;
                                }
                            };
                            foreach ($invoice["items"] as $item){
                                ?>
                                <tr>
                                    <td><?php $no+=1;echo $no; ?></td>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo $item["qty"]; ?></td>
                                    <td><?php echo money($item["unit_price"], $invoice["currency"]); ?></td>
                                    <td><?php echo money($item["qty"] * $item["unit_price"], $invoice["currency"]); ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="pr_10 fm-koulen">សរុប</div>
                                </td>
                                <td class="fm-koulen"><?php echo money($invoice["total"], $invoice["currency"]); ?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
