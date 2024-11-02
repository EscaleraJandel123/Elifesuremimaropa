<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SMSController extends BaseController
{
    public function sendNotification()
    {
        helper('semaphore');

        $number = $this->request->getPost('number'); // Receive number from POST request
        $message = $this->request->getPost('message'); // Receive message from POST request

        if (empty($number) || empty($message)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Number and message are required.']);
        }

        $result = send_sms($number, $message);

        if ($result && isset($result['status']) && $result['status'] === 'success') {
            return $this->response->setJSON(['status' => 'success', 'message' => 'SMS sent successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to send SMS.']);
        }
    }
}
