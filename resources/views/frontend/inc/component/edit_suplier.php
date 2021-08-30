<form action="<?php echo route("upload.crop"); ?>" method="post" id="cordformz">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="cord" value="" id="cordz1">
</form>

<form id="coverfxaz" action="javascript:void(0)" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input id="subpro" onchange="$('#coverfxaz').submit()" type="file" name="upload" accept="image/jpeg" hidden>
    <input type="reset" hidden>
</form>

<div id="suppw">
    <div class="p-f wp_100 hp_100 t-0 l-0 z_x_5 box-s1" v-if="edit" style="background-color: rgba(0,0,0,0.70);">
        <div class="cwc bc_4 fm-smreap">
            <form action="javascript:void 0" method="post" id="formda" autocomplete="off" @submit="editing()" spellcheck="false">
                <div class="pr_20 pl_20 pt_10 pb_20">
                    <div>
                        <div>
                            <div class="fm-koulen fs_25">កែសម្រួលអ្នកផ្គត់ផ្គង់៖</div>
                            <div class="c_5 fw_b t_a_c"></div>
                        </div>

                        <div class="pt_4">
                            <label for="name">ឈ្មោះ<span v-if="errors.name" class="c_6"> : {{ errors.name[0] }}</span></label>
                            <div class="ds_f">
                                <input id="name" name="name" v-model="params.name" type="text" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2 input-2">
                            </div>
                        </div>

                        <div class="pt_4">
                            <label for="gender">ភេទ<span v-if="errors.gender" class="c_6"> : {{ errors.gender[0] }}</span></label>
                            <div class="ds_f">
                                <select id="gender" v-model="params.gender" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2 input-2" name="gender" autocomplete="off" onchange="_reset(this)">
                                    <option value="">ភេទ</option>
                                    <option value="male">ប្រុស</option>
                                    <option value="female">ស្រី</option>
                                </select>
                            </div>
                        </div>

                        <div class="pt_4">
                            <label for="tel">លេខទូរស័ព្ទ<span v-if="errors.tel" class="c_6"> : {{ errors.tel[0] }}</span></label>
                            <div class="ds_f">
                                <input id="tel" v-model="params.tel" name="tel" type="text" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2 input-2">
                            </div>
                        </div>

                        <div class="pt_4">
                            <label for="address">អាស័យដ្ឋាន<span v-if="errors.address" class="c_6"> : {{ errors.address[0] }}</span></label>
                            <div class="ds_f">
                                <input id="address" v-model="params.address" name="address" type="text" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2 input-2">
                            </div>
                        </div>

                        <div class="pt_4">
                            <label for="note">សំគាល់<span v-if="errors.note" class="c_6"> : {{ errors.note[0] }}</span></label>
                            <div class="ds_f">
                                <input id="note" v-model="params.note" name="note" type="text" class="oln_n bd_n pr_10 pl_10 fm-smreap wp_100 pt_2 pb_2 input-2">
                            </div>
                        </div>

                        <div class="pt_10">
                            <div class="ds_f">
                                <div class="flx"></div>
                                <div>
                                    <button class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="submit">រក្សារទុក</button>
                                    <button id="reseted" class="pr_20 pl_20 pt_2 pb_2 bc_1 hbc-warning ts_040 oln_n bd_n fm-smreap c_2 csr-p" type="reset" v-on:click="edit = false">ថយក្រោយ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="cropx ca1x1 box-s1 b_r_5 ds_n cropxzer">
    <div class="h_30 lh_30">
        <div class="pr_20 pl_20 fm-ubt">Crop Image</div>
    </div>
    <div class="pr_20 pl_20">
        <div class="h_1 bcolor_4"></div>
        <div class="h_10"></div>
    </div>
    <div class="hp_100 wp_100 p-r">
        <div id="">
            <img id="tocropz1" class="wp_100 imgcz" src="<?php echo asset("icon/16x9_pulse.svg"); ?>" alt="">
        </div>
        <div class="h_50 wp_100">
            <div class="pr_20 pl_20 lh_50">
                <div class="t_a_c">
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" onclick="$('.cropxzer').fadeOut('fast')">
                        <span>Cancel</span>
                    </button>
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-left"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16">
                        <span class="fa fa-rotate-right"></span>
                    </button>&nbsp;
                    <button class="pr_10 pl_10 oln_n bd_n pt_3 pb_3 b_r_3 bcolor_5 color_1 csr-p hcolor_4 fs_16" id="cropbtnz1">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" defer>
    let editsub = new Vue({
        el:"#suppw",
        data:{
            edit:false,
            errors:[],
            supplier:JSON.parse('<?php echo json_encode($supplier); ?>'),
            selected:'<?php echo $supplier["gender"];?>',
            params:{
                name:'<?php echo $supplier["name"];?>',
                tel:'<?php echo $supplier["tel"];?>',
                gender:'<?php echo $supplier["gender"];?>',
                address:'<?php echo $supplier["address"];?>',
                note:'<?php echo $supplier["note"];?>'
            }
        },
        methods:{
            editing:function (){
                let nss = this;
                let editto = "<?php echo route("supplier.update", $supplier["id"]); ?>";
                $_i["params"] = nss.params;
                axios.put(editto,null,$_i)
                .then(response=>{
                    let rsp = response.data;
                    if (rsp.error){
                        nss.errors = rsp.errors;
                    }else{
                        nss.errors=[];
                        nss.supplier=rsp.data;
                        nss.edit = false;
                    }
                })
                .then(function (err){
                })
            }
        },
        mounted:function (){

        }
    });

    var urlz = "<?php echo asset("icon/30x35_pulse.svg"); ?>",
        imagez1 = document.getElementById("tocropz1"),
        cropz1, cdataz1 = {};
    $("#cropbtnz1").click(function (){
        f.r({
            d:function (resp){
                if (!resp.error){
                    $("#newimgz").attr("src", "<?php echo asset("icon/30x35_pulse.svg"); ?>");
                    $(".ca1x1").fadeOut();
                    cropz1.destroy();
                    img.load("<?php echo asset("photo")."/"; ?>"+resp.url, function (){
                        $("#errorz").text("");
                        $("#newimgz")
                            .attr("src", '<?php echo asset("photo").'/'; ?>'+resp.url);
                        $("#progz1")
                            .removeClass("ts_050")
                            .css("width", "0");
                        setTimeout(function (){
                            $("#progz1").addClass("ts_050");
                        },1000);
                        axios.put("<?php echo route("supplier.save", $supplier["id"]); ?>",null,$_i)
                        .then(response=>{
                            let data1 = response.data;
                        })
                        .catch(function (errz){
                            alert(errz);
                        });
                    });
                }else {
                    cropz1.destroy();
                }
            },
            p:function (pro,status){
                $("#progz1").css("width", status+"%");
            },
        },{x:f.f($("#cordformz")),m:"post",t:"json",target:"<?php echo route("upload.crop"); ?>"});
    })
        .prev().click(function (){
        cropz1.rotateTo(cdataz1.r + 90);
    })
        .prev().click(function (){
        cropz1.rotateTo(cdataz1.r - 90);
    });
    $("#coverfxaz").submit(function (e) {
        e.preventDefault();
        f.r({
            d:function (data){
                if (!data.error){
                    urlz = "<?php echo asset("photo"); ?>/" + data.url;
                    $(".ca1x1").fadeIn();
                    imagez1.src = "<?php echo asset("icon/30x35_pulse.svg"); ?>";
                    img.load("<?php echo asset("photo")."/"; ?>"+data.url, function (){
                        imagez1.src = urlz;
                        setTimeout(function (){
                            cropz1 = $f.x(imagez1,function (cords){
                                $("#cordz1").attr("value", JSON.stringify(cords));
                            },{
                                ratio:(6/7)
                            });
                        }, 200);
                    });

                }else{
                    $("#progz1")
                        .removeClass("ts_050")
                        .css("width", "0");
                    setTimeout(function (){
                        $("#progz1").addClass("ts_050");
                    },1000);
                    $("#newimgz").attr("src", "<?php echo asset("photo/".$supplier->photo."_thumb.jpg"); ?>");
                    $("#errorz").text("ការបង្ហោះបរាជ័យ! *<15MB");
                }
            },
            p:function (pro,status){
                $("#progz1").css("width", status+"%");
            },
            r:function (){
                $("#coverfxaz").find("input[type='reset']").click();
            }
        },{x:f.d(this),m:"post",t:"json",target:"<?php echo route("upload.image"); ?>"});
    });
</script>
