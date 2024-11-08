<?php
namespace App\Libraries;
use CodeIgniter\HTTP\CURLRequest;


// class SemaphoreService
// {
//     private $semaphoreApiKey;
//     private $semaphoreSenderName;

    // public function __construct()
    // {
    //     $this->semaphoreApiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb';
    //     // Optional: Set your Semaphore sender name here if it's approved and required.
    //     $this->semaphoreSenderName = 'Semaphore';
    // }

    // public function sendSMS($to, $message)
    // {
    //     $formattedPhoneNumber = $this->formatPhoneNumber($to);
    //     $fullMessage = "ALLIANZ PNP MIMAROPA- " . $message;
    //     return $this->sendSMSNotification($formattedPhoneNumber, $fullMessage);
    // }

    // private function sendSMSNotification($number, $message)
    // {
    //     $ch = curl_init();

    //     // Prepare parameters, including sender name if available.
    //     $parameters = array(
    //         'apikey' => $this->semaphoreApiKey,
    //         'number' => $number,
    //         'message' => $message,
    //         // Uncomment this if sender name is required and approved by Semaphore.
    //         'sendername' => $this->semaphoreSenderName
    //     );

    //     curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     // Execute the request and capture the response.
    //     $response = curl_exec($ch);

    //     // Check for any cURL errors.
    //     if (curl_errno($ch)) {
    //         $error_msg = curl_error($ch);
    //         log_message('error', 'CURL error: ' . $error_msg);
    //         curl_close($ch);
    //         return json_encode([
    //             'status' => 'error',
    //             'message' => 'CURL error',
    //             'details' => $error_msg
    //         ]);
    //     }

    //     curl_close($ch);

    //     // Log the raw response for debugging.
    //     log_message('info', 'Semaphore API response: ' . $response);

    //     return $response;
    // }

    // protected function formatPhoneNumber($phoneNumber)
    // {
    //     // Strip any non-numeric characters.
    //     $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

    //     // Ensure the number has the correct format with +63.
    //     if (substr($phoneNumber, 0, 2) !== '63') {
    //         $phoneNumber = '63' . ltrim($phoneNumber, '0');
    //     }

    //     return '+' . $phoneNumber;
    // }


// }

class Semaphore
{
    protected $apiKey;
    protected $apiUrl = 'https://api.semaphore.co/api/v4/messages';

    public function __construct()
    {
        $this->apiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb'; // Replace with your Semaphore API key
    }

    /**
     * Send an SMS message via Semaphore
     * @param string $number Recipient's phone number
     * @param string $message Message content
     * @return bool|string
     */
    public function sendSMS($number, $message)
    {
        $client = \Config\Services::curlrequest();
        
        $response = $client->post($this->apiUrl, [
            'form_params' => [
                'apikey' => $this->apiKey,
                'number' => $number,
                'message' => $message
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()); // returns response as object
        } else {
            return false; // failed to send
        }
    }
}
