<div>
    <div id="customer">
        <form id="fileupload" action="javascript:void(0)" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input id="thumb" onchange="$('#fileupload').submit()" type="file" name="upload" accept="image/jpeg" hidden>
            <input type="reset" hidden>
        </form>

        <div class="rowc">
            <div class="xl-6 lg-8 md-12 sm_12 fx_12">
                <form id="cusform" action="javascript:void 0" method="post" autocomplete="off" v-on:submit="create()">
                    <input type="hidden" name="photo" id="photo">
                    <div class="pr_10 pl_10">
                        <div class="rowc">
                            <div class="ctmer1">
                                <div class="cs11">
                                    <div class="p-r">
                                        <div>
                                            <img id="newimg" class="wp_100 box-s4" src="<?php echo asset("profile.svg"); ?>" alt="">
                                        </div>
                                        <label for="thumb" class="p-a ds_b w_30 h_30 bc_1 c_2 b_r_c lh_30 t_a_c csr-p box-s1 b_10" style="right: calc(50% - 15px)">
                                            <span class="fa fa-camera"></span>
                                        </label>
                                    </div>
                                    <div class="h_3 bc_5 mt_2" style="width: 0" id="prog"></div>
                                </div>
                            </div>
                            <div class="ctmer2 fm-smreap">
                                <div>
                                    <label for="name">ឈ្មោះ<span v-if="errors.name" class="c_6"> : {{ errors.name[0] }}</span></label>
                                    <div class="ds_f">
                                        <input id="name" v-model="params.name" name="name" class="input-1 box-s4 bd_n b_r_4 pt_3 pb_3 fm-smreap wp_100 fs_16 pr_10 pl_10">
                                    </div>
                                </div>
                                <div class="pt_5">
                                    <label for="gender">ភេទ<span v-if="errors.gender" class="c_6"> : Invalid</span></label>
                                    <div class="ds_f">
                                        <select v-model="params.gender" id="gender" name="gender" class="input-1 box-s4 bd_n b_r_4 pt_3 pb_3 fm-smreap wp_100 fs_16 pr_10 pl_10">
                                            <option value="">ភេទ</option>
                                            <option value="male">ប្រុស</option>
                                            <option value="female">ស្រី</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="pt_5">
                                    <label for="tel">លេខទូរស័ព្ទ<span v-if="errors.tel" class="c_6"> : {{ errors.tel[0] }}</span></label>
                                    <div class="ds_f">
                                        <input id="tel" v-model="params.tel" name="tel" class="input-1 box-s4 bd_n b_r_4 pt_3 pb_3 fm-smreap wp_100 fs_16 pr_10 pl_10">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt_5 fm-smreap">
                            <label for="address">អាសយដ្ឋាន<span v-if="errors.address" class="c_6"> : {{ errors.address[0] }}</span></label>
                            <div class="ds_f">
                                <input id="address" v-model="params.address" name="address" class="input-1 box-s4 bd_n b_r_4 pt_3 pb_3 fm-smreap wp_100 fs_16 pr_10 pl_10">
                            </div>
                        </div>

                        <div class="pt_5 fm-smreap">
                            <label for="note">សំគាល់<span v-if="errors.note" class="c_6"> : {{ errors.note[0] }}</span></label>
                            <div class="ds_f">
                                <input id="note" v-model="params.note" name="note" class="input-1 box-s4 bd_n b_r_4 pt_3 pb_3 fm-smreap wp_100 fs_16 pr_10 pl_10">
                            </div>
                        </div>

                        <div class="pt_10">
                            <div>
                                <label class="fm-smreap us_n">
                                    <input v-model="multiple" class="fs_20" type="checkbox">&nbsp;<span>បញ្ចូលច្រើនទៀត</span>
                                </label>
                            </div>
                            <div class="fm-smreap fs_14 c-success" v-if="flash">
                                <span class="fa fa-check"></span> &nbsp;បានបញ្ចូលក្នុងបញ្ជី
                            </div>
                        </div>

                        <div class="pt_10">
                            <div class="ds_f">
                                <div class="flx"></div>
                                <div>
                                    <button class="oln_n bd_n bc_1 pr_20 pl_20 pt_3 pb_3 fm-smreap b_r_3 c_2 csr-p hbc-danger" type="submit">រក្សារទុក</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
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
            <img id="cropimage" class="imgcz" src="" alt="">
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

<form action="<?php echo asset("upload/crop"); ?>" method="post" id="cordform1">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="cord" value="" id="cord">
</form>

<script type="text/javascript">
    $_accept();
    let vapp = new Vue({
        el:"#customer",
        data:{
            errors:[],
            params:{
                name:"",
                gender:"",
                tel:"",
                address:"",
                note:"",
            },
            multiple:false,
            flash:false,
        },
        methods:{
            create:function (){
                let crte = this;
                crte.errors = [];
                axios.post("<?php echo route("customer.store"); ?>", null, {
                    headers:$_i.headers,
                    params:this.params,
                }).then(function (created){
                    if (created.data.error){
                        crte.errors = created.data.errors;
                    }else{
                        crte.flash = true;
                        setTimeout(function (){
                            crte.flash = false;
                        },3000);
                        if (crte.multiple){
                            crte.params = {name:"", gender:"", tel:"", address:"", note:"",};
                            $("#newimg").attr("src", "<?php echo asset("profile.svg"); ?>");
                        }else{
                            window.location.href = "<?php echo route("sell.customer"); ?>";
                        }
                    }
                }).catch(function (c_error){
                    alert(c_error);
                })
            }
        }
    });
    let menu = document.getElementsByClassName("hmenu")[0];
    menu.getElementsByTagName("a")[1].classList.add("active");
    let imagez = document.getElementById("cropimage");
    let img_url = "<?php echo asset("icon/16x9_pulse.svg"); ?>", croperz, cordsz = {};

    $("#cropbtn").click(function (){
        f.r({
            d:function (resp){
                if (!resp.error){
                    $("#newimg").attr("src", "<?php echo asset("icon/30x35_pulse.svg"); ?>");
                    $(".cropx").fadeOut();
                    croperz.destroy();
                    img.load("<?php echo asset("photo")."/"; ?>"+resp.url, function (){
                        $("#newimg")
                            .attr("src", '<?php echo asset("photo").'/'; ?>'+resp.url);
                        $("#prog")
                            .removeClass("ts_050")
                            .css("width", "0");
                        setTimeout(function (){
                            $("#prog").addClass("ts_050");
                        },1000);
                    });
                }else {
                    croperz.destroy();
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
        },{x:f.f($("#cordform1")),m:"post",t:"json",target:"<?php echo route("upload.crop"); ?>"});
    })
        .prev().click(function (){
        croperz.rotateTo(cdata.r + 90);
    })
        .prev().click(function (){
        croperz.rotateTo(cdata.r - 90);
    });

    $("#fileupload").submit(function (e){
        e.preventDefault();
        f.r({
            d:function (uploaded){
                if (uploaded.error){

                }else{
                    img_url = "<?php echo asset("photo"); ?>/" + uploaded.url;
                    imagez.src = "<?php echo asset("icon/16x9_pulse.svg"); ?>";
                    $(".cropx").fadeIn();
                    img.load(img_url, function (){
                        imagez.src = img_url;
                        setTimeout(function (){
                            croperz = $f.x(imagez,function (cord){
                                $("#cord").attr("value", JSON.stringify(cord));
                            },{
                                ratio:(6/7)
                            });
                        }, 200);
                    });
                }
            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
        },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("upload.image"); ?>"})
    });

</script>
