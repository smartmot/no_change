<div id="expense">
    <div>
        <div class="bdbtm_1_blk pb_10">
            Filter :
            <select class="default" v-model="filter">
                <option value="day">ប្រចាំថ្ងៃ</option>
                <option value="month">ប្រចាំខែ</option>
                <option value="year">ប្រចាំឆ្នាំ</option>
            </select>
        </div>
        <div class="pt_10 ovfx_a">
            <table class="tb05 fm-smreap">
                <thead class="bc_1 c_2 fw_b t_a_c">
                <tr>
                    <td>ល.រ</td>
                    <td>{{ name[filter] }}</td>
                    <td>ចំណូល</td>
                    <td>ចំណាយ</td>
                    <td>ចំ.បុគ្គលិគ</td>
                    <td>ចំណេញ</td>
                    <td>ជំពាក់អ្នកផ្គត់ផ្គង់</td>
                    <td>អតិថិជនជំពាក់</td>
                    <td>លុយជាក់ស្ដែង</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(net, ikey) in net_incomes">
                    <td>{{ikey+1}}</td>
                    <td>{{net.date ? a_a.date(net.date) : (net.month ? a_a.mon(net.month) : net.year)}}</td>
                    <td>{{a_a.money(net.income.total)}}</td>
                    <td>{{a_a.money(net.expense)}}</td>
                    <td>{{a_a.money(net.salary)}}</td>
                    <td>{{a_a.money(net.net)}}</td>
                    <td>{{a_a.money(net.sup_due)}}</td>
                    <td :class="net.income.total === net.income.paid ? 'paid':'due'">{{a_a.money(net.income.total - net.income.paid)}}</td>
                    <td>{{a_a.money(net.net - (net.income.total - net.income.paid) + net.sup_due)}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let expense = new Vue({
        el:"#expense",
        data:{
            net_incomes:[],
            filter:"day",
            name:{
                day:"ថ្ងៃទី",
                month:"ខែ",
                year:"ឆ្នាំ"
            }
        },
        watch:{
            filter:{
                handler(){
                    this.load();
                }
            }
        },
        methods:{
            load:function (){
                let nis = this;
                axios.get("<?php echo route("expense.net");?>",{
                    headers:$_i.headers,
                    params:{
                        filter:nis.filter
                    }
                }).then(function (loaded){
                    nis.net_incomes = loaded.data;
                })
            }
        },
        mounted() {
            let nis = this;
            $_c.watch("config", function (){
                nis.load();
            });
        }
    });
</script>
