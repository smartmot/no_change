<div id="scan">
    <div class="bdbtm_1_blk pb_10">
        <label class="fm-smreap">
            <span>ជ្រើសរើសខែ </span>
            <input v-model="month" type="month" class="input-1 pr_10 pl_10 pt_3 pb_3 bc_1 c_2 box-s1 b_r_3">
        </label>
    </div>
    <div class="pt_10">
        <div>
            <table class="gentab fm-smreap">
                <thead>
                <tr>
                    <th>កាលបរិច្ឆេទ</th>
                    <th>ចេញ</th>
                    <th>ចូល</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="scan in scans">
                    <td>{{scan[0].date}}</td>
                    <td v-for="sub in scan">{{sub.times}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let scanned = new Vue({
        el:"#scan",
        data:{
            month:"<?php echo date("Y-m"); ?>",
            staff_id:"<?php echo $staff->id; ?>",
            scans:[],
        },
        mounted() {
            let nis = this;
            $_c.watch("config",function (){
                nis.load();
            });
        },
        methods:{
            load:function (){
                let nsi = this;
                axios.get("<?php echo route("scan.index"); ?>",{
                    headers:$_i.headers,
                    params:{
                        staff_id:nsi.staff_id,
                        month:nsi.month,
                    }
                }).then(function (loaded){
                    if (!loaded.data.error){
                        nsi.scans = loaded.data.scan;
                    }
                }).catch(function (err){
                    alert(err)
                })
            }
        }
    });
</script>
