<div id="expense">
    <div>
        <div class="bdbtm_1_blk pb_10">
            Filter :
            <select class="default" v-model="filter">
                <option value="all">របាយការណ៌</option>
                <option value="day">ប្រចាំថ្ងៃ</option>
                <option value="month">ប្រចាំខែ</option>
                <option value="year">ប្រចាំឆ្នាំ</option>
            </select>
        </div>
        <div class="pt_10 ovfx_a">
            <table class="tb04 fm-smreap">
                <thead class="bc_1 c_2 fw_b t_a_c">
                <tr>
                    <td>ល.រ</td>
                    <td>{{ name[filter] }}</td>
                    <td>វិក័យប័ត្រ</td>
                    <td>សរុប</td>
                    <td>ទូទាត់</td>
                    <td>នៅខ្វះ</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(income, ikey) in incomes">
                    <td>{{ikey+1}}</td>
                    <td>{{income.date ? a_a.date(income.date) : (income.month ? a_a.mon(income.month) : income.year)}}</td>
                    <td>{{income.no}}</td>
                    <td>{{a_a.money(income.total, income.currency)}}</td>
                    <td>{{a_a.money(income.paid, income.currency)}}</td>
                    <td :class="income.dues == 0 ? 'paid':'due'">{{a_a.money(income.dues, income.currency)}}</td>
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
            incomes:[],
            filter:"all",
            name:{
                all:"កាលបរិច្ឆេទ",
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
                axios.get("<?php echo route("expense.income");?>",{
                    headers:$_i.headers,
                    params:{
                        filter:nis.filter
                    }
                }).then(function (loaded){
                    nis.incomes = loaded.data;
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
