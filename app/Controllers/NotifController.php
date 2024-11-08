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
        $ch = curl_init();
        $parameters = array(
            'apikey' => 'dfdb3f38323f2e2f0fca0d6ae9624fdb', //Your API KEY
            'number' => '+639366581432', // Using international format
            'message' => 'I just sent my first message with Semaphore',
        );
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Additional option for debugging
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $output = curl_exec($ch);
        if ($output === false) {
            echo 'Curl error: ' . curl_error($ch); // Show curl errors, if any
        } else {
            echo $output; // Show the response from Semaphore API
        }

        curl_close($ch);
    }

}
