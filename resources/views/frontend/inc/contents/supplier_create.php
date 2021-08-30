<div>
    <div class="ds_f">
        <div class="xl-6 lg-6 md-12 sm-12 fx_12">
            <div>
                <form id="formzz" action="javascript:void 0" method="post" class="" autocomplete="off" onsubmit="create(f.d(this))">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="ds_f">
                        <div class="w_200 p-r">
                            <img id="newimg" class="wp_100 box-s4" src="<?php echo asset("profile.svg"); ?>" alt="">
                            <div class="p-a b_13" style="right: 85px;">
                                <label for="thumb" class="w_30 ds_b h_30 bc_1 c_2 lh_30 t_a_c b_r_c box-s1 csr-p hbc-warning">
                                    <span class="fa fa-camera"></span>
                                </label>
                            </div>
                            <div id="prog" class="h_3 w_80 bc_5 ts_050" style="width: 0"></div>
                            <div class="t_a_c pt_4 fs_13 fm-popp color_4" id="error"></div>
                        </div>
                        <div class="flx">
                            <div class="pl_10">
                                <div class="fm-smreap">
                                    <label for="name">ឈ្មោះ<span class="c_6"></span></label>
                                </div>
                                <div class="ds_f">
                                    <input class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="text" id="name" placeholder="ឈ្មោះ" name="name" autocomplete="off" onchange="_reset(this)">
                                </div>

                                <div class="fm-smreap pt_10">
                                    <label for="ids">អាយឌី<span class="c_6"></span></label>
                                </div>
                                <div class="ds_f">
                                    <input class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="text" id="ids" placeholder="ID" name="ids" autocomplete="off" onchange="_reset(this)">
                                </div>

                                <div class="fm-smreap pt_10">
                                    <label for="gender">ភេទ<span class="c_6"></span></label>
                                </div>
                                <div class="ds_f">
                                    <select id="gender" class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" name="gender" autocomplete="off" onchange="_reset(this)">
                                        <option value="">ភេទ</option>
                                        <option value="male">ប្រុស</option>
                                        <option value="female">ស្រី</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="fm-smreap pt_10">
                            <label for="tel">លេខទូរស័ព្ទ<span class="c_6"></span></label>
                        </div>
                        <div class="ds_f">
                            <input class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="text" id="tel" placeholder="លេខទូរស័ព្ទ" name="tel" autocomplete="off" onchange="_reset(this)">
                        </div>

                        <div class="fm-smreap pt_10">
                            <label for="address">អាសយដ្ឋាន<span class="c_6"></span></label>
                        </div>
                        <div class="ds_f">
                            <input class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="text" id="address" placeholder="អាសយដ្ឋាន" name="address" autocomplete="off" onchange="_reset(this)">
                        </div>

                        <div class="fm-smreap pt_10">
                            <label for="note">សំគាល់<span class="c_6"></span></label>
                        </div>
                        <div class="ds_f">
                            <input class="input-1 box-s4 bd_n b_r_4 pt_5 pb_5 fm-smreap wp_100 fs_16 pr_10 pl_10" type="text" id="note" placeholder="សំគាល់" name="note" autocomplete="off" onchange="_reset(this)">
                        </div>
                    </div>
                    <div class="ds_f mt_20">
                        <div class="flx"></div>
                        <div>
                            <button class="oln_n bd_n pr_30 pl_30 pt_4 pb_4 fm-smreap bc_1 c_2 csr-p hbc-warning b_r_4" type="submit">បន្ថែម</button>
                        </div>
                        <button type="reset" id="reset" hidden></button>
                    </div>
                </form>
            </div>
            <div class="pt_10 t_a_c">
                <div class="c_1 fm-smreap fw_b fs_16 ds_n" id="msg">បានបញ្ចូលក្នុងបញ្ជី! </div>
            </div>
        </div>
    </div>
</div>

<div class="cropx axaz1 box-s1 b_r_5 ds_n bc_1">
    <div class="h_30 lh_30">
        <div class="pr_20 pl_20 fm-ubt">Crop Image</div>
    </div>
    <div class="pr_20 pl_20">
        <div class="h_1 bcolor_4"></div>
        <div class="h_10"></div>
    </div>
    <div class="hp_100 wp_100 p-r">
        <div id="">
            <img id="tocrop" class="imgcz" src="" alt="">
        </div>
        <div class="h_50 wp_100">
            <div class="pr_20 pl_20 lh_50">
                <div class="t_a_c">
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" onclick="$('.axaz1').fadeOut('fast')">
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

<form action="<?php echo route("upload.crop"); ?>" method="post" id="cordform">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="cord" value="" id="cord">
</form>

<form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input id="thumb" onchange="$('#coverf').submit()" type="file" name="upload" accept="image/jpeg" hidden>
    <input type="reset" hidden>
</form>

<script type="text/javascript">
    $_accept();
    let create = function (dataz){
        axios.post("<?php echo route("supplier.store"); ?>",dataz,$_i).then(response=>{
           let resl = response.data;
           if (resl.error){
              let errors = Object.keys(resl.errors);
              for (let iz =0; iz < errors.length; iz++){
                  $("label[for='"+errors[iz]+"'] span").text(" : "+ resl.errors[errors[iz]][0]);
              }
           }else{
               $("#msg").fadeIn('fast');
               $("#reset").click();
               $("#newimg").attr("src","<?php echo asset("profile.svg"); ?>");
               setTimeout(function (){
                   $("#msg").fadeOut('fast');
               },8000);
           }
        });
    };
    function _reset(ele){
        $(ele.parentNode).prev().children('label').children("span").text("");
    }
    var url = "<?php echo asset("icon/30x35_pulse.svg"); ?>",
        image = document.getElementById("tocrop"),
        crop, cdata = {};
    $("#cropbtn").click(function (){
        f.r({
            d:function (resp){
                if (!resp.error){
                    $("#newimg").attr("src", "<?php echo asset("icon/30x35_pulse.svg"); ?>").next().hide();
                    $(".cropx").fadeOut();
                    crop.destroy();
                    img.load("<?php echo asset("photo")."/"; ?>"+resp.url, function (){
                        $("input[name='thumbnail']").attr("value",'<?php echo asset("photo").'/'; ?>'+resp.url);
                        $("#error").text("");
                        $("#newimg")
                            .attr("src", '<?php echo asset("photo").'/'; ?>'+resp.url).next().show();
                        $("#prog")
                            .removeClass("ts_050")
                            .css("width", "0");
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
        },{x:f.f($("#cordform")),m:"post",t:"json",target:"<?php echo route("upload.crop"); ?>"});
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
                    url = "<?php echo asset("photo"); ?>/" + data.url;
                    $(".cropx").fadeIn();
                    image.src = "<?php echo asset("icon/16x9_pulse.svg"); ?>";
                    img.load("<?php echo asset("photo")."/"; ?>"+data.url, function (){
                        image.src = url;
                        setTimeout(function (){
                            crop = $f.x(image,function (cord){
                                $("#cord").attr("value", JSON.stringify(cord));
                            },{
                                ratio:(6/7)
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
                    $("#newimg").attr("src", "<?php echo asset("icon/30x35_pulse.svg"); ?>").next().show();
                    $("#error").text(data.upload[0]);
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
            r:function (){
                $("#coverf").find("input[type='reset']").click();
            }
        },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("upload.image"); ?>"});
    });
</script>
