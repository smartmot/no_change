<div id="scan">
    <div class="bdbtm_1_blk pb_10">
        <label class="fm-smreap">
            <span>ជ្រើសរើសខែ </span>:
            <input v-model="month" type="month" class="input-1 fm-smreap pr_10 pl_10 pt_3 pb_3 box-s1 b_r_3">
        </label>
    </div>
    <div class="pt_10">
        <div class="ovfx_a">
            <table class="fm-smreap cs14">
                <thead>
                <tr>
                    <th>កាលបរិច្ឆេទ</th>
                    <th>ម៉ោងចូល</th>
                    <th>ម៉ោងចេញ</th>
                    <th>លុបវត្តមាន</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(scan, skey) in scans">
                    <td>{{a_a.date(scan[0].date, "k")}}</td>
                    <td v-for="(two, keyi) in [1,2]">{{scan[keyi] ? timez(scan[keyi].times) : ''}}</td>
                    <td>
                        <button @click="trash(scan[0],skey)" class="fm-smreap"><span class="fa fa-trash-o"></span>&nbsp;លុប</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
