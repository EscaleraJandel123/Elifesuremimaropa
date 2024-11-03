<?php
namespace App\Libraries;

class SemaphoreService
{
    protected $semaphoreApiKey;

    public function __construct()
    {
        $this->semaphoreApiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb';
    }

    public function sendSMS($to, $msg)
    {
        $fullMsg = "TDGMM- " . $msg;
        return $this->sendsmsNotify($to, $fullMsg);
    }

    private function sendsmsNotify($number, $msgContent)
    {
        $ch = curl_init();

        $paramList = [
            'apikey' => $this->semaphoreApiKey,
            'number' => $number,
            'message' => $msgContent
        ];

        // Set the CURL options
        curl_setopt($ch, CURLOPT_URL, "https://api.semaphore.co/api/v4/messages/send");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paramList);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true); // Decode the JSON response to an array
    }

    protected function formatPhoneNum($phoneNumber)
    {
        return preg_replace('/[^0-9]/', '', $phoneNumber);
    }
}
