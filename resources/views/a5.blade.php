<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config("app.name") }}</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/print.css") }}">
</head>
<body style="background-color: gainsboro">
<div class="print a5">
    <div class="margin p-r">
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
            <table class="receipt">
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
</body>
</html>
