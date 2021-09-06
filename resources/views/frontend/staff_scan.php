<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>វត្តមាន - <?php echo config("app.name");?></title>
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
require "inc/footer.php"
?>
<script type="text/javascript">
    $_accept();
    setInterval(function (){
        $("#keyword").focus();
    },3000);
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[4].classList.add("active");
    let scan = new Vue({
        el:".mainpg",
        data:{
            staff:[],
            keyword:"1",
        },
        watch:{
            keyword:{
                handler(){
                    clearTimeout(this.timer);
                    let watch = this;
                    this.timer = setTimeout(function (){
                        if (watch.keyword === ''){
                            watch.reset();
                        }else{
                            watch.scan();
                        }
                    },200);
                }
            }
        },
        mounted() {
            let nis = this;
            $_c.watch("config", function (){
                nis.scan();
            });
        },
        methods:{
            scan:function (){
                let scanning = this;
                axios.get("<?php echo route("staff.index"); ?>",{
                    headers:$_i.headers,
                    params:{
                        mode:"id",
                        keyword:scanning.keyword
                    }
                }).then(function (scanned){
                    if (scanned.data.length > 0){
                        scanning.staff = scanned.data[0];
                    }
                }).catch(function (error){
                    alert(error);
                })
            },
            image:function (){
                let gotted = "<?php echo asset("profile.svg"); ?>";
                if (this.staff.photo){
                    let img = this.staff.photo;
                    if (img !== ""){
                        gotted = "<?php echo asset("photo"); ?>/" + img + "_thumb.jpg";
                    }
                }else{
                    gotted = false;
                }
                return gotted;
            },
            reset:function (){
                this.keyword = '';
                this.staff = [];
            },
            timer:setTimeout(function (){})
        }
    });
</script>
</body>
</html>
