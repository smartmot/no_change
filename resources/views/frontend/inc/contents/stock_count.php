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
                <td>{{ numeral(stock.qty).format("0,0") }}</td>
                <td>{{ money(stock.unit_price,stock.currency) }}</td>
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
