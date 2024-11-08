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
        $phoneNumber = '09366581432';
        $message = 'Hi';

        // Call the sendSms function from the library
        $response = $this->sms->sendSms($phoneNumber, $message);

        // Return the response in JSON format
        return $this->response->setJSON($response);
    }
}
