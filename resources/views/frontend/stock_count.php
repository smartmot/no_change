<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>រាប់ឥវ៉ាន់ - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<?php
require "inc/header.php"
?>
<?php
require "inc/stock.php";
?>
<?php
require "inc/footer.php";
require "inc/component/stock.php";
?>
</body>
</html>
