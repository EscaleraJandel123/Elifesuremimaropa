<?php

namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\Config\Services;

class SmsLibrary
{
    protected $endpoint;
    protected $token;
    protected $cloudBase;

    // Constructor to initialize values
    public function __construct()
    {
        // Initialize the endpoint and keys
        $this->endpoint = 'http://192.168.101.74:8082/send';
        $this->token = '55e256ce-84f7-4e9f-810f-2f78e5804f5d';
        $this->cloudBase = 'cIhWGF8SQ2OWbnNCBXel5A:APA91bH05XHFKOEWql7OXmcnnsE2B1uCZreABpisS_20lD8nSyjpRaz1Ac4R9-3USsPCDV5AyCtCZ5v9A-3K5rx1YzwatH2kt0UbyjmWdWJXb0y7W6Bc9_U';
    }

    // Function to send SMS
    public function sendSms($to, $message, $from)
    {
        // Prepare the data to be sent
        $data = [
            'to' => $to,
            'message' => $message,
            'from' => $from,
            'token' => $this->token,
            'cloudBase' => $this->cloudBase,
        ];

        // Initialize the CURL service
        $curl = Services::curlrequest();

        // Send the POST request
        $response = $curl->post($this->endpoint, [
            'json' => $data,
        ]);

        // Check the response
        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody());
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to send message',
            ];
        }
    }
}
