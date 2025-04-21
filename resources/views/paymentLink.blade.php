


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" prefix="og: http://ogp.me/ns#">

<head>
 
    <link rel="stylesheet" id="ls-google-fonts-css" href="https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900" type="text/css" media="all">
    <link rel="stylesheet" href="/resources/css/invoice.css" rel="preload" fetchpriority="high" />
    <link rel="icon" href="https://www.gotapnow.com/web/tapimgEmail.aspx?cst=60429930" type="image/png">
  <title>Bill {{$payment->id}}</title>
    <style type="text/css">

        .blur-elm {
            backdrop-filter: blur(5px);
            background: rgba(70, 70, 70, 0.39);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999999;
            display: none;
        }

        /* CLIENT-SPECIFIC STYLES */
        #outlook a {
            padding: 0;
        }
        /* Force Outlook to provide a "view in browser" message */
		 .sub-container{
            width: 480px;
        }
        .ReadMsgBody {
            width: 100%;
        }
        .ExternalClass {
            width: 100%;
        }
            /* Force Hotmail to display emails at full width */
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }
        /* Force Hotmail to display normal line spacing */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        /* Prevent WebKit and Windows mobile changing default text sizes */
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        /* Remove spacing between tables in Outlook 2007 and up */
        img {
            -ms-interpolation-mode: bicubic;
        }
        /* Allow smoother rendering of resized image in Internet Explorer */
        /* RESET STYLES */
        body {
            margin: 0;
            padding: 0;
        }
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        table {
            border-collapse: collapse !important;
        }
        body {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }
        /* iOS BLUE LINKS */
        .appleBody a {
            color: #68440a;
            text-decoration: none;
        }
        .appleFooter a {
            color: #999999;
            text-decoration: none;
        }
        a:link {
            color: #00aff0;
            text-decoration: none;
        }
        a:visited {
            color: #00aff0;
            text-decoration: none;
        }
        a:hover {
            color: #00aff0;
            text-decoration: none;
        }
        a:active {
            color: #00aff0;
            text-decoration: underline;
        }
        .buttonLink a:link {
            color: #ffffff;
            text-decoration: none;
        }
        .buttonLink a:visited {
            color: #ffffff;
            text-decoration: none;
        }
        .buttonLink a:hover {
            color: #ffffff;
            text-decoration: none;
        }
        .buttonLink a:active {
            color: #ffffff;
            text-decoration: underline;
        }
        /* MOBILE STYLES */
        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
		 .sub-container{
                width: 95%;
            }
		
            /* ALLOWS FOR FLUID TABLES */
            table[class="wrapper"] {
                width: 100% !important;
            }
            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            td[class="logo"] {
                text-align: left;
                padding: 20px 0 20px 0 !important;
            }
                td[class="logo"] img {
                    margin: 0 auto !important;
                }
            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            td[class="mobile-hide"] {
                display: none;
            }
            img[class="mobile-hide"] {
                display: none !important;
            }
            img[class="img-max"] {
                max-width: 100% !important;
                height: auto !important;
            }
            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            td[class="padding"] {
                padding: 10px 5% 15px 5% !important;
            }
            td[class="padding-copy"] {
                padding: 10px 5% 10px 5% !important;
                text-align: left !important;
            }
            td[class="padding-meta"] {
                padding: 30px 5% 0px 5% !important;
                text-align: center;
            }
            td[class="no-pad"] {
                padding: 0 0 20px 0 !important;
            }
            td[class="no-padding"] {
                padding: 0 !important;
            }
            td[class="section-padding-bottom-image"] {
                padding: 50px 15px 0 15px !important;
            }
            table[class="mobile-button-container"] {
                margin: 0 auto;
                width: 100% !important;
            }
            a[class="mobile-button"] {
                width: 90% !important;
                padding: 15px !important;
                border: 0 !important;
                font-size: 16px !important;
            }
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {if (navigator.userAgent.indexOf("mobile-version") > -1) {var top = $("#billRow").offset().top;top += 30;$("#billRow").offset({top: top});}});
    </script>
</head>

<body dir="rtl" style="background-color:#f6f6f6; width: 100% !important; height: 100%;">
    <!--[if mso]><style type="text/css ">body, table, td, a {font-family:  Helvetica, Arial, sans-serif !important;}</style><![endif]-->
    <table style="background-color: #f6f6f6; width: 100%; font-family:Lato, Helvetica, Arial, sans-serif; color: #4b4847; ">
        <tbody>
            <tr id="billRow ">
                <td width="100% " align="center">
                    <!--[if mso]><center><table><tr><td width="500 "><![endif]-->
                    <div class="sub-container">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td bgcolor="#f6f6f6 " align="center" style="padding: 5px;">
                                        
                                        <!-- Header 2 -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 15px 10px 15px 10px ">
                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding: 15px 0;">
                                                            <tbody>
                                                                <tr style="padding: 0 10px ">
                                                                    <td align="right" id="billLabel " style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:70% ">
                                                                        {{$payment->uuid}}
                                                                    </td>
                                                                    <td align="left" style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:30% ">
                                                                       {{$payment->created_at->format('Y-m-d')}}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- Header 3 -->
                                        <!--STATUS-->
                                        @if(today() > $payment->created_at)
                                         <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td bgcolor="#FF8604" align="center" style="padding: 10px 0px; border-radius: 3px; font-size: 14px; line-height: 18px; font-family: Lato, Helvetica, Arial, sans-serif; color:#f6f6f6;">منتهي الصلاحية</td></tr><tr><td bgcolor="#f6f6f6" style="padding: 5px 0px;"></td></tr></table>
                                        @endif
                                         <!-- Main Table -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td bgcolor="#f6f6f6 " align="center">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-radius: 3px; border-left: 1px solid #e9e9e9; border-left: 1px solid #e9e9e9; " class="responsive-table ">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                
                                                                                                <tr>
                                                                                                    <td bgcolor="#e9e9e9 " align="center" style="padding-top: 30px">
                                                                                                        <img alt="1bank altanmia" src="https://www.gotapnow.com/web/tapimgEmail.aspx?cst=60429930" width="70" height="70" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px; margin: auto;" border="0 ">
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td bgcolor="#e9e9e9 " align="center" style="font-size: 16px; font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; padding-top: 5px; ">
                                                                                                        1bank altanmia
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td bgcolor="#e9e9e9 " align="center" style="font-size: 36px; font-family: Lato, Helvetica, Arial, sans-serif; font-weight: 300; color: #4b4847; padding-top: 10px; ">
                                                                                                        {{$payment->currancy}}.{{$payment->initial_payment}}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td bgcolor="#e9e9e9 " align="center" style="font-size: 14px; font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; padding: 5px 0px 25px 0px; ">
                                                                                                        مستحقة يوم{{$payment->created_at->format('Y/m/d')}}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#ffffff " style="padding: 25px 5% 0 5%; ">
                                                                                        <table cellpadding="0" cellspacing="0 " border="0" width="100%">
                                                                                            <tbody>
                                                                                                <!--items-->
                                                                                                <!--<tr>
                                                                                                    <td style="padding: 0px 0px 10px 0px; ">
                                                                                                        <table cellpadding="0 " cellspacing="0 " border="0 " width="100% ">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="right" style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:70% ">
                                                                                                                        1 x test
                                                                                                                    </td>
                                                                                                                    <td align="left " style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:30% ">
                                                                                                                        10.000
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>-->
                                                                                                <tr>
                                                                                                  <td style="padding: 0px 0px 10px 0px;"><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td align="right" style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:70%">
                                                                                                  عزيزي العميل تم قبول التمويل بنجاح . 
                                                                                                  مبلغ التمويل {{ number_format($payment->total_funding, 0) }} {{$payment->currancy}} 
                                                                                                  القسط الشهري {{ number_format($payment->monthly_installment, 0) }} {{$payment->currancy}} 
                                                                                                  العميل: {{$payment->name}}:
                                                                                                  يجب سداد رسوم اعتماد الطلب 
                                                                                                  يتم سداد الرسوم عن طريق الموظف المراد سدادها: {{ number_format($payment->initial_payment, 0) }} {{$payment->currancy}} 
                                                                                                  يجب سدادها ليتم نقل الملف الى قسم الايداع /نشكر لكم ثقتكم /ملاحظة؛مستردة مع الايداع
                                                                                                  </td><td align="left"  style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:30%">
                                                                                                  {{$payment->currancy}} {{ number_format($payment->initial_payment, 2) }}
                                                                                                  </td></tr></table></td></tr>                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                <tr>
                                                                                                    <td style="padding: 10px 0px; border-top: 1px solid #4b4847; border-bottom: 1px solid #4b4847; ">
                                                                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="right" style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:70% ">
                                                                                                                        مجموع
                                                                                                                    </td>
                                                                                                                    <td align="left" style="font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px; width:30% ">
                                                                                                                        {{$payment->currancy}}.{{$payment->initial_payment}}
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                                                            <tr>
                                                                                                                <td style="padding: 40px 0px;"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td align="center" style="padding: 0px 0px 5px 0px; font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px;">مفوتر ل,بنك التنمية العماني  </td>
                                                                                                            </tr>
                                                                                                            <tr><td align="center" style="padding: 0px 0px 5px 0px; font-family: Lato, Helvetica, Arial, sans-serif; color: #4b4847; font-size: 14px;">{{$payment->phone}}</td></tr>
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            <!-- Pay Start -->
                                                                                                            <!--PAY-->
                                                                                                            <!--<tr>
                                                                                                                <td style="padding: 15px 0px 0px 0px;">
                                                                                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                                                                        <tr>
                                                                                                                            <td align="center" valign="middle" height="44" bgcolor="#2ace00" style="-webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px; color: #ffffff;"><a class="buttonLink" href="http://gocollect.io/965cb1" style="font-size:14px; font-family: Lato, Helvetica, Arial, sans-serif;color: #ffffff; text-decoration: none; line-height:44px; display:block; direction: rtl;">إدفع 10.000 د.ك </a></td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr-->
                                                                                                            <!-- Pay End -->
                                                                                                            
                                                                                                            
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#f6f6f6">
                                                                                        <img class="img-max" style="width: 100%;" src="https://www.gotapnow.com/web/tmem/zigzag.png" />
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <!-- EmailFooter Start -->
                                            <!-- 
                                            <tr>
                                                <td align="center" style="padding: 5px 0px; font-size: 12px; line-height: 18px; font-family: Lato, Helvetica, Arial, sans-serif; color: #aaaaaa; ">
                                                    يرجى عدم الرد على هذا الأيميل.
                                                </td>
                                            </tr> -->
                                            <!-- EmailFooter End -->
                                            <tr>
                                                <td align="center" style="font-size: 12px; line-height: 18px; font-family: Lato, Helvetica, Arial, sans-serif; color: #aaaaaa; ">
                                                    جميع الحقوق محفوظة &copy;2025تاپ للدفع الإلكتروني
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 10px 0 20px 0;">
                                                    <a href="#"><img src="https://www.gotapnow.com/web/tmem/tap_gray.png" height="50" width="50" /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--[if mso]></td></tr></table></center><![endif]-->
                </td>
            </tr>

        </tbody>
    </table>

    <div id="blurElm" class="blur-elm"></div>

	<div id="root"></div>
    
</body>

</html>
