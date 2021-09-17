<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config("app.name") }}</title>
    <link rel="stylesheet" href="{{ asset("css/print.css") }}" type="text/css">
    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/gildas-lormeau/zip.js/dist/zip-full.min.js"></script>
    <style>
        .ds_f{display: flex;}.t_a_r{text-align: right}.t_a_c{text-align: center}.t_a_l{text-align: left}
        .fm-moul{font-family: Moul, sans-serif;}
        .fm-smreap{font-family: Siemreap, sans-serif}
        .fm-bokor{font-family: "Bokor", sans-serif}
        .wp_100{width: 100%}
        .w_40{width: 40px;}
        .w_45{width: 45px;}
        .w_30{width: 30px;}
        .fs_24{font-size: 24px;}
        .fs_12{font-size: 12px;}
        .p-a{position: absolute}
        .p-r{position: relative}
        .t-0{top: 0;}.r-0{right: 0}.b-0{bottom: 0}.l-0{left: 0}
        .lh_18{line-height: 18px;}
        .pl_20{padding-left: 20px;}
        .pt_10{padding-top: 10px;}
        .pt_3{padding-top: 3px;}
        .pt_5{padding-top: 5px;}
        .fx_4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}
        .pr_8{padding-right: 8px;}
    </style>
</head>
<body style="background-color: gainsboro">
<div class="print a5">
    <div class="margin p-r" id="print" style="background-color: white">
        <div class="fm-moul t_a_c">
            <div class="fs_24 color pen">លី ថៃ</div>
        </div>
        <div class="ds_f color pen">
            <div class="mleft">
                <div class="fm-bokor fs_12 lh_18">
                    <div>ផ្ទះលេខ 75-79</div>
                    <div>សង្កាត់ទួលស្វាយព្រៃ២ </div>
                    <div>ខណ្ណចំការមន ភ្នំពេញ</div>
                </div>
            </div>
            <div class="mmiddle">
                <div class="fm-bokor fs_12 lh_18">
                    <div>លក់បោះដុំ ខោទ្រនាប់ អាវទ្រនាប់ ឈុតកីឡា កន្សែង</div>
                    <div>សារុង អាវសិស្សសាលា ស្រោមដៃ ស្រោមជើង</div>
                    <div>និងសម្លៀកបំពាក់ពីទារកដល់មនុស្សចាស់គ្រប់ប្រភេទ</div>
                </div>
            </div>
            <div class="mright fs_12">
                <div class="pl_20 fm-popp">
                    <div class="ds_f">
                        <div class="w_30">TEL :</div>
                        <div>
                            <div>010 563 093</div>
                            <div>092 235 043</div>
                            <div>096 235 0431</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ds_f pt_5">
            <div class="sec2 fm-smreap fs_12 p-r color pen">
                <div class="p-a b-0 l-0">
                    <div class="ds_f">
                        <div class="w_45">អតិថិជន</div>
                        <div>: លី ឯល</div>
                    </div>
                    <div class="ds_f">
                        <div class="w_45">TEL</div>
                        <div>: 010 563 093</div>
                    </div>
                </div>
            </div>
            <div class="sec2 t_a_c lh_20 color pen">
                <div class="fm-moul pt_3">វិក័យប័ត្រ</div>
                <div class="fm-ubt5">INVOICE</div>
            </div>
            <div class="sec2 p-r">
                <div class="t_a_r p-a b-0 r-0 color red">
                    <span class="fw_b fs_20">N<sup><u>o</u></sup> : </span>
                    <span class="fs_18 fw_b">2021-001</span>
                </div>
            </div>
        </div>
        <div class="pt_5">
            <table class="receipt bc_2" id="receipt">
                <thead>
                <tr>
                    <td>
                        <div>ល.រ</div>
                        <div>N<sup><u>o</u></sup></div>
                    </td>
                    <td>
                        <div>ឈ្មោះទំនិញ</div>
                        <div>Description</div>
                    </td>
                    <td>
                        <div>ចំនួន</div>
                        <div>Quantity</div>
                    </td>
                    <td>
                        <div>តម្លៃរាយ</div>
                        <div>Unit Price</div>
                    </td>
                    <td>
                        <div>តម្លៃសរុប</div>
                        <div>Amount</div>
                    </td>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់</td>
                    <td>200</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់</td>
                    <td>3</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់</td>
                    <td>5</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>អាវកាក់នារីទាន់សម័យ២០២២</td>
                    <td>7</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="3" rowspan="3">
                        <div class="ds_f lh_15 pt_10">
                            <div class="fx_4">
                                <div>អតិថិជន</div>
                                <div>Customer</div>
                            </div>
                            <div class="fx_4">
                                <div>អ្នគិតលុយ</div>
                                <div>Cashier</div>
                            </div>
                            <div class="fx_4">
                                <div>អ្នកលក់</div>
                                <div>Seller</div>
                            </div>
                        </div>
                    </td>
                    <td class="foott">សរុប/Total</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="foott">ទូទាត់/Paid</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="foott">នៅខ្វះ/Due</td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="p-a b-0 l-0 fm-smreap minifoot fs_12">
            <div class="ds_f">
                <div class="w_40">
                    <div class="pr_8 pt_3">
                        <img class="wp_100" src="{{ asset("aba_icon.png") }}" alt="">
                    </div>
                </div>
                <div class="lh_20">
                    <div>001 300 480 (លុយដុល្លា $)</div>
                    <div>001 760 147 (លុយរៀល ៛)</div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="myform" action="javascript:void 0">
    @csrf
    @method("post")
    <input name="save" id="save">
</form>
<img src="" class="p-a l-0 t-0" alt="IMG" id="imger">
<button id="getme" class="p-a t-0 r-0">Get Image</button>
<script>
    JSPM.JSPrintManager.auto_reconnect = true;
    JSPM.JSPrintManager.start();
    var node = document.getElementById("print");
    let cpj;
    /*JSPM.JSPrintManager.WS.onStatusChanged = function () {
        if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Open) {
            cpj = new JSPM.ClientPrintJob();
            cpj.clientPrinter = new JSPM.DefaultPrinter();
            var my_file = new JSPM.PrintFile(dataUrl, JSPM.FileSourceType.URL, 'MyFile.jpg', 1);
            cpj.files.push(my_file);
            cpj.sendToClient();
        }
    };*/
    JSPM.JSPrintManager.WS.onStatusChanged = function () {

    };
    $("#getme").click(function (){
        htmlToImage.toSvg(node,{ quality: 1 })
            .then(function (dataUrl) {
                $("#imger").attr("src", dataUrl);
                axios.post("{{route("save")}}",null,{
                    params:{
                        save:dataUrl,
                    }
                }).then(function (dataz){
                    alert(JSON.stringify(dataz));
                }).catch(function (err){
                    alert(err)
                });
                /*if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Open) {
                    cpj = new JSPM.ClientPrintJob();
                    cpj.clientPrinter = new JSPM.DefaultPrinter();
                    var my_file = new JSPM.PrintFile(dataUrl, JSPM.FileSourceType.URL, 'MyFile.jpg', 1);
                    cpj.files.push(my_file);
                    cpj.sendToClient();
                }*/
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });

    });
</script>
</body>
</html>
