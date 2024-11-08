<?php
namespace App\Libraries;

use HTTP_Request2;

class SmsLibrary
{
    private $apiUrl = 'https://wg94q1.api.infobip.com/sms/2/text/advanced';
    private $apiKey = '0e699c0e2bde6e673b9f8905c4e70220-3a340c6a-625a-423b-bc38-c496873ae589';

    public function sendSms($to, $from, $text)
    {
        // Convert the phone number to international format if it starts with "09"
        $to = $this->convertToInternationalFormat($to);

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

    // Helper function to convert "09" to "63"
    private function convertToInternationalFormat($number)
    {
        if (strpos($number, '09') === 0) {
            return '63' . substr($number, 1); // Replace "09" with "63"
        }
        return $number;
    }
}
