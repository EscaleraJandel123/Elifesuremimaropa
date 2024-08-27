<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RTCModel;
use App\Models\UserModel;
use App\Models\AdminModel;

class RTCController extends BaseController
{
    private $chat;
    public function __construct()
    {
        $this->chat = new RTCModel();
    }


    // public function homechat()
    // { 
    //     $session = session();
    //     $userId = $session->get('id');
    //     $chatModel = new RTCModel();

    //     // Call the getUserData() method instead of usermerge()
    //     $data = $this->getUserData();

    //     $data['chat'] = $chatModel->where('recipient', $userId)->findAll();
    //     return view('chat', $data);
    // }

    // public function chat() //dito ka mag sesend ng message
    // {
    //     $session = session();
    //     $userId = $session->get('id');

    //     $chatModel = new RTCModel();
    //     $data['chat'] = $chatModel->where('recipient', $userId)->orderBy('id', 'desc')->get();
    //     $data = [
    //         'sender' => $userId,
    //         'recipient' => $this->request->getVar('sendto'),
    //         'message' => $this->request->getVar('message'),
    //     ];
    //     $this->chat->insert($data);
    //     return redirect()->to('/homechat');
    // }

    public function chat()
    {
        $session = session();
        $userId = $session->get('id');
        $role = $session->get('role');
        $data = [
            'sender' => $userId,
            'recipient' => $this->request->getVar('sendto'),
            'message' => $this->request->getVar('message'),
        ];

        // Assuming $this->chat is your model, you can retrieve the chat messages like this
        $chatModel = new RTCModel();

        $data['chat'] = $this->chat->where('sender', $userId)->orderBy('id', 'desc')->get();

        // Insert the new message
        $this->chat->insert($data);

        if($role === 'admin'){
            return redirect()->to('AdDash');
        } elseif($role === 'agent'){
            return redirect()->to('AgDash');
        }elseif($role === 'applicant'){
            return redirect()->to('AppDash');
        }
    }

    public function RTC()
    {
        $session = session();
        $userId = $session->get('id');
        $chatModel = new RTCModel();
        $data['userId'] = $userId;

        $data['chat'] = $chatModel->where('recipient', $userId)->findAll();
        $data['recieve'] = $chatModel->where('sender', $userId)->findAll();

        // Calculate time difference for each message
        foreach ($data['chat'] as &$chat) {
            $createdAt = new \DateTime($chat['created_at']);
            $now = new \DateTime();
            $diff = $now->diff($createdAt);
            $chat['time_diff'] = $this->formatTimeDifference($diff);
        }
        foreach ($data['recieve'] as &$receive) {
            $createdAt = new \DateTime($receive['created_at']);
            $now = new \DateTime();
            $diff = $now->diff($createdAt);
            $receive['time_diff'] = $this->formatTimeDifference($diff);
        }
        return $data;
    }


    // Helper function to format time difference
    private function formatTimeDifference($diff)
    {
        $formattedDiff = '';
        if ($diff->y > 0) {
            $formattedDiff .= $diff->y . 'y';
        }
        if ($diff->m > 0) {
            $formattedDiff .= $diff->m . 'mon';
        }
        if ($diff->d > 0) {
            $formattedDiff .= $diff->d . 'd' . ' ' ;
        }
        if ($diff->h > 0) {
            $formattedDiff .= $diff->h . 'h' . ' ' ;
        }
        if ($diff->i > 0) {
            $formattedDiff .= $diff->i . 'm' . ' ';
        }
        if ($diff->s > 0) {
            $formattedDiff .= $diff->s . 's';
        }
        return $formattedDiff;
    }
    private function getDataAd()
    {
        $session = session();

        // Get the user ID from the session
        $userId = $session->get('id');

        // Load the User model
        $adminModel = new AdminModel();

        // Find the user by ID
        $data['admin'] = $adminModel->where('admin_id', $userId)
            ->orderBy('id', 'desc')
            ->first();

        return $data;
    }
    private function getData()
    {
        $session = session();
        //Check if the user is logged in
        if (!$session->get('id')) {
            // Redirect or handle the case where the user is not logged in
            return redirect()->to('login');
        }
        // Get the user ID from the session
        $userId = $session->get('id');
        // Load the User model
        $userModel = new UserModel();
        // Find the user by ID
        $data['user'] = $userModel->find($userId);
        return $data;
    }
    private function getUserData()
    {
        $session = session();
        $userId = $session->get('id');

        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);

        return $data;
    }

}
