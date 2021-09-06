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
    setTimeout(function (){
        $("#keyword").focus();
    },100);
    setInterval(function (){
        $("#keyword").focus();
    },3000);
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[4].classList.add("active");
    let timm = setTimeout(function (){},100);
    let scan = new Vue({
        el:".mainpg",
        data:{
            staff:[],
            keyword:"",
            error:false,
            recent:[],
            exist:false,
        },
        watch:{
            keyword:{
                handler(){
                    clearTimeout(this.timer);
                    let watch = this;
                    this.timer = setTimeout(function (){
                        if (watch.keyword === ''){
                            clearTimeout(timm);
                            timm = setTimeout(function (){
                                watch.reset();
                            },3000);
                        }else{
                            watch.scan();
                            clearTimeout(timm);
                            timm = setTimeout(function (){
                                watch.reset();
                            },3000);
                        }
                    },200);
                }
            },
            error:{
                handler(){
                    if (this.error){
                        this.play();
                    }
                }
            }
        },
        mounted() {
            let nis = this;
            setInterval(function (){
                if (nis.recent.length > 0){
                    nis.recent.shift();
                }
            },20000);
        },
        methods:{
            scan:function (){
                let scanning = this;
                let is_recent = this.recent.includes(parseInt(this.keyword));
                if (is_recent){
                    this.error = true;
                    scanning.keyword = '';
                    setTimeout(function (){
                        scanning.error = false;
                    },5000);
                }else{
                    scanning.error = false;
                    axios.post("<?php echo route("scan.store"); ?>",null,{
                        headers:$_i.headers,
                        params:{
                            mode:"id",
                            keyword:scanning.keyword
                        }
                    }).then(function (scanned){
                        if (!scanned.data.error){
                            scanning.staff = scanned.data.staff;
                            scanning.recent.push(parseInt(scanned.data.staff.id));
                            setTimeout(function (){
                                scanning.keyword = '';
                            },100);
                        }else {
                            scanning.play();
                            setTimeout(function (){
                                scanning.keyword = '';
                            },100);
                            if (scanned.data.check){
                                scanning.staff = scanned.data.staff;
                                scanning.exist = scanned.data.check;
                            }else{
                                scanning.staff = [];
                            }
                        }
                    }).catch(function (error){
                        alert(error);
                    })
                }
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
                let nis = this;
                $("#faderz").slideUp(500);
                this.timer = setTimeout(function (){
                    nis.staff = [];
                    nis.keyword = '';
                },501);
                $("#keyword").focus();
                this.exist = false;
            },
            play:function (){
                let error = document.getElementById("play");
                error.playbackRate = 1.7;
                error.play();
            },
            timer:setTimeout(function (){})
        }
    });
</script>
</body>
</html>
