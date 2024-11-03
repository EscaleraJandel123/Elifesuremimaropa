<?php
namespace App\Libraries;

class SemaphoreService
{
    protected $semaphoreApiKey;
    protected $semaphoreSenderName;

    public function __construct()
    {
        $this->semaphoreApiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb';
        $this->semaphoreSenderName = 'PNB'; // Set your desired sender name here
    }

    public function sendSMS($to, $message)
    {
        $formattedPhoneNumber = $this->formatPhoneNumber($to);
        $fullMessage = "ALLIANZ PNP MIMAROPA- " . $message;
        return $this->sendSMSNotification($to, $fullMessage);
    }

    private function sendSMSNotification($number, $message)
    {
        $ch = curl_init();

        $parameters = [
            'apikey' => $this->semaphoreApiKey,
            'number' => $number,
            'message' => $message,
            'sendername' => $this->semaphoreSenderName
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    protected function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        if (!preg_match('/^\+/', $phoneNumber)) {
            $phoneNumber = '+63' . $phoneNumber;
        }
        return $phoneNumber;
    }
}
