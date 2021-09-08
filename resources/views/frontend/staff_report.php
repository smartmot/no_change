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
require "inc/staff.php";
?>
<?php
require "inc/footer.php"
?>
<script type="text/javascript">
    $_accept();
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[4].classList.add("active");
    let staff = new Vue({
        el:".mainpg",
        data:{
            staffs:[],
            keyword:"",
            mode:"id",
        },
        watch:{
            mode:{
                handler(){
                    if (this.keyword !== ''){
                        this.search();
                    }
                }
            },
            keyword:{
                handler(){
                    let nis = this;
                    clearTimeout(this.timer);
                    this.timer = setTimeout(function (){
                        if (nis.keyword === ''){
                            nis.load();
                        }else{
                            nis.search();
                        }
                    },350);
                }
            }
        },
        mounted() {
            let nis = this;
            $_c.watch("config",function (){
                nis.load();
            });
        },
        methods:{
            search:function (){
                let nis = this;
                axios.get("<?php echo route("staff.index") ?>",{
                    headers:$_i.headers,
                    params:{
                        keyword:nis.keyword,
                        mode:nis.mode,
                    }
                }).then(function (result){
                    nis.staffs = result.data;
                }).catch(function (error){
                    alert(error);
                })
            },
            load:function (){
                let nis = this;
                axios.get("<?php echo route("staff.index") ?>",$_i).then(function (result){
                    nis.staffs = result.data;
                }).catch(function (error){
                    alert(error);
                })
            },
            timer:setTimeout(function (){

            },500)
        }
    });
</script>
</body>
</html>
