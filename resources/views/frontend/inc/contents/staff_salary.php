<div>
    <div class="pb_10 bdbtm_1_blk">
        <span class="fm-smreap">ជ្រើសរើសខែ : </span>
        <input v-model="month" type="month" class="input-1 pr_10 pl_10 pt_3 pb_3 oln_n bd_n bc_1 c_2 fm-smreap w_120 b_r_3">
    </div>

    <div class="pt_10">
        <table class="fm-smreap tb02">
            <thead class="t_a_c fw_b">
            <tr>
                <td>ល.រ</td>
                <td>ឈ្មោះ</td>
                <td>ភេទ</td>
                <td>ចំនួនថ្ងៃធ្វើការ</td>
                <td>ប្រាក់ខែគោល</td>
                <td>ប្រាក់ខែ</td>
                <td>បើកប្រាក់ខែ</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(staff, si) in staffs">
                <td>{{si+1}}</td>
                <td>{{staff.name}}</td>
                <td>{{staff.gender === 'male' ? "ប្រុស" :"ស្រី"}}</td>
                <td>{{staff.work}}</td>
                <td>{{numeral(staff.pre_salary).format("$0,0.00")}}</td>
                <td>{{ numeral((staff.pre_salary/30)*staff.work).format("$0,0.00") }}</td>
                <td>
                    <button @click="paying(si)" v-if="!staff.is_paid">បើកលុយ</button>
                    <span v-if="staff.is_paid">{{staff.is_paid.salary}}</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
