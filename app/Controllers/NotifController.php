<?php

namespace App\Controllers;

use \App\Models\NotifModel;
use \App\Models\UserModel;
use App\Controllers\BaseController;
use App\Libraries\SMSService;
class NotifController extends BaseController
{
    private $notif;
    private $user;

    public function __construct()
    {
        $this->notif = new NotifModel();
        $this->user = new UserModel();
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
    // public function sendNotification() {
    //     $smsService = new SMSService(); // Load the SMS library

    //     $to = '+639945428697'; // The recipient's phone number
    //     $message = 'Your custom notification message.';

    //     $result = $smsService->sendSMS($to, $message);

    //     if ($result === true) {
    //         return 'SMS sent successfully!';
    //     } else {
    //         return 'Failed to send SMS: ' . $result;
    //     }
    // }

}
