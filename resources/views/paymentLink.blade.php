


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

<body className='snippet-body'>

  <div id="mainSite">
  <section class="portfolio section-bg">
  <div class="container" data-aos="fade-up">
   <div class="section-title">
               <h2 style="color:#354A93;">{{get_name($paymentLink->why)}} - الدفعات الإلكترونية</h2>
               </div>
    <form name="makePayment" action="{{route('pay')}}" method="POST" onSubmit="return validate();">
        @csrf
      <div class="container d-flex justify-content-center mt-5 mb-5">
        <input type="hidden" name="code" value="{{$paymentLink->code}}">
      
      


        <div class="row g-3" style="width: 100%;">


          <div class="col-md-6">
          <div class="card">
                      <div class="accordion" id="accordionExample_1">
                         <div class="card">
                            <div class="card-header p-0">
                               <h2 class="mb-0">
                                  <span class="btn btn-light btn-block text-left p-3 rounded-0" style="width: 100%;" data-toggle="collapse" data-target="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                                     <div class="d-flex align-items-center justify-content-between">
                                        <span>تفاصيل المعاملة</span>
                                     </div>
                                  </span>
                               </h2>
                            </div>
                            <div id="collapseOne_1" class="collapse_1 show" aria-labelledby="headingOne_1" data-parent="#accordionExample_1">
                               <div class="card-body payment-card-body">

                                  <span class="font-weight-normal">رقم المعاملة </span>
                                  <div class="input">
                                     <i class=""></i>
                                     <input type="text" name="CusName" style="color:blue;font-size: medium;" class="form-control" value="{{$paymentLink->code}}" readonly>
                                     </div>

                                     <span class="font-weight-normal">وصف </span>
                                  <div class="input">
                                     <i class=""></i>
                                     <textarea class="form-control" style="height: 100px;font-size: medium;" name="discription" id="discription" readonly>{{$paymentLink->discription}}</textarea>
                                     </div>

                                     <span class="font-weight-normal">المبلغ </span>
                                  <div class="input">
                                     <i class=""></i>
                                     <input type="text" name="CusName" style="color: red; font-weight: bold;" class="form-control" value="{{$paymentLink->amount ." ".$paymentLink->currency}}" readonly>
                                     </div>


                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>


          </div>
          <div class="col-md-6">
          <div class="card">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header p-0">
                    <h2 class="mb-0">
                      <span class="btn btn-light btn-block text-left p-3 rounded-0" style="width: 100%;">
                        <div class="d-flex align-items-center justify-content-between">
                          <span>إسترداد بواسطة البطاقة الائتمانية</span>
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
                      
                      <span class="font-weight-normal card-text">الإسم على البطاقة</span>
                      <div class="input">
                        <i class="fa fa-credit-card"></i>
                        <input type="text" name="NameOnCard" class="form-control" placeholder="" required>
                      </div>
                      <span class="font-weight-normal card-text">رقم البطاقة</span>
                      <div class="input">
                        <i class="fa fa-credit-card"></i>
                        <input type="text" name="CardNumber" id="CardNumber" maxlength="16" minlength="15" class="form-control" placeholder="0000 0000 0000 0000" required>
                      </div>
                      <div class="row mt-3 mb-3">




                      <div class="col-md-6">
                                             <span class="font-weight-normal card-text">تاريخ الإنتهاء</span>
                                             <div class="d-flex" style="margin-top: 24px;position: relative;">
                                                <i class="fa fa-calendar" style="position: absolute;top: -20px;"></i>
                                                <select class="form-control" style="margin-left: 5px;" id="ExpireDate" name="ExpireDate">
                                                   <option value="01">01</option>
                                                   <option value="02">02</option>
                                                   <option value="03">03</option>
                                                   <option value="04">04</option>
                                                   <option value="05">05</option>
                                                   <option value="06">06</option>
                                                   <option value="07">07</option>
                                                   <option value="08">08</option>
                                                   <option value="09">09</option>
                                                   <option value="10">10</option>
                                                   <option value="11">11</option>
                                                   <option value="12">12</option>
                                                </select>
                                                <select  class="form-control" id="ExpireYear" name="ExpireYear">
                                                   
                                                   <option value="2024">2024</option>
                                                   <option value="2025">2025</option>
                                                   <option value="2026">2026</option>
                                                   <option value="2027">2027</option>
                                                   <option value="2028">2028</option>
                                                   <option value="2029">2029</option>
                                                   <option value="2030">2030</option>
                                                   <option value="2031">2031</option>
                                                   <option value="2032">2032</option>
                                                   <option value="2033">2033</option>
                                                </select>
                                             </div>
                                          </div>



                        <div class="col-md-6">
                          <span class="font-weight-normal card-text">كلمة السر CVC/CVV</span>
                          <div class="input">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="Cvv" name="Cvv" maxlength="3" minlength="3" class="form-control" placeholder="000" required>
                          </div>
                        </div>
                      </div>
                      <span class="text-muted certificate-text">
                        <i class="fa fa-lock"></i> سوف يتم إنجار معاملتك من خلال الشهادة الآمنة SSL </span>

                        <div class="p-3">
                <button class="btn btn-primary btn-block free-button" style="height: 52px;width: 100%;background-color:#354A93;">{{buttun_name($paymentLink->why)}} ({{$paymentLink->amount ." ".$paymentLink->currency}}) </button>
              </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            
            
            
            



          </div>
        </div>
      </div>
    </form>
  </div>
  </div>
  </section>
</body>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'>
  var myLink = document.querySelector('a[href="#"]');
  myLink.addEventListener('click', function(e) {
    e.preventDefault();
  });
</script>
<script>
   function validate() {
     var valid = true;
     var cardNumber = $("#CardNumber").val();
     var Cvv = $("#Cvv").val();
     if (!$.isNumeric(Cvv)) {
       $("#Cvv").css('background-color', 'cornsilk');
       valid = false;
     } else {
       $("#Cvv").css('background-color', 'initial');
     }
     if (cardNumber != "") {
       $('#CardNumber').validateCreditCard(function(result) {
         if (!(result.valid)) {
           $("#CardNumber").css('background-color', 'cornsilk');
           valid = false;
         } else {
           $("#CardNumber").css('background-color', 'initial');
         }
       });
     }
     return valid;
   }
  $(document).ready(function() {
    var stext = "";
    var newText = "";
    $("#ExpireDate").keypress(function() {
      stext = $(this).val();
      if (stext.length == 2) {
        newText = stext + "/";
        $("#ExpireDate").val(newText);
      }
    });
  });
  var barVal = 12.5;
  var newVal = 0;
  setInterval(function() {
    newVal = newVal + barVal;
    $('#loadingbar').attr('aria-valuenow', newVal);
    $('#loadingbar').css("width", newVal + "%");
    $('#loadingbar').text(newVal + "%");
    if (newVal >= 55) {
      $('#avalab').removeClass('hidden');
      $('#avalab').animate({
        zoom: '102%'
      }, "slow");
      $('#avalab').animate({
        zoom: '100%'
      }, "slow");
    }
  }, 1000);
  setTimeout(function() {
    $('#loading').addClass('hidden');
    $('#mainSite').removeClass('hidden');
  }, 8000);
</script>

<script crossorigin=anonymous data-no-instant=on src=&#x2F;shop&#x2F;js&#x2F;d99437ed257e27a89e8c8b56abf0dbe006cde908.js type=text&#x2F;javascript></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76a84f7ba945cd59","token":"bccdf14e2cd344b7bb45298b8f2301db","version":"2022.11.0","si":100}' crossorigin="anonymous"></script> 

  <!-- ======= Footer ======= -->
  <footer id="footer">
  </footer>
  <!-- End Footer -->
  <!-- Vendor JS Files -->
  <script src="{{asset('asset/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('asset/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('asset/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('asset/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('asset/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('asset/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset('asset/vendor/waypoints/noframework.waypoints.js')}}"></script>

  <script src="https://use.fontawesome.com/1744f3f671.js"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('asset/js/main.js')}}"></script>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  
  <script crossorigin=anonymous data-no-instant=on src=&#x2F;shop&#x2F;js&#x2F;d99437ed257e27a89e8c8b56abf0dbe006cde908.js type=text&#x2F;javascript></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76a84f7ba945cd59","token":"bccdf14e2cd344b7bb45298b8f2301db","version":"2022.11.0","si":100}' crossorigin="anonymous"></script>

</body>
  </html>
