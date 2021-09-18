<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        /* khmer */
        .print.a5{
            width: 14.8cm;
            height: 21cm;
            margin: 0 auto;
            background-color: white;
        }
        .print.a5 .margin{
            width: 12.8cm;
            height: 19cm;
            padding: 1cm;
        }
        .color.pen{color: #3C54A5;}
        .color.red{color: red;}
        .print.a5 .mmiddle{
            width: 5.8cm;
            text-align: center;
        }
        .print.a5 .mleft
        {
            width: 3.5cm;
        }
        .mleft{

        }
        .mmiddle{

        }
        .mright1{width: 1.3cm;text-align: right;}
        .mright2{width: 2.2cm}
        .print.a5 .sec2:nth-child(2){
            width: 3cm;
        }
        .print.a5 .sec2:first-child,
        .print.a5 .sec2:last-child{
            width: 4.9cm;
        }
        .receipt{
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }
        .receipt thead td{
            font-family: "khmerossiemreap",Siemreap, sans-serif;
            line-height: 16px;
            text-align: center;
        }
        .receipt td, .tb05 th{
            border: 1px solid #bab6b6;
            padding: 3px 5px;
        }
        .receipt tbody td{
            font-family: "khmerossiemreap",Siemreap, sans-serif;
        }
        .receipt tbody td.no, .receipt thead td.no{
            width: 20px;
            text-align: center;
        }
        .receipt td:nth-child(3){width: 40px;}
        .receipt td:nth-child(4){width: 70px;}
        .receipt td:nth-child(5){width: 80px;}
        .receipt tbody td:nth-child(3){
            text-align: center;
        }
        .receipt tbody td:nth-child(4),
        .receipt tbody td:nth-child(5){
            text-align: right;
        }
        .receipt tfoot{
            font-family: "khmerossiemreap",Siemreap, sans-serif;
        }
        .receipt tfoot tr:first-child td:first-child{
            border: none !important;
            vertical-align: top;
            padding: 0;
        }
        .receipt tfoot .foott{
            border: none !important;
            text-align: right;
        }
        .print.a5 .minifoot{
            padding-bottom: 1cm;
            padding-left: 1cm;
        }
        .p-r{position: relative;}
        .p-a{position: absolute;}
        .t-0{top: 0}.r-0{right: 0}.b-0{bottom: 0}.l-0{left: 0}
        .t_a_c{text-align: center;}
        .t_a_l{text-align: left;}
        .t_a_r{text-align: right;}
        .fs_24{font-size: 24px;}
        .fs_20{font-size: 20px;}
        .fs_18{font-size: 18px;}
        .fs_12{font-size: 12px;}
        .fw_b{font-weight: bold}
        .ds_f{display: flex;display: -moz-flex; display: -webkit-flex; display: -ms-flex;}
        .lh_15{line-height: 15px;}
        .lh_18{line-height: 18px;}
        .lh_20{line-height: 20px;}
        .pl_20{padding-left: 20px;}
        .fm-popp{font-family: "khmerossiemreap",Siemreap, sans-serif}
        .fm-ubt5{font-family: "khmerossiemreap", Siemreap,sans-serif}
        .fm-smreap{font-family: "khmerossiemreap",Siemreap, sans-serif}
        .fm-moul{font-family: "moul","khmerossiemreap", sans-serif}
        .fm-bokor{font-family:"khmerosbokor", Bokor,sans-serif}
        .pt_3{padding-top: 3px;}
        .pt_5{padding-top: 5px;}
        .pt_10{padding-top: 10px;}
        .w_30{width: 30px;}
        .w_40{width: 40px;}
        .w_45{width: 45px;}
        .wp_100{width: 100%}
        .pr_8{padding-right: 8px;}
        .fx_4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}
        .f_row{flex-flow: row wrap}
        .f_col{flex-flow: column}
        .no_bor,.t2{
            border: none;
            border-collapse: collapse;
            font-family: "khmerossiemreap", Siemreap, sans-serif;
        }
        .no_bor td{
            font-family:"khmerosbokor",Bokor, sans-serif;
        }
        .no_bor td,.t2 td.t{font-size: 12px;line-height: 18px;vertical-align: top;color: #3C54A5;border: none;}
        .tc{text-align: center}
        .d1{width: 1.6cm;}
        .d2{width: 0.12cm;}
        .d3{width: 3.18cm;}
        .d4{width: 3cm;color: #3C54A5; line-height: 25px; font-size: 17px;}
        .d5{width: 1.8cm;text-align: right;}
        .d6{width: 0.13cm}
        .d7{width: 2.97cm;text-align: right;}
        .s1{height: 18px;line-height: 18px;font-family: khmerosbokor,sans-serif;color:red;font-size: 18px;}
        .s1 u{display: inline-block;font-size: 16px;font-family: khmerossiemreap,Siemreap,sans-serif}
        .d5,.d6,.d7{vertical-align: bottom !important;}
        .b5{padding-bottom: 5px;}
        .c1{width: 4.9cm;}
        .c2{width: 3cm;}
        .c3{width: 1.3cm}
        .c4{width: 0.6cm;}
        .c5{font-size: 20px; color: red;font-weight: bold;width: 2.7cm;text-align: right;font-family: sans-serif}
    </style>
</head>
<body id="capture" style="background-color: gainsboro">
<div class="print a5">
    <div class="margin p-r">
        <table>
            <tbody>
            <tr>
                <td class="c1"></td>
                <td class="c2">
                    <div class="fm-moul t_a_c">
                        <div class="fs_24 color pen">លី ថៃ</div>
                    </div>
                </td>
                <td class="c3"></td>
                <td class="c4">
                    <div>
                        <img width="20" src="{{ asset("no.svg") }}" alt="">
                    </div>
                </td>
                <td class="c5">2021-0001</td>
            </tr>
            </tbody>
        </table>
        <div class="color pen main_header p-r b5">
            <table class="no_bor">
                <tbody>
                <tr>
                    <td class="mleft">
                        <div>
                            <div>ផ្ទះលេខ 75-79</div>
                            <div>សង្កាត់ទួលស្វាយព្រៃ២ </div>
                            <div>ខណ្ឌចំការមន ភ្នំពេញ</div>
                        </div>
                    </td>
                    <td class="mmiddle">
                        <div>លក់បោះដុំ ខោទ្រនាប់ អាវទ្រនាប់ ឈុតកីឡា កន្សែង</div>
                        <div>សារុង អាវសិស្សសាលា ស្រោមដៃ ស្រោមជើង</div>
                        <div>និងសម្លៀកបំពាក់ពីទារកដល់មនុស្សចាស់គ្រប់ប្រភេទ</div>
                    </td>
                    <td class="mright1">TEL :</td>
                    <td class="mright2">
                        <div>010 563 093</div>
                        <div>092 235 043</div>
                        <div>096 235 0431</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <table class="t2">
            <tbody>
            <tr>
                <td class="d1 t">
                    <div>អតិថិជន</div>
                    <div>TEL</div>
                    <div>កាលបរិច្ឆេទ</div>
                </td>
                <td class="d2 t">
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>
                </td>
                <td class="d3 t">
                    <div>លី ឯល</div>
                    <div>010 563 093</div>
                    <div>09/18/2021</div>
                </td>
                <td class="tc d4">
                    <div class="fm-moul pt_3">វិក័យប័ត្រ</div>
                    <div class="fm-smreap fw_b">INVOICE</div>
                </td>
                <td class="d5 t">

                </td>
                <td class="d6 t">

                </td>
                <td class="d7 t">

                </td>
            </tr>
            </tbody>
        </table>

        <div class="pt_5">
            <table class="receipt">
                <thead>
                <tr>
                    <td class="no">
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
                    <td class="no">1</td>
                    <td>អាវកាក់</td>
                    <td>200</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td class="no">1</td>
                    <td>អាវកាក់</td>
                    <td>3</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td class="no">1</td>
                    <td>អាវកាក់</td>
                    <td>5</td>
                    <td>$50,000.00</td>
                    <td>$20,000,00.00</td>
                </tr>
                <tr>
                    <td class="no">1</td>
                    <td>អាវកាក់</td>
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
                        <img class="wp_100" src="https://bkworld.asia/public/pos/public/aba_icon.png" alt="">
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
</body>
</html>
