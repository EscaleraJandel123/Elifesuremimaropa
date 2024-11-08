<?php
namespace App\Libraries;

use HTTP_Request2;

class SmsLibrary
{
    private $apiUrl = 'https://api.semaphore.co/api/v4/messages';
    private $apiKey = 'dfdb3f38323f2e2f0fca0d6ae9624fdb';

    public function sendSms($to, $from, $text)
    {
        $request = new HTTP_Request2();
        $request->setUrl($this->apiUrl);
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(['follow_redirects' => true]);
        $request->setHeader([
            'Authorization' => 'App ' . $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]);

        $body = [
            "messages" => [
                [
                    "destinations" => [["to" => $to]],
                    "from" => $from,
                    "text" => $text
                ]
            ]
        ];

        $request->setBody(json_encode($body));

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
