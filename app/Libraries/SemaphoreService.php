<?php
namespace App\Libraries;

class SemaphoreService
{
    protected $semaphoreApiKey; // Correctly declare the property

    public function __construct() // Correct the constructor name
    {
        $this->semaphoreApiKey = getenv('SEMAPHORE_APIKEY'); // Correct the function name
    }

    public function sendSMS($to, $msg) // Add the $ before the parameters
    {
        $fullMsg = "TDGMM - " . $msg; // Use concatenation operator correctly
        return $this->sendSmsNotify($this->formatPhoneNum($to), $fullMsg); // Correct the function call
    }

    private function sendSmsNotify($numbr, $msgContent) // Add the $ before the parameters
    {
        $chandle = curl_init(); // Correct the function name

        $paramList = [
            'apikey' => $this->semaphoreApiKey, // Use $this to access class properties
            'number' => $numbr, // Correct the parameter name
            'message' => $msgContent // Correct the parameter name
        ];

        curl_setopt($chandle, CURLOPT_URL, 'https://api.semaphore.co/api/v4/sendsms'); // Update with Semaphore API URL
        curl_setopt($chandle, CURLOPT_POST, true);
        curl_setopt($chandle, CURLOPT_POSTFIELDS, http_build_query($paramList));
        curl_setopt($chandle, CURLOPT_RETURNTRANSFER, true); // Ensure we can capture the response

        $response = curl_exec($chandle); // Correct the function name
        curl_close($chandle); // Correct the function name

        return json_decode($response, true); // Decode response to array
    }

    protected function formatPhoneNum($phoneNumbr) // Add the $ before the parameter
    {
        return preg_replace('/[^0-9]/', '', $phoneNumbr); // Use correct function names
    }
}
