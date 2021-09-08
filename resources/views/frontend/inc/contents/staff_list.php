<div>
    <div class="pt_10">
        <table class="fm-smreap tb01">
            <thead class="bc_1 c_2 fw_b t_a_c">
            <tr>
                <td>ល.រ</td>
                <td>ឈ្មោះ</td>
                <td>ភេទ</td>
                <td>ថ្ងៃខែឆ្នាំកំណើត</td>
                <td>លេខទូរស័ព្ទ</td>
                <td>ថ្ងៃចូលធ្វើការ</td>
                <td>ផ្នែក</td>
                <td>ប្រាក់ខែ</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(stf, skey) in staffs">
                <td>{{skey+1}}</td>
                <td>{{stf.name}}</td>
                <td>{{stf.gender === "male"?"ប្រុស":"ស្រី"}}</td>
                <td>{{a_a.date(stf.birthdate, "kh")}}</td>
                <td>{{stf.tel}}</td>
                <td>{{a_a.date(stf.start_date, "kh")}}</td>
                <td>{{stf.department}}</td>
                <td>{{stf.pre_salary == null ? 'N/A' : numeral(stf.pre_salary).format("$0,0.00")}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
