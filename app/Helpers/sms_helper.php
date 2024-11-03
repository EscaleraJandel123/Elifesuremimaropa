<?php

// app/Helpers/sms_helper.php
function send_sms($number, $message)
{
    // Retrieve the API key from configuration
    $apikey = config('App')->semaphoreApiKey;

    // Set the parameters for the Semaphore API
    $parameters = [
        'apikey' => $apikey,
        'number' => $number,
        'message' => $message,
        'sendername' => 'SEMAPHORE'  // You can set this to your preferred sender name
    ];

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and close the connection
    $output = curl_exec($ch);
    curl_close($ch);

    // Return the response from Semaphore API
    return $output;
}
