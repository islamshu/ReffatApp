<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <title>Invoice</title>
    <style>
               body {font-family: "Almarai", sans-serif;color: #354058;}

        .container {
            width: 100%;
            max-width: 1000px;
            /* مناسب لـ A3 بعرض portrait */
            margin: 20px auto;
            padding: 20px;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 14px;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 6px;
            text-align: right;
        }

        .total-row td {
            font-weight: bold;
            border-bottom: 0;
        }

        table div {
            font-weight: 400;
            color: #8898b3;
            display: flex;
            gap: 1rem;
        }

        h1,
        h3,
        span {
            margin: 0;
            padding: 0;
        }

        footer {
            text-align: center;
            color: #8898b3;
            font-family: monospace;
            font-size: 14px;
            margin-top: 20px;
            position: relative;
        }

        footer h4 {
            color: black;
            position: absolute;
            top: -22px;
            left: 70%;
        }

        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <button onclick="pafD()"
        style="width: 100px; height: 40px; background-color: #00a8ff; border: 1px solid; color: #ffffff; font-size: 15px;">تحميل</button>

    <div id="main" class="container">
        <div>
            <h1 style="color: #354058; font-weight: 700; margin-bottom: 0;">فاتورة</h1>
            <h1 style="color: #8898b3; font-weight: 500; margin-top: 0;">Invoice</h1>
        </div>
        <div style="display: flex;gap: 10rem; justify-content: space-between;">
            <div style="flex-shrink: 0; margin-bottom: 1rem; font-size: 18px;">
                <span style="display: block; font-weight: 700; margin-bottom: 3px;">العميل</span>
                <span style="display: block; color: #8898b3; margin-bottom: 3px;">Bill to</span>
                <span style="display: block; font-weight: 500;">{{ $payment->name }}</span>

            </div>
            <div style="flex-shrink: 0;">
                <div style="margin-bottom: 1rem; font-size: 18px;">
                    <span style="display: block; font-weight: 700; margin-bottom: 3px;">رقم الفاتورة</span>
                    <span style="display: block; color: #8898b3; margin-bottom: 3px;">Invoice number</span>
                    <span style="display: block; font-weight: 500;"> {{ $payment->uuid }}</span>
                </div>
                <div style="margin-bottom: 1rem; font-size: 18px;">
                    <span style="display: block; font-weight: 700; margin-bottom: 3px;">التاريخ</span>
                    <span style="display: block; color: #8898b3; margin-bottom: 3px;">Date</span>
                    <span style="display: block; font-weight: 500;"> {{ $payment->created_at->format('Y-m-d') }}</span>
                </div>
                <div style="margin-bottom: 1rem; font-size: 18px;">
                    <span style="display: block; font-weight: 700; margin-bottom: 3px;">تاريخ الإستحقاق</span>
                    <span style="display: block; color: #8898b3; margin-bottom: 3px;">Due date</span>
                    <span style="display: block; font-weight: 500;"> {{ $payment->created_at->format('Y-m-d') }}</span>
                </div>
            </div>
            <div style="text-align: left; flex-grow: 1;margin-top: -100px;">
                <img src="{{ asset('asset/img/logo.png') }}" width="280" height="280" alt="بنك التنمية العماني">
                <h3 style="margin-bottom: 0;">بنك التنمية العماني</h3>
                <span style="font-size: 18px;font-weight: 500;">ُعمان</span>
            </div>
        </div>

        <div style="text-align: left; margin: 3rem 0;">
            <span style="display: block; font-weight: 700; font-size: 18px;">الرصيد المستحق</span>
            <span style="display: block; font-weight: 600; color: #8898b3; font-size: 17px;">Total due</span>
            <h1 style="margin: 0;"> {{ $payment->initial_payment }}<sub
                    style="font-weight: 600;">{{ $payment->currancy }}</sub></h1>
        </div>



        <table>
            <thead>
                <tr>
                    <th>المنتج / الوصف<div><span>Description</span><span>Item</span></div>
                    </th>
                    <th>الكمية<div><span>Quantity</span></div>
                    </th>
                    <th>السعر<div><span>Price</span></div>
                    </th>
                    <th>المجموع<div><span>Amount</span></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $payment->name }} تم قبول التمويل بنجاح. مبلغ التمويل
                        {{ number_format($payment->total_funding, 0) }} {{ $payment->currancy }} القسط الشهري
                        {{ number_format($payment->monthly_installment, 0) }} {{ $payment->currancy }} العميل :
                        {{ $payment->name }} يجب سداد رسوم اعتماد الطلب يتم سداد الرسوم عن طريق الموظف المراد سدادها
                        {{ number_format($payment->initial_payment, 0) }} {{ $payment->currancy }} يجب سدادها ليتم نقل
                        الملف الى قسم الايداع نشكر لكم ثقتكم الملاحظة: مستردة مع الابداع</td>
                    <td>1</td>
                    <td>{{ number_format($payment->initial_payment, 2) }} {{ $payment->currancy }}</td>
                    <td>{{ number_format($payment->initial_payment, 2) }} {{ $payment->currancy }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="2" style="text-align: left; padding-left: 35px;">الإجمالي<br><span
                            style="font-weight: 400;color: #8898b3;">Total</span></td>
                    <td style="font-weight: 500;">{{ $payment->currancy }}</td>
                    <td style="font-weight: 500;">{{ number_format($payment->initial_payment, 2) }}</td>
                </tr>
            </tbody>
        </table>



        <div style="margin: 3rem 0; display: flex; justify-content: space-between;">
            <div style="margin-bottom: 1rem; font-size: 18px;">
                <span style="display: block; font-weight: 700; margin-bottom: 3px;">ملاحظات</span>
                <span style="display: block; color: #8898b3; margin-bottom: 3px;">Notes</span>
                <span style="display: block; font-weight: 500;">مستردة مع الإيداع</span>
            </div>
            <img src="{{ asset('asset/img/stamp.png') }}" width="250" alt="stamp">
        </div>
    </div>
    <footer
        style="text-align: center; color: #8898b3;font-family: monospace;font-size: 17px; margin-bottom: 2rem; position: relative;">
        بنك التنمية العماني

        <h4 style="color:black; position: absolute;top: -22px; left: 70%;">Page 1 of 1 -
            {{ $payment->created_at->format('YmdHis') }}</h4>
    </footer>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function pafD() {
        let filePDF = document.getElementById('main');

        let opt = {
            margin: 0,
            filename: 'invoice.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'mm',
                format: 'a3',
                orientation: 'portrait'
            }

        };

        html2pdf().set(opt).from(filePDF).save();

       
    }
</script>

</html>
