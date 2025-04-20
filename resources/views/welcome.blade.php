<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>إنشاء رابط دفع</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 15px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        #invoiceLinkContainer {
            margin-top: 30px;
            text-align: center;
            display: none;
        }

        .link-box {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        #invoiceLink {
            flex-grow: 1;
            padding: 10px;
            font-size: 16px;
            color: #1a73e8;
            text-decoration: none;
            word-break: break-all;
        }

        #copyLinkBtn {
            width: auto;
            padding: 10px 15px;
            background-color: #1a73e8;
            margin-left: 10px;
        }

        #copyLinkBtn:hover {
            background-color: #0d5bba;
        }

        #customerForm {
            display: none;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        #saveCustomerInfo {
            background-color: #2196F3;
        }

        #saveCustomerInfo:hover {
            background-color: #0b7dda;
        }
    </style>
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="form-container">
        <h1 style="text-align: center; color: #4CAF50;">إنشاء رابط دفع</h1>

        <form id="paymentForm" method="POST">
            @csrf
            <h2>المعلومات الأساسية</h2>

            <div class="form-group">
                <label for="name">اسم العميل:</label>
                <input type="text" id="name" name="name" placeholder="أدخل اسم العميل" required>
            </div>

            <h2>المعلومات المالية</h2>

            <div class="form-group">
                <label for="total_funding">إجمالي التمويل :</label>
                <input type="number" step="0.01" id="total_funding" name="total_funding" placeholder="أدخل المبلغ"
                    required>
            </div>

            <div class="form-group">
                <label for="initial_payment">الدفعة الأولى :</label>
                <input type="number" step="0.01" id="initial_payment" name="initial_payment"
                    placeholder="أدخل المبلغ" required>
            </div>

            <div class="form-group">
                <label for="monthly_installment">القسط الشهري :</label>
                <input type="number" step="0.01" id="monthly_installment" name="monthly_installment"
                    placeholder="أدخل المبلغ" required>
            </div>
            <div class="form-group">
                <label for="monthly_installment">العملة :</label>
                <input type="text" id="currancy" name="currancy" placeholder="أدخل العملة" required>
            </div>
            <div class="form-group">
                <label for="monthly_installment">الهاتف بالفاتورة :</label>
                <input type="text" id="phone" name="phone" placeholder="أدخل الهاتف" required>
            </div>

            <button type="submit" value="submit">إنشاء الرابط</button>
        </form>

        <!-- Container to display the invoice link -->
        <div id="invoiceLinkContainer" style="display: none;">
            <h2>رابط الدفع:</h2>
            <div class="link-box">
                <a id="invoiceLink" href="#" target="_blank"></a>
                <button id="copyLinkBtn">نسخ الرابط</button>
            </div>
        </div>
    </div>

    <!-- Customer Information Form (hidden by default) -->
    <div id="customerForm" class="form-container">
        <h2>معلومات العميل</h2>
        <form action="{{ route('send_message') }}" method="POST" accept-charset="UTF-8">
            @csrf


            <div class="form-group">
                <label for="country_code">رمز الدولة:</label>
                <select id="country_code" name="country_code" required>
                    <option value="968" data-flag="🇴🇲">🇴🇲 سلطنة عمان (+968)</option>
                    <option value="966" data-flag="🇸🇦">🇸🇦 السعودية (+966)</option>
                    <option value="20" data-flag="🇪🇬">🇪🇬 مصر (+20)</option>
                    <option value="970" data-flag="🇵🇸">🇵🇸 فلسطين (+970)</option>
                    <option value="972" data-flag="🇮🇱">🇮🇱 إسرائيل (+972)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="phone">رقم الهاتف:</label>
                <input type="tel" id="phone" name="phone" placeholder="أدخل رقم الهاتف بدون كود الدولة" required>
            </div>
            
            <div class="form-group">
                <label for="additionalNotes">ملاحظات إضافية:</label>
                <textarea id="additionalNotes" name="additionalNotes" rows="3" placeholder="أدخل أي ملاحظات إضافية هنا"></textarea>
            </div>

            <button type="submit">إرسال الرسالة</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            // Prevent default form submission
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#paymentForm').on('submit', function(e) {
                e.preventDefault();

                // Get form data
                var formData = {
                    name: $('#name').val(),
                    total_funding: $('#total_funding').val(),
                    initial_payment: $('#initial_payment').val(),
                    monthly_installment: $('#monthly_installment').val(),
                    currancy: $('#currancy').val(),
                    phone: $('#phone').val()

                };

                // Validate inputs
                if (!formData.name || !formData.total_funding || !formData.initial_payment || !formData
                    .monthly_installment || !formData.currancy) {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: 'الرجاء ملء جميع الحقول المطلوبة',
                        confirmButtonText: 'موافق'
                    });
                    return;
                }

                // Show loading indicator
                Swal.fire({
                    title: 'جاري إنشاء الرابط',
                    html: 'الرجاء الانتظار...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                // Send AJAX request
                $.ajax({
                    url: "{{ route('create_link') }}",
                    type: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.close();
                        
                        // Show the invoice link container
                        $('#invoiceLinkContainer').show();
                        $('#customerForm').show();
                        link_without =  response.data.invoice_link;
                        var cleanedLink = link_without;

                        // Update the invoice link
                        $('#invoiceLink')
                            .attr('href', cleanedLink)
                            .text(cleanedLink);

                        // Scroll to the link
                        $('html, body').animate({
                            scrollTop: $('#invoiceLinkContainer').offset().top
                        }, 500);

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'تم بنجاح',
                            text: 'تم إنشاء الرابط بنجاح!',
                            confirmButtonText: 'موافق'
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.close();

                        // Handle error
                        console.error(xhr.responseText);

                        // Show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'خطأ',
                            text: 'حدث خطأ أثناء إنشاء الرابط: ' + (xhr.responseJSON
                                .message || ''),
                            confirmButtonText: 'موافق'
                        });
                    }
                });
            });

            // Handle copy link button click
            $('#copyLinkBtn').on('click', function() {
                var link = $('#invoiceLink').attr('href');

                // إزالة http:// أو https://
                var cleanedLink = link;

                navigator.clipboard.writeText(cleanedLink).then(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم النسخ',
                        text: 'تم نسخ الرابط إلى الحافظة!',
                        confirmButtonText: 'موافق',
                        timer: 2000
                    });
                }, function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: 'فشل نسخ الرابط، يرجى المحاولة مرة أخرى',
                        confirmButtonText: 'موافق'
                    });
                });
            });


            // Handle save customer info button click
            $('#saveCustomerInfo').on('click', function() {
                var customerName = $('#customerName').val();
                var customerPhone = $('#customerPhone').val();
                var additionalNotes = $('#additionalNotes').val();

                if (customerName && customerPhone) {
                    // Here you can send this data to your server or process it as needed
                    Swal.fire({
                        icon: 'success',
                        title: 'تم الحفظ',
                        text: 'تم حفظ معلومات العميل بنجاح!',
                        confirmButtonText: 'موافق',
                        timer: 2000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: 'الرجاء إدخال اسم العميل ورقم الهاتف',
                        confirmButtonText: 'موافق'
                    });
                }
            });
        });
    </script>
</body>

</html>
