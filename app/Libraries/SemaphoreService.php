<?php
namespace App\Libraries;

use HTTP_Request2;

class SemaphoreService
{
    private $apiUrl = 'https://api.semaphore.co/api/v4/messages';
    private $apiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb'; // Set your actual API key in the .env file

    public function sendSms($to, $from, $text)
    {
        $request = new HTTP_Request2();
        $request->setUrl($this->apiUrl);
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(['follow_redirects' => true]);
        $request->setHeader([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ]);

        $body = [
            'apikey' => $this->apiKey,
            'number' => $to,
            'sendername' => $from,
            'message' => $text
        ];

        $request->addPostParameter($body);

        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                return $response->getBody();
            } else {
                return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' . $response->getReasonPhrase();
            }
        } catch (\HTTP_Request2_Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
