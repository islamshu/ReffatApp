<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحقق من الفاتورة</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900">
    <style>
        /* Verification Modal Styles */
        body {
            font-family: Lato, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
            direction: rtl;
        }
        
        .verification-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .verification-box {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .verification-title {
            color: #4b4847;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .verification-message {
            color: #4b4847;
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        
        .verification-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e9e9e9;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .verification-button {
            background-color: #2ace00;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 14px;
            cursor: pointer;
            width: 100%;
            font-weight: 700;
            transition: background-color 0.3s;
        }
        
        .verification-button:hover {
            background-color: #1fb300;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 10px;
            display: none;
        }

        .loading-spinner {
            display: none;
            width: 40px;
            height: 40px;
            margin: 0 auto 15px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #2ace00;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Invoice Container */
        .invoice-wrapper {
            display: none;
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <!-- Verification Modal -->
    <div id="verificationModal" class="verification-modal">
        <div class="verification-box">
            <div class="verification-title">تفادياً لعمليات النصب والاحتيال</div>
            <div class="verification-message">الرجاء ادخال الكود المرسل خصيصا لك</div>
            <div id="loadingSpinner" class="loading-spinner"></div>
            <input type="text" id="verificationCode" class="verification-input" placeholder="أدخل الكود هنا">
            <div id="errorMessage" class="error-message">الكود غير صحيح، يرجى المحاولة مرة أخرى</div>
            <button id="verifyButton" class="verification-button">تحقق</button>
        </div>
    </div>

    <!-- Invoice Container (will be populated via AJAX) -->
    <div id="invoiceWrapper" class="invoice-wrapper"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle verification form submission
            $('#verifyButton').click(function() {
                verifyCode();
            });

            // Also handle Enter key press
            $('#verificationCode').keypress(function(e) {
                if (e.which == 13) {
                    verifyCode();
                    return false;
                }
            });

            function verifyCode() {
                const code = $('#verificationCode').val().trim();
                const invoiceCode = '{{ request()->code }}'; // Get from URL parameter
                
                if (!code) {
                    showError('الرجاء إدخال الكود');
                    return;
                }

                // Show loading spinner
                $('#loadingSpinner').show();
                $('#verifyButton').prop('disabled', true);
                $('#errorMessage').hide();

                // Send AJAX request to verify code
                $.ajax({
                    url: '{{ route("check.verification.code") }}',
                    method: 'POST',
                    data: {
                        invoice_code: invoiceCode,
                        verification_code: code,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Hide verification modal
                            $('#verificationModal').fadeOut();
                            // Show invoice
                            $('#invoiceWrapper').html(response.html).fadeIn();
                        } else {
                            showError(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showError('حدث خطأ أثناء التحقق، يرجى المحاولة لاحقًا');
                        console.error('AJAX Error:', error);
                    },
                    complete: function() {
                        $('#loadingSpinner').hide();
                        $('#verifyButton').prop('disabled', false);
                    }
                });
            }

            function showError(message) {
                $('#errorMessage').text(message).show();
                $('#verificationCode').focus();
            }
        });
    </script>
</body>
</html>