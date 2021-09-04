<div id="stockcontrol">
    <div>
        <table class="gentab fm-smreap">
            <thead>
            <tr>
                <th>ល.រ</th>
                <th>ឈ្មោះឥវ៉ាន់</th>
                <th>ចំនួន</th>
                <th>លក់</th>
                <th>តម្លៃ/ឯកតា</th>
                <th>ID</th>
                <th>រូបភាព</th>
            </tr>
            </thead>
            <tbody v-for="(stock, ii) in stocks">
            <tr>
                <td>{{ ii+1 }}</td>
                <td>{{ stock.name }}</td>
                <td>{{ numeral(stock.qty).format("0,0") }}</td>
                <td>{{ numeral(stock.sold).format("0,0") }}</td>
                <td>{{ money(stock.unit_price, stock.currency) }}</td>
                <td>{{ stock.ids }}</td>
                <td>
                    <img class="w_50" v-bind:src="'<?php echo asset("photo"); ?>/'+stock.photo+'_thumb.jpg'" alt="">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
