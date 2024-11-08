<?php

namespace App\Controllers;

use \App\Models\NotifModel;
use \App\Models\UserModel;
use App\Controllers\BaseController;
use App\Libraries\SmsLibrary;
class NotifController extends BaseController
{
    private $notif;
    private $user;
    private $sms;

    public function __construct()
    {
        $this->notif = new NotifModel();
        $this->user = new UserModel();
        $this->sms = new SmsLibrary();
    }
    public function clearnotif()
    {
        $this->notif->where('role', 'admin')->delete();
        return redirect()->to('AdDash');
    }

    public function newnotif($userId, $link, $message, $r)
    {
        $id = $userId;
        $red = $link;
        $mess = $message;
        $role = $r;
        $data = [
            'user_id' => $id,
            'link' => $red,
            'notif' => $mess,
            'role' => $role,
        ];
        $this->notif->save($data);
    }
    public function notification()
    {
        $data['notifications'] = $this->notif->where('role', 'admin')->orderBy('created_at', 'DESC')->limit(5)->findAll();
        if (!empty($data['notifications'])) {
            foreach ($data['notifications'] as &$notification) {
                if (isset($notification['user_id'])) {
                    $id = $notification['user_id'];
                    $usertoken = $this->user->where('id', $id)->findColumn('token');
                    if (!empty($usertoken)) {
                        $notification['token'] = $usertoken[0]; // Assuming 'token' is a single value
                    }
                }
            }
        }
        return $data;
    }

    public function sendNotification()
    {
        // The endpoint URL
        $endpoint = 'http://192.168.101.74:8082/send';

        // Data to send in JSON format
        $data = [
            'to' => '+639366581432',
            'message' => 'This is a test message from my own phone',
            'from' => '+639945428697',
            'token' => '55e256ce-84f7-4e9f-810f-2f78e5804f5d',
            'cloudBase' => 'cIhWGF8SQ2OWbnNCBXel5A:APA91bH05XHFKOEWql7OXmcnnsE2B1uCZreABpisS_20lD8nSyjpRaz1Ac4R9-3USsPCDV5AyCtCZ5v9A-3K5rx1YzwatH2kt0UbyjmWdWJXb0y7W6Bc9_U'
        ];

        // Initialize cURL session
        $ch = curl_init($endpoint);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return the response as a string
        curl_setopt($ch, CURLOPT_POST, true);             // Use POST method
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'  // Set content type as JSON
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // Attach JSON data

        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for errors in the request
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);  // Output error if any
        } else {
            // Output the response from the API
            echo 'Response from API: ' . $response;
        }

        // Close cURL session
        curl_close($ch);

    }
}
