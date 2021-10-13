<div id="ssqq">
    <div class="pb_10 bdbtm_1_blk fm-smreap">
        Filter :
        <select class="fm-smreap input-1 bc_1 c_2 oln_n bd_n pr_10 pl_10">
            <option value="all">ទាំងអស់</option>
            <option v-for="year in <?php echo date("Y") - 2020; ?>">{{ <?php echo date("Y"); ?> - (year+1) }}</option>
        </select>
    </div>
    <div class="pt_5">
        <div>
            <table class="gtable fm-smreap">
                <thead class="bc_1 c_2">
                <tr>
                    <td>ខែឆ្នាំ</td>
                    <td>ប្រាក់ខែគោល</td>
                    <td>វត្តមាន</td>
                    <td>ប្រាក់ខែ</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="his in histories">
                    <td>{{his.id}}</td>
                    <td>{{his.was_salary.salary}}</td>
                    <td>{{his.id}}</td>
                    <td>{{his.id}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let ssqq = new Vue({
        el:"#ssqq",
        data:{
            histories:[],
        },
        mounted() {
            let nis = this;
            $_c.watch("config",function (){
                nis.load();
            });
        },
        methods:{
            load:function (){
                let nis = this;
                axios.get("<?php echo route("report.his"); ?>",{
                    headers:$_i.headers,
                    params:{
                        staff_id:"<?php echo $staff->id; ?>",
                    }
                }).then(function (loaded){
                    nis.histories = loaded.data;
                }).catch(function (error){
                    alert(error);
                });
            }
        }
    });
</script>
