<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>អតិថិជនចាស់ - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>
<?php
require "inc/sell.php";
?>
<?php
require "inc/footer.php"
?>
<script type="text/javascript">
    $_accept();
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[1].classList.add("active");
</script>
</body>
</html>
