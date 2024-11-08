<?php

namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\Config\Services;

class SmsLibrary
{
    protected $cloudBase;
    protected $token;
    protected $endpoint;
    protected $curl;

    // Constructor to initialize environment variables and CURL request service
    public function __construct()
    {
        // Get the values from the environment file
        $this->cloudBase = 'cIhWGF8SQ2OWbnNCBXel5A:APA91bH05XHFKOEWql7OXmcnnsE2B1uCZreABpisS_20lD8nSyjpRaz1Ac4R9-3USsPCDV5AyCtCZ5v9A-3K5rx1YzwatH2kt0UbyjmWdWJXb0y7W6Bc9_U';
        $this->token = '55e256ce-84f7-4e9f-810f-2f78e5804f5d';
        $this->endpoint = 'http://192.168.101.74:8082';
        $this->curl = Services::curlrequest();  // Load CURL service
    }

    // Function to send a message
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
            'from' => '09945428697', // Use your own phone number as the sender
            'token' => $this->token,
            'cloudBase' => $this->cloudBase,
        ];

        // Send the POST request to the endpoint
        try {
            $response = $this->curl->post($this->endpoint, [
                'json' => $messageData,
            ]);

            // Check if the response is successful
            if ($response->getStatusCode() === 200) {
                return ['status' => 'success', 'data' => json_decode($response->getBody())];
            } else {
                return ['status' => 'error', 'message' => 'Failed to send message'];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Exception: ' . $e->getMessage()];
        }
    }
}
