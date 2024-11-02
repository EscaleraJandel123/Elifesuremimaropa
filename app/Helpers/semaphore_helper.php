<?php
function send_sms($number, $message) {
    $ch = curl_init();
    $parameters = array(
        'apikey' => 'YOUR_API_KEY', // Replace with your Semaphore API key
        'number' => $number,
        'message' => $message,
        'sendername' => 'SEMAPHORE'
    );
    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $output = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($output, true);
}
