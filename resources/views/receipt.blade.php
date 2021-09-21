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
        .print.a5 .mmiddle{width: 5.8cm;text-align: center;}
        .print.a5 .mleft {width: 3.5cm;}
        .mright1{width: 1.3cm;text-align: right;}
        .mright2{width: 2.2cm}
        .print.a5 .sec2:nth-child(2){
            width: 3cm;
        }
        .print.a5 .sec2:first-child,
        .print.a5 .sec2:last-child{
            width: 4.9cm;
        }
        .rc{border-collapse: collapse;width: 100%;font-size: 12px;}
        .rc thead td{
            font-family: "khmerossiemreap",Siemreap, sans-serif;
            line-height: 16px;
            text-align: center;
        }
        .rc td, .tb05 th{
            border: 1px solid #bab6b6;
            padding: 3px 5px;
        }
        .rc tbody td{
            font-family: "khmerossiemreap",Siemreap, sans-serif;
        }
        .rc td.no{width: 30px !important;text-align: center;}
        .rc td.q{width: 60px;}
        .rc td.p{width: 80px;}
        .rc tbody td.p{text-align: right}
        .rc td.a{width: 90px;}
        .rc tbody td.a{text-align: right}
        .rc tfoot{font-family: "khmerossiemreap",Siemreap, sans-serif;}
        .rc tfoot .foott{border: none !important;text-align: right;}
        .p-r{position: relative;}
        .fs_24{font-size: 24px;}
        .fw_b{font-weight: bold}
        .fm-popp{font-family: "khmerossiemreap",Siemreap, sans-serif}
        .fm-ubt5{font-family: "khmerossiemreap", Siemreap,sans-serif}
        .fm-smreap{font-family: "khmerossiemreap",Siemreap, sans-serif}
        .fm-moul{font-family: "moul","khmerossiemreap", sans-serif}
        .fm-bokor{font-family:"khmerosbokor", Bokor,sans-serif}
        .pt_3{padding-top: 3px;}
        .pt_5{padding-top: 5px;}
        .no_bor,.t2{
            border: none;
            border-collapse: collapse;
            font-family: "khmerossiemreap", Siemreap, sans-serif;
        }
        .t3{border: none;border-collapse: collapse;}
        .t3 td{border: none;padding: 0;}
        .no_bor td{
            font-family:"khmerosbokor",Bokor, sans-serif;
        }
        .no_bor td,.t2 td.t{font-size: 12px;line-height: 18px;vertical-align: top;color: #3C54A5;border: none;}
        .tc{text-align: center}
        .d1{width: 1.6cm;}
        .d2{width: 0.12cm;}
        .d3{width: 3.18cm;}
        .d4{width: 3cm;color: #3C54A5; line-height: 25px; font-size: 17px;vertical-align: top}
        .d5{width: 0.6cm;}
        .d6{width: 1cm;padding-top: 4px;}
        .d7{width: 3.3cm;text-align: left;}
        .s1{height: 18px;line-height: 18px;font-family: khmerosbokor,sans-serif;color:red;font-size: 18px;}
        .s1 u{display: inline-block;font-size: 16px;font-family: khmerossiemreap,Siemreap,sans-serif}
        .d5,.d6,.d7{vertical-align: top !important;}
        .b5{padding-bottom: 5px;}
        .c1{width: 4.9cm;}
        .c2{width: 3cm;vertical-align: middle;text-align: center !important;}
        .c3{width: 1.6cm}
        .c4{width: 0.6cm;vertical-align: middle;padding-top: 1px;}
        .c5{font-size: 18px; color: red;font-weight: bold;width: 2.7cm;text-align: right;font-family: khmerossiemreap, sans-serif;vertical-align: middle}
        .rc .nb{border: none;padding: 0;vertical-align: top;padding-top: 5px;}
    </style>
</head>
<body id="capture" style="background-color: gainsboro">
<div class="print a5">
    <div class="margin p-r">
        <table class="t3">
            <tbody>
            <tr>
                <td class="c1"></td>
                <td class="c2">
                    <div class="fm-moul tc">
                        <div class="fs_24 color pen">លី ថៃ</div>
                    </div>
                </td>
                <td class="c3"></td>
                <td class="c4">
                    <div>
                        <img width="20" src="https://bkworld.asia/public/pos/public/no.svg" alt="">
                    </div>
                </td>
                <td class="c5">{{ $receipt["no"] }}</td>
            </tr>
            </tbody>
        </table>
        <div class="color pen main_header p-r b5">
            <table class="no_bor">
                <tbody>
                <tr>
                    <td class="mleft">
                        <div>
                            @for($ind = 0; $ind < count($add = explode(",",config("pos.address"))); $ind++)
                                <div>{{$add[$ind]}}</div>
                            @endfor
                        </div>
                    </td>
                    <td class="mmiddle">
                        <div>លក់បោះដុំ ខោទ្រនាប់ អាវទ្រនាប់ ឈុតកីឡា កន្សែង</div>
                        <div>សារុង អាវសិស្សសាលា ស្រោមដៃ ស្រោមជើង</div>
                        <div>និងសម្លៀកបំពាក់ពីទារកដល់មនុស្សចាស់គ្រប់ប្រភេទ</div>
                    </td>
                    <td class="mright1">TEL :</td>
                    <td class="mright2">
                        @for($ind = 0; $ind < count($tel = explode("/",config("pos.tel"))); $ind++)
                            <div>{{$tel[$ind]}}</div>
                        @endfor
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
                    <div>{{ isset($receipt["customer"]["name"]) ? $receipt["customer"]["name"] : "n/a" }}</div>
                    <div>{{ isset($receipt["customer"]["tel"]) ? $receipt["customer"]["tel"] : "n/a" }}</div>
                    <div>{{ date_format(date_create($receipt["date"]), "d/d/Y") }}</div>
                </td>
                <td class="tc d4">
                    <div class="fm-moul pt_3">វិក័យប័ត្រ</div>
                    <div class="fm-smreap fw_b">INVOICE</div>
                </td>
                <td class="d5 t">

                </td>
                <td class="d6 t">
                    <div>
                        <img width="29" src="https://bkworld.asia/public/pos/public/aba_icon.png" alt="">
                    </div>
                </td>
                <td class="d7 t">
                    <div>{{config("pos.aba_usd")}} (ដុល្លា)</div>
                    <div>{{ config("pos.aba_riel") }} (រៀល)</div>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="pt_5">
            <table class="rc">
                <thead>
                <tr>
                    <td class="no">
                        <div>ល.រ</div>
                        <div>N<sup><u>o</u></sup></div>
                    </td>
                    <td class="n">
                        <div>ឈ្មោះទំនិញ</div>
                        <div>Description</div>
                    </td>
                    <td class="q">
                        <div>ចំនួន</div>
                        <div>Quantity</div>
                    </td>
                    <td class="p">
                        <div>តម្លៃរាយ</div>
                        <div>Unit Price</div>
                    </td>
                    <td class="a">
                        <div>តម្លៃសរុប</div>
                        <div>Amount</div>
                    </td>
                </tr>
                </thead>

                <tbody>
                @foreach($receipt["items"] as $key=> $item)
                    <tr>
                        <td class="no">{{$key+1}}</td>
                        <td class="n">{{ $item["stock"]["product"]["name"] }}</td>
                        <td class="q">{{ $item["stock"]["qty"] * -1 }}</td>
                        <td class="p">{{ $money($item["price"], $receipt["currency"]) }}</td>
                        <td class="a">{{ $money($item["price"] * $item["stock"]["qty"] * -1, $receipt["currency"]) }}</td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <td class="nb" colspan="3" rowspan="3">
                        <div>
                            <span>អតិថិជន</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>អ្នគិតលុយ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>អ្នកលក់</span>
                        </div>
                        <div>
                            <span>Customer</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>Cashier</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>Seller</span>
                        </div>
                    </td>
                    <td class="foott">សរុប/Total</td>
                    <td style="text-align: right; font-weight: bold">{{ $money($receipt["total"], $receipt["currency"]) }}</td>
                </tr>
                <tr>
                    <td class="foott">ទូទាត់/Paid</td>
                    <td style="text-align: right">{{ $money($receipt["paid"], $receipt["currency"]) }}</td>
                </tr>
                <tr>
                    <td class="foott">នៅខ្វះ/Due</td>
                    <td style="text-align: right">{{ $money($receipt["due"], $receipt["currency"]) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</body>
</html>
