<?php
namespace App\Libraries;

use Twilio\Rest\Client;

class SMSService {
    protected $client;

    public function __construct() {
        $sid = 'ACe186affed625b3c41f27090783cc5e00';
        $token = 'af1b0428794f7c530edb661a21031afe';
        $this->client = new Client($sid, $token);
    }

    public function sendSMS($to, $message) {
        try {
            $this->client->messages->create(
                $to, // The phone number you want to send to
                [
                    'from' => '+19705281626', // Your Twilio number
                    'body' => $message
                ]
            );
            return true;
        } catch (\Exception $e) {
            return $e->getMessage(); // Return error if sending failed
        }
    }
}
