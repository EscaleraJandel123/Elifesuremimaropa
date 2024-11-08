<?php

namespace App\Libraries;

use CodeIgniter\Config\Services;

class SmsLibrary
{
    protected $cloudBase;
    protected $token;
    protected $endpoint;
    protected $curl;

    public function __construct()
    {
        // Get the values from the environment file
        $this->cloudBase = 'cIhWGF8SQ2OWbnNCBXel5A:APA91bH05XHFKOEWql7OXmcnnsE2B1uCZreABpisS_20lD8nSyjpRaz1Ac4R9-3USsPCDV5AyCtCZ5v9A-3K5rx1YzwatH2kt0UbyjmWdWJXb0y7W6Bc9_U';
        $this->token = '55e256ce-84f7-4e9f-810f-2f78e5804f5d';
        $this->endpoint = 'http://192.168.101.74:8082';
        $this->curl = Services::curlrequest();  // Load CURL service
    }

    // Function to send a message asynchronously
    public function sendSms($phoneNumber, $message)
    {
        // Validate the input
        if (empty($phoneNumber) || empty($message)) {
            return ['status' => 'error', 'message' => 'Phone number or message is missing'];
        }

        // Prepare the data to send to the API
        $messageData = [
            'to' => $phoneNumber,
            'message' => $message,
            'from' => '+639945428697', // Use your own phone number as the sender
            'token' => $this->token,
            'cloudBase' => $this->cloudBase,
        ];

        // Set up cURL to make an asynchronous request
        $ch = curl_init($this->endpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);  // Timeout is set to 1 second for async

        // Execute the cURL request in the background (asynchronous)
        curl_multi_add_handle($multiCurl = curl_multi_init(), $ch);
        $running = null;
        do {
            curl_multi_exec($multiCurl, $running);
        } while ($running > 0);

        // Close cURL handle and return success (this won't wait for the response)
        curl_multi_remove_handle($multiCurl, $ch);
        curl_multi_close($multiCurl);

        // Return success immediately without waiting for the response
        return ['status' => 'success', 'message' => 'SMS is being sent'];
    }
}
