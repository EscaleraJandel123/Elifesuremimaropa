<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\AgentModel;
use App\Models\ClientModel;

class ReportsController extends BaseController
{
    private $user;
    private $agent;
    private $applicant;
    private $client;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->agent = new AgentModel();
        $this->applicant = new ApplicantModel();
        $this->client = new ClientModel();
    }
    public function data()
    {
        $data['alluser'] = $this->user->where('role !=', 'admin')->findAll();
        $data['allagents'] = $this->agent->findAll();
        $data['allclient'] = $this->client->findAll();
        $data['allapplicants'] = $this->applicant->where('status', 'confirmed')->findAll();
        return view('Admin/AdDash', $data);
    }
}
