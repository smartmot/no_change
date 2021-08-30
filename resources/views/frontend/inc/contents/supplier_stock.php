<div id="stock">
    <div class="pb_10">
        <div class="box-s1 bc_1 c_2">
            <div class="pr_10 pl_10 pt_10 pb_10 fm-smreap">
                <div class="rowc">
                    <div class="xl-6 lg-7 md-6 fx_12">
                        <label for="sort">Sort by</label>
                        <select id="sort" v-model="sortz" class="input-1 lh_20 fm-smreap pr_10 pl_10 pt_3 pb_3 b_r_3" @change="sort()">
                            <option value="date,desc">កាលបរិច្ឆេទ</option>
                            <option value="sold,desc">ឥវ៉ាន់លក់ដាច់ជាងគេ</option>
                            <option value="sold,asc">ឥវ៉ាន់លក់មិនសូវដាច់</option>
                            <option value="qty,asc">ឥវ៉ាន់ច្រើនជាងគេ</option>
                            <option value="qty,desc">ឥវ៉ាន់តិចជាងគេ</option>
                        </select>
                        &nbsp;&nbsp;
                    </div>
                    <div class="fm-smreap ds_f flx pt_5">
                        <div class="pr_10">
                            <span>សរុប : <?php echo $supplier->qtys; ?></span>
                        </div>
                        <div class="pr_10">
                            <span>លក់អស់ : <?php echo $supplier->sold;?></span>
                        </div>
                        <div class="pr_10">
                            <span>នៅសល់ : <?php echo $supplier->stock;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="ovfy_a ovfx_a">
            <table class="sreport fm-smreap">
                <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>ឈ្មោះឥវ៉ាន់</th>
                    <th>ចំនួន</th>
                    <th>តម្លៃ/ឯកតា</th>
                    <th>ID</th>
                    <th>រូបភាព</th>
                </tr>
                </thead>
                <tbody v-for="(item,ii) in items">
                <tr>
                    <td>{{ ii+1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.qty }}</td>
                    <td>{{ item.unit_price }}</td>
                    <td>{{ item.ids }}</td>
                    <td>
                        <img class="w_60" v-bind:src="'<?php echo asset("photo"); ?>/'+item.photo+'_thumb.jpg'" alt="">
                    </td>
                </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    let stock = new Vue({
        el:"#stock",
        data:{
            items:[],
            params:{
                supplier_id:"<?php echo $supplier->id; ?>"
            },
            sortz:"date,desc"
        },
        mounted:function (){
            let niis = this;
            setTimeout(function (){
                axios.get("<?php echo route("supplier.stocks"); ?>", {
                    headers:$_i.headers,
                    params:niis.params
                })
                    .then(response => {
                        niis.items = response.data.data;
                    })
                    .catch(function (err){
                    })
            },500);
        },
        methods:{
            sort:function (){
                let sortto = this.sortz.split(",");
                srtz(this.items,sortto[0],sortto[1]);
            }
        }
    });
</script>
