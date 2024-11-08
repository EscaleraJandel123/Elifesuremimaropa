<?php

namespace App\Controllers;

use \App\Models\NotifModel;
use \App\Models\UserModel;
use App\Controllers\BaseController;
// use App\Libraries\SemaphoreService;
use CodeIgniter\HTTP\ResponseInterface;
class NotifController extends BaseController
{
    private $notif;
    private $user;
    // private $sms;
    private $apiUrl = 'http://192.168.101.74:8082'; // Use the IP and port shown in Treccar SMS Gateway
    private $apiKey = '55e256ce-84f7-4e9f-810f-2f78e5804f5d'; // Replace with the API key from Treccar

    public function __construct()
    {
        $this->notif = new NotifModel();
        $this->user = new UserModel();
        // $this->sms = new SemaphoreService();
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
        $to = '09366581432';
        $message = 'Welcome to Elifesure! Thank you for choosing us as your agency partner. We are here to serve you with excellence. For assistance. Mabuhay!';
        // Call sendSMS and capture the response
        $this->sendSMS($to,$message);
    }

    public function sendSMS($to, $message)
    {
        $client = \Config\Services::curlrequest();

        // Prepare the data for the API request
        $data = [
            'api_key' => $this->apiKey,
            'number' => $to,
            'message' => $message,
        ];

        try {
            // Send a POST request to the Treccar SMS Gateway API
            $response = $client->post($this->apiUrl, [
                'form_params' => $data,
            ]);

            // Check for a successful response
            if ($response->getStatusCode() == ResponseInterface::HTTP_OK) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'SMS sent successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to send SMS']);
            }
        } catch (\Exception $e) {
            // Handle errors
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
