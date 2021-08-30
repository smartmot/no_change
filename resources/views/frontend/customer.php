<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>អតិថិជន - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>

<div class="pt_10">
    <div id="customer">
        <div class="rowc">
            <div class="xl-2 lg-2p5 md-3 sm-6 fx_12" v-for="cust in customers">
                <div class="pr_10 pl_10 pb_10">
                    <div class="pr_10 pl_10 pt_10 pb_10 bc_1 c_2">
                        <div>
                            <img class="wp_100" v-bind:src="'<?php echo asset("photo"); ?>/'+cust.photo+'_thumb.jpg'"  alt="">
                        </div>
                        <div class="fm-smreap lh_20 fs_15 pt_5">
                            <div>{{ cust.name }}</div>
                            <div class="ds_f">
                                <div class="w_30">ID</div>
                                <div>: 001</div>
                            </div>

                            <div class="ds_f">
                                <div class="w_30">Tel</div>
                                <div>: 010563093</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "inc/footer.php"
?>
<script type="text/javascript" defer>
    $_accept();
    let customer = new Vue({
        el:"#customer",
        data:{
            customers:[],
            params:[]
        },
        methods:{

        },
        mounted:function (){
            let niiss=this;
            setTimeout(function (){
                axios.get("<?php echo route("customer.index"); ?>", {
                    headers:$_i.headers,
                    params:niiss.params
                }).then(response=>{
                    niiss.customers = response.data;
                }).catch(function (err){
                    alert(err);
                })
            },500);
        }
    });
</script>
</body>
</html>
