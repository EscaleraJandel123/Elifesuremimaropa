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
        //     $to = '09366581432';
        //     $message = 'Welcome to Elifesure! Thank you for choosing us as your agency partner. We are here to serve you with excellence. For assistance. Mabuhay!';

        //     // Call sendSMS and capture the response
        //     $response = $this->sms->sendSMS($to,$message);

        //     // Decode JSON response to array for easier inspection
        //     $decodedResponse = json_decode($response, true);

        //     // Check if response is valid JSON and contains expected keys
        //     if (json_last_error() !== JSON_ERROR_NONE) {
        //         $error = json_last_error_msg();
        //         log_message('error', 'Invalid JSON response from Semaphore API: ' . $error);
        //         return $this->response->setJSON([
        //             'status' => 'error',
        //             'message' => 'Failed to parse response from Semaphore',
        //             'error' => $error
        //         ]);
        //     }

        //     // Log the full response and additional info
        //     log_message('info', 'Semaphore API full response: ' . print_r($decodedResponse, true));

        //     // Check if response indicates any errors
        //     if (isset($decodedResponse['status']) && $decodedResponse['status'] !== 'success') {
        //         $errorMessage = isset($decodedResponse['message']) ? $decodedResponse['message'] : 'Unknown error';
        //         log_message('error', 'Semaphore API returned an error: ' . $errorMessage);

        //         return $this->response->setJSON([
        //             'status' => 'error',
        //             'message' => 'Failed to send SMS',
        //             'error_details' => $decodedResponse
        //         ]);
        //     }

        //     // If the response is pending or has other details, return that as well
        //     return $this->response->setJSON([
        //         'status' => 'success',
        //         'message' => 'SMS sent (check status)',
        //         'response' => $decodedResponse
        //     ]);

        // Load the SMS Library

        // Get phone number and message from the POST request
        $phoneNumber = '+639366581432';
        $message = 'Hi';

        // Call the sendSms function from the library
        $response = $this->sms->sendSms($phoneNumber, $message);

        // Return the response in JSON format
        return $this->response->setJSON($response);
    }

}
