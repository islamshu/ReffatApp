<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment Link</title>
    <style>
        input {
            width: 90%;
            text-align: center;
            font-size: xx-large;
            font-weight: bold;
            color: blue;
        }
        select {
            width: 90%;
            text-align: center;
            font-size: large;
            font-weight: bold;
            color: blue;
        }
        textarea {
            width: 90%;
            padding: 5px;
            text-align: right;
            font-size: large;
            font-weight: bold;
            color: blue;
        }
        button {
            width: 93%;
            text-align: center;
            font-size: x-large;
            font-weight: bold;
            color: crimson;
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            margin-top: 40px;
        }
        #invoiceLinkContainer {
            margin-top: 20px;
            text-align: center;
        }
        #invoiceLink {
            color: blue;
            font-size: 40px;
        }
        #invoiceLink:hover {
            text-decoration: underline;
        }
    </style>
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body dir="rtl">
    <form id="paymentForm" method="GET">
        <h2>المبلغ : </h2>
        <input type="text" value="1" name="amount" id="amount" required>

        <h2>العملة : </h2>
        <input type="text" name="currency" id="currency" value="ر.س" required>

        <h2>الغرض من الدفعة : </h2>
        <select name="why" id="why" required>
            <option value="refund">إسترداد الأموال</option>
            <option value="pay">سداد دفعة</option>
            <option value="complete">إستكمال طلب</option>
            <option value="save">ترتيب الدفعات شهرية أو حفظ معلومات دفع</option>
            <option value="supscripe">رسوم إشتراك</option>
            <option value="shipping">دفع رسوم توصيل طلبية</option>
        </select>

        <h2>تفاصيل العملية</h2>
        <textarea placeholder="مثال / طلب إسترداد الأموال الخاص بالطلبية رقم 54182 المسجلة بإسم عبد الله الهاشمي ، رقم جوال 0524188521" name="discription" id="discription" cols="15" rows="5" ></textarea>

        <button type="submit" value="submit">إنشاء الرابط</button>

        <!-- Container to display the invoice link -->
        <div id="invoiceLinkContainer" style="display: none;">
            <p>رابط الدفع:</p>
            <a id="invoiceLink" href="#" target="_blank">فتح الرابط</a>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            // Prevent default form submission
            $('#paymentForm').on('submit', function (e) {
                e.preventDefault();

                // Get form data
                var formData = {
                    amount: $('#amount').val(),
                    currency: $('#currency').val(),
                    why: $('#why').val(),
                    discription: $('#discription').val()
                };

                // Send AJAX request
                $.ajax({
                    url: "{{ route('create_link') }}", // Use Laravel route helper
                    type: "GET",
                    data: formData,
                    success: function (response) {
                        // Handle success response
                        console.log(response);

                        // Show the invoice link container
                        $('#invoiceLinkContainer').show();

                        // Update the invoice link
                        $('#invoiceLink').attr('href', response.data.invoice_link)
                                        .text('انقر لفتح الرابط');

                        // Show success message using SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'تم بنجاح',
                            text: 'تم إنشاء الرابط بنجاح!',
                            confirmButtonText: 'موافق'
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);

                        // Show error message using SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'خطأ',
                            text: 'حدث خطأ أثناء إنشاء الرابط.',
                            confirmButtonText: 'موافق'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>