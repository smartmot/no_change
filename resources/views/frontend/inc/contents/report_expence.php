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
            <table class="tb03 fm-smreap">
                <thead class="bc_1 c_2 fw_b t_a_c">
                <tr>
                    <td>ល.រ</td>
                    <td>{{ name[filter] }}</td>
                    <td>វិក័យប័ត្រ</td>
                    <td>ចំនួនឥវ៉ាន់</td>
                    <td>ចំនួនទឹកលុយ</td>
                    <td>នៅខ្វះ</td>
                    <td>ទូទាត់រួច</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(exp, ekey) in expenses">
                    <td>{{ekey+1}}</td>
                    <td>{{exp.date ? a_a.date(exp.date) : (exp.month ? a_a.mon(exp.month) : exp.year)}}</td>
                    <td>{{exp.no}}</td>
                    <td>{{numeral(exp.qty).format("0,00")}}</td>
                    <td>{{a_a.money(exp.total, exp.currency)}}</td>
                    <td :class="exp.due == 0 ? 'paid' : 'due'">{{a_a.money(exp.due, exp.currency)}}</td>
                    <td>{{a_a.money(exp.paid, exp.currency)}}</td>
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
            expenses:[],
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
                axios.get("<?php echo route("expense.report");?>",{
                    headers:$_i.headers,
                    params:{
                        filter:nis.filter
                    }
                }).then(function (loaded){
                    nis.expenses = loaded.data;
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
