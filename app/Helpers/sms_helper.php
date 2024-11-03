<?php

if (!function_exists('send_sms')) {
    /**
     * Sends an SMS using Semaphore's API
     *
     * @param string $apikey Your Semaphore API key
     * @param string $number Recipient's phone number
     * @param string $message The message you want to send
     * @return mixed The API response
     */
    function send_sms($apikey, $number, $message)
    {
        $ch = curl_init();
        $parameters = [
            'apikey' => $apikey,
            'number' => $number,
            'message' => $message,
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output, true); // Return as an associative array
    }
}
