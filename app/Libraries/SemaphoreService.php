<?php
namespace App\Libraries;

class SemaphoreService
{
    protected $semaphoreApiKey;
    protected $semaphoreSenderName;

    public function __construct()
    {
        $this->semaphoreApiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb';  // Retrieve from .env file
        // $this->semaphoreSenderName = getenv('SEMAPHORE_SENDER_NAME') ?? 'Semaphore';
    }

    public function sendSMS($to, $message)
    {
        $formattedPhoneNumber = $this->formatPhoneNumber($to);
        $fullMessage = "ALLIANZ PNP MIMAROPA - " . $message;

        return $this->sendSMSNotification($formattedPhoneNumber, $fullMessage);
    }

    private function sendSMSNotification($number, $message)
    {
        $ch = curl_init();

        $parameters = [
            'apikey' => $this->semaphoreApiKey,
            'number' => $number,
            'message' => $message,
            // 'sendername' => $this->semaphoreSenderName,
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://api.semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        log_message('info', "Semaphore API HTTP Status: {$httpCode}");
        log_message('info', "Semaphore API Response: {$response}");

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            log_message('error', "CURL error: {$error_msg}");
            curl_close($ch);
            return json_encode([
                'status' => 'error',
                'message' => 'CURL error',
                'details' => $error_msg
            ]);
        }

        curl_close($ch);

        return $response;
    }

    protected function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        if (substr($phoneNumber, 0, 2) !== '63') {
            $phoneNumber = '63' . ltrim($phoneNumber, '0');
        }
        return '+' . $phoneNumber;
    }
}