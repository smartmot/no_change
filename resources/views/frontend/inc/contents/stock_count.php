<div id="stockcontrol">
    <div>
        <table class="gentab fm-smreap">
            <thead>
            <tr>
                <th>ល.រ</th>
                <th>ឈ្មោះឥវ៉ាន់</th>
                <th>កាលបរិច្ឆេទ</th>
                <th>ចំនួន</th>
                <th>តម្លៃ/ឯកតា</th>
                <th>ID</th>
                <th>រូបភាព</th>
                <th>លើស/ខ្វះ</th>
                <th>កាលបរិច្ឆេទ</th>
            </tr>
            </thead>
            <tbody v-for="(stock, ii) in stocks">
            <tr>
                <td>{{ ii+1 }}</td>
                <td>{{ stock.name }}</td>
                <td>{{ stock.date }}</td>
                <td>{{ stock.qty }}</td>
                <td>{{ stock.unit_price + currency[stock.currency] }}</td>
                <td>{{ stock.ids }}</td>
                <td>
                    <img class="w_50" v-bind:src="'<?php echo asset("photo"); ?>/'+stock.photo+'_thumb.jpg'" alt="">
                </td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    let stock = new Vue({
        el:"#stockcontrol",
        data:{
            stocks:[],
            currency:{
                riel:"៛",
                usd:"$",
                bath:"បាត"
            },
            params:{
                sort:"date"
            }
        },
        mounted:function (){
            let niss = this;
            setTimeout(function (){
                axios.get("<?php echo route("stock.index"); ?>",{
                    headers:$_i.headers,
                    params:niss.params
                })
                    .then(response=>{
                        niss.stocks = response.data
                    })
            }, 500);
        },
        methods:{

        }
    });
</script>
