<?php
function get_name($why){
    if($why == 'ترتيب الدفعات شهرية أو حفظ معلومات دفع'){
        return ('ترتيبات الدفعات الشهرية');
    }else{
        return $why;
    }
}
function buttun_name($why){
    if($why == 'ترتيب الدفعات شهرية أو حفظ معلومات دفع'){
        return ('حفظ الان');
    }elseif($why == 'إستكمال طلب'){
        return 'إستكمل الطلب الان';
    }elseif($why == 'سداد دفعة'){
        return 'دفع الان';
    }elseif($why == 'إسترداد الأموال'){
        return 'إسترداد الان';
    }elseif($why == 'دفع رسوم طلب توصيل'){
        return 'دفع الان';
    }elseif($why == 'رسوم إشتراك'){
        return 'إشتراك الان';
    }
    
}