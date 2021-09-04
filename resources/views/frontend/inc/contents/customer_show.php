<div id="content">
    <div>
        <div class="bdbtm_1_gra pb_10 fm-smreap">
            <label>
                <span>Filters : </span>
                <select v-model="filterz" class="oln_n bd_n pr_10 pl_10 fm-smreap bc_1 c_2 pt_2 pb_2 input-2">
                    <option value="all">ទាំងអស់</option>
                    <option value="due">ជំពាក់</option>
                </select>
            </label>
        </div>
    </div>

    <div class="pt_10">
        <table class="gentab fm-smreap">
            <thead class="bc_1 c_2">
            <tr>
                <th>ល.រ</th>
                <th>វិក័យប័ត្រ</th>
                <th>កាលបរិច្ឆេទ</th>
                <th>ឥវ៉ាន់</th>
                <th>តម្លៃ</th>
                <th>ទូទាត់</th>
                <th>ខ្វះ</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(invoice, no) in invoices">
                <td>{{no+1}}</td>
                <td>{{ invoice.no }}</td>
                <td>{{ invoice.date }}</td>
                <td>{{ -invoice.qty }}</td>
                <td>{{ money(invoice.total, invoice.currency) }}</td>
                <td>{{ money(invoice.paid, invoice.currency) }}</td>
                <td>{{ money(invoice.due, invoice.currency) }}</td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
