<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ទិញចូល - <?php echo config("app.name");?></title>
    <?php
    require "inc/asset.php"
    ?>
</head>
<body>
<form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="post">
    <input id="thumb" onchange="$('#coverf').submit()" type="file" name="upload" accept="image/jpeg">
    <input type="reset" hidden>
</form>

<script>
    $("#coverf").submit(function (e) {
        e.preventDefault();
        let url = "<?php echo route("upload.image"); ?>";
        let data =f.d(this);
        axios.post(url, data)
        .then(function (resp){
            alert(JSON.stringify(resp.data));
        })
        .catch(function (err){
            alert(err);
        })
    });
</script>
</body>
</html>
