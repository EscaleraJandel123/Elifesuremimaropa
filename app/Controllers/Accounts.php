<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Accounts extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel(); // Palitan ang UserModel ng pangalan ng iyong model class kung iba ito
        $this->autoUpdateAccounts(); // Tawagin ang function sa pag-update ng mga accounts sa pag-construct ng class
    }

    public function autoUpdateAccounts()
    {
        $currentTime = time();
        $users = $this->user->findAll();

        foreach ($users as $user) {
            $timeLog = strtotime($user['time_log']);
            $timeDiff = $currentTime - $timeLog;
            $daysDiff = floor($timeDiff / (60 * 60 * 24)); // Calculate the difference in days

            if ($daysDiff >= 30 && $user['accountStatus'] != 'inactive') {
                $this->user->update($user['id'], ['accountStatus' => 'inactive']);
            }
        }
    }
}
