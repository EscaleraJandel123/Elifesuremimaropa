<?php
namespace App\Libraries;

use Twilio\Rest\Client;

class SMSService {
    protected $client;

    public function __construct() {
        $sid = getenv('TWILIO_SID');    // Load Twilio SID from .env
        $token = getenv('TWILIO_TOKEN'); // Load Twilio Token from .env
        $this->client = new Client($sid, $token); // Initialize Twilio Client
    }

    public function sendSMS($to, $message) {
        try {
            $message = $this->client->messages->create(
                $to, // Recipient's phone number
                [
                    'from' => getenv('TWILIO_PHONE_NUMBER'), // Sender's Twilio number
                    'body' => $message
                ]
            );
            return $message->sid; // Return message SID if successful
        } catch (\Exception $e) {
            return $e->getMessage(); // Return error message if something goes wrong
        }
    }
}
