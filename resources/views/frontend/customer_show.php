<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>លក់ចេញ - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>
<?php
require "inc/layout.php";
?>
<?php
require "inc/footer.php";
require "inc/component/edit_customer.php";
?>
<script type="text/javascript">
    let content = new Vue({
        el:"#content",
        data:{
            invoices:[],
            filterz:"all",
        },
        watch:{
            filterz:{
                handler(){
                    this.load();
                }
            }
        },
        methods:{
            load:function (){
                let nis = this;
                axios.get("<?php echo route("sale.index"); ?>",{
                    headers:$_i.headers,
                    params:{
                        customer_id:"<?php echo $customer->id; ?>",
                        filter:nis.filterz
                    }
                }).then(function (loaded){
                    if (loaded.data.error){

                    }else{
                        nis.invoices = loaded.data.data;
                    }
                }).catch(function (err){
                    alert(err);
                })
            },
            money:function (money,currency){
                switch (currency){
                    case "riel":
                        return numeral(money).format('0,0') + "៛";
                        break;
                    case "usd":
                        return numeral(parseFloat(money)).format('0,0.00$');
                        break;
                    case "bath":
                        return numeral(money).format('0,0') + "បាត";
                        break;
                    default:
                        return numeral(parseFloat(money)).format('$0,0.00');
                        break;
                }
            },
        },
        mounted:function (){
            let nis = this;
            $_c.watch("config",function (){
                nis.load();
            });
        }
    });
</script>
</body>
</html>
