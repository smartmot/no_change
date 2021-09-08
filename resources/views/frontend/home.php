<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo config("app.name"); ?></title>
    <?php
    require "inc/asset.php";
    ?>
    <script src="<?php echo asset("js/script.js"); ?>"></script>
</head>
<body class="ovfy_h">
<?php
require "inc/header.php";
?>

<div class="ovfy_h">
    <div class="ovfy_h">
        <img class="wp_100" src="<?php echo asset("home.jpg"); ?>" alt="">
    </div>
</div>
<?php
require "inc/footer.php";
?>
<script type="text/javascript">

</script>
</body>
</html>
