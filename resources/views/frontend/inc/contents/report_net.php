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
                <tr v-for="(net, ikey) in net_incomes">
                    <td>{{ikey+1}}</td>
                    <td></td>
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
                axios.get("<?php echo route("expense.income");?>",{
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
