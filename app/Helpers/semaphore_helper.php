<?php

if (!function_exists('send_sms')) {
    function send_sms($number, $message)
    {
        $api_key = 'dfdb3f38323f2e2f0fca0d6ae9624fdb';
        
        $url = 'https://api.semaphore.co/api/v4/messages';

        $data = [
            'apikey' => $api_key,
            'number' => $number,
            'message' => $message,
            'sendername' => 'SENDER_NAME' // Optional, if you have a custom sender name
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }
}
