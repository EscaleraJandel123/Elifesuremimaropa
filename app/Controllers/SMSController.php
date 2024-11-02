<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SMSController extends BaseController
{
    public function sendNotification()
    {
        helper('semaphore');

        $number = '9945428697';
        $message = 'This is a message';

        if ($number && $message) {
            $result = send_sms($number, $message);

            if (isset($result['status']) && $result['status'] === 'success') {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Notification sent successfully!'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to send SMS.',
                    'error' => $result['error'] ?? 'Unknown error'
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid request. Number and message are required.'
        ]);
    }
}
