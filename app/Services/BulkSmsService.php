<?php
// app/Services/BulkSmsService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BulkSmsService
{
    protected $username;
    protected $password;
    protected $from;

    public function __construct()
    {
        $this->username = config('services.bulksms.username');
        $this->password = config('services.bulksms.password');
        $this->from = config('services.bulksms.from');
    }

    public function send(array $recipients, string $message)
    {
        foreach ($recipients as $recipient) {
            $response = Http::withBasicAuth($this->username, $this->password)
                ->post('https://api.bulksms.com/v1/messages', [
                    'to'   => $recipient,
                    'body' => $message,
                    'from' => $this->from,
                    'encoding' => 'UNICODE', // اضف هذا لتحديد صراحةً أن الرسالة Unicode
                ]);

            if (!$response->successful()) {
                // يمكنك تسجيل الخطأ أو التعامل معه كما تريد
                \Log::error("SMS failed to {$recipient}", [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }
        }
    }
}
