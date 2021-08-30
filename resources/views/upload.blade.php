<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/fx.js") }}"></script>
</head>
<body>

<div class="xl-6 lg-6 md-12 sm-12 fx_12 us_n">
    <div class="pr_5 pl_5 pb_10">
        <div class="p-r">
            <img id="newimg" class="wp_100 box-s1" src="https://bkworld.asia/icon/blank_16x9.svg" alt="">
            <div class="p-a" style="right: calc(50% - 25px); top: calc(50% - 25px)">
                <label for="thumb" class="fs_30 ds_b w_50 lh_50 h_50 t_a_c color_5 hcolor_4 acolor_4 csr-p">
                    Upload
                </label>
            </div>
        </div>
        <div id="prog" class="h_3 w_80 bc_red ts_050" style="width: 0"></div>
        <div class="t_a_c pt_4 fs_13 fm-popp color_4" id="error"></div>
    </div>
</div>

<form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    @csrf
    @method("post")
    <input id="thumb" onchange="$('#coverf').submit()" type="file" name="upload" accept="image/jpeg" hidden>
    <input type="reset" hidden>
</form>

<div class="cropx box-s1 b_r_5 ds_n">
    <div class="h_30 lh_30">
        <div class="pr_20 pl_20 fm-ubt">Crop Image</div>
    </div>
    <div class="pr_20 pl_20">
        <div class="h_1 bcolor_4"></div>
        <div class="h_10"></div>
    </div>
    <div class="hp_100 wp_100 p-r">
        <div id="">
            <img id="tocrop" class="wp_100" src="https://bkworld.asia/icon/16x9_pulse.svg" alt="">
        </div>
        <div class="h_50 wp_100">
            <div class="pr_20 pl_20 lh_50">
                <div class="t_a_c">
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span>Cancel</span>
                    </button>
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-left"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-right"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" id="cropbtn">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>


<form action="{{ route("crop") }}" method="post" id="cordform">
    @csrf
    @method("post")
    <input type="hidden" name="cord" value="" id="cord">
</form>
<script>
    var url = "https://bkworld.asia/icon/16x9_pulse.svg",
        image = document.getElementById("tocrop"),
        crop, cdata ={};
    $("#cropbtn").click(function (){
        f.r({
            d:function (resp){
                if (!resp.error){
                    $("#newimg").attr("src", "https://bkworld.asia/icon/16x9_pulse.svg").next().hide();
                    $(".cropx").fadeOut();
                    crop.destroy();
                    img.load("{{ asset("photo") }}/"+resp.url, function (){
                        setTimeout(function (){
                            $("#prog").addClass("ts_050");
                        },1000);
                    });
                }else {
                    crop.destroy();
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
        },{x:f.f($("#cordform")),m:"post",t:"json",target:"{{ route("crop") }}"});
    })
        .prev().click(function (){
        crop.rotateTo(cdata.r + 90);
    })
        .prev().click(function (){
        crop.rotateTo(cdata.r - 90);
    });
    $("#coverf").submit(function (e) {
        e.preventDefault();
        f.r({
            d:function (data){
                if (!data.error){
                    url = "{{ asset("photo") }}/" + data.url;
                    $(".cropx").fadeIn();
                    image.src = "https://bkworld.asia/icon/16x9_pulse.svg";
                    img.load("{{ asset("photo") }}/"+data.url, function (){
                        image.src = url;
                        setTimeout(function (){
                            crop = $f.x(image,function (cord){
                                $("#cord").attr("value", JSON.stringify(cord));
                            });
                        }, 200);
                    });
                }else{
                    $("#prog")
                        .removeClass("ts_050")
                        .css("width", "0");
                    setTimeout(function (){
                        $("#prog").addClass("ts_050");
                    },1000);
                    $("#newimg").attr("src", "https://bkworld.asia/icon/blank_16x9.svg").next().show();
                    $("#error").text(data.upload[0]);
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
            r:function (){
                $("#coverf").find("input[type='reset']").click();
            }
        },{x:f.d(this),m:"post",t:"json",target:"{{ route("upload") }}"});
    });
</script>

</body>
</html>
