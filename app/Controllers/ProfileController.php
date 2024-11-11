<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use \App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\AgentModel;
use App\Controllers\AgentController;
use App\Models\ClientModel;
use App\Models\ClientPlanModel;
use App\Models\FilesModel;
use App\Controllers\NotifController;

class ProfileController extends BaseController
{
    private $client_plan;
    private $agcon;
    private $client;
    private $user;
    private $app;
    private $file;
    private $notifcont;
    // protected $cache;

    public function __construct()
    {
        $this->client = new ClientModel();
        $this->agcon = new AgentController();
        $this->client_plan = new ClientPlanModel();
        $this->user = new UserModel();
        $this->app = new ApplicantModel();
        $this->file = new FilesModel();
        // $this->cache = \Config\Services::cache();
        $this->notifcont = new NotifController();
    }
    public function agentprofile($token)
    {
        $agentModel = new AgentModel();
        $data = array_merge($this->getDataAd(), $this->notifcont->notification());

        // Get agent data
        $data['agent'] = $agentModel->where('agent_token', $token)->first();
        if ($data['agent']) {
            $agentid = $data['agent']['agent_id'];
            $data['FA'] = $agentModel->where('FA', $agentid)->paginate(10); // Change 10 to the number of items per page
            $data['pager'] = $agentModel->pager;

            // Retrieve files and add to $data
            $data = $this->files($data, $agentid, 'agent');
        } else {
            // Handle the case where the agent is not found
            return redirect()->back()->with('error', 'Agent not found');
        }

        return view("Admin/agentprofile", $data);
    }

    public function subagentprofile($token)
    {
        $agentModel = new AgentModel();
        $data = array_merge($this->getDataAd(), $this->agcon->getData(), $this->agcon->getDataAge(), $this->notifcont->notification());

        $data['subagent'] = $agentModel->where('agent_token', $token)->first();
        if ($data['subagent']) {
            $agentid = $data['subagent']['agent_id'];
            $data['FA'] = $agentModel->where('FA', $agentid)->paginate(10); // Change 10 to the number of items per page
            $data['pager'] = $agentModel->pager;

            // Retrieve files and add to $data
            $data = $this->files($data, $agentid, 'subagent');
        } else {
            // Handle the case where the subagent is not found
            return redirect()->back()->with('error', 'Agent not found');
        }
        return view("Agent/subagentprofile", $data);
    }

    public function applicantprofile($token)
    {
        $appmodel = new ApplicantModel();
        $data = array_merge($this->getDataAd(), $this->notifcont->notification());
        $data['applicant'] = $appmodel->where('app_token', $token)->first();

        if ($data['applicant']) {
            $data = $this->files($data, $data['applicant']['applicant_id'], 'applicant'); // Pass $data to the files method
        } else {
            // Handle the case where the applicant is not found
            return redirect()->back()->with('error', 'Applicant not found');
        }

        return view("Admin/applicantprofile", $data);
    }

    public function files($data, $userId, $userType)
    {

        $files = $this->file->where('user_id', $userId)->first();

        // Initialize an array with null values to handle non-existing files
        $fileData = [
            'file1' => null,
            'file2' => null,
            'file3' => null,
            'file4' => null,
            'file5' => null,
            'file6' => null,
        ];

        if ($files) {
            // Merge existing files into the array
            $fileData = array_merge($fileData, $files);
        }

        // Set file data based on user type
        if ($userType === 'applicant') {
            $data['username'] = $data['applicant']['username'];
        } else {
            $data['username'] = $data[$userType]['username'];
        }

        $data['files'] = $fileData;
        $data['userIdExists'] = $files ? true : false;

        return $data;
    }



    public function ManageAgent()
    {
        $agentModel = new AgentModel();
        // Use the model to fetch all records
        $data['agent'] = $agentModel->findAll();
        return view('Admin/ManageAgent', $data);
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

    // public function try()
    // {
    //     // Encrypt a string
    //     $encryption = \Config\Services::encrypter();
    //     $encryptedString = $encryption->encrypt('Hello, world!');

    //     echo "Encrypted String: $encryptedString<br>";

    //     // Decrypt the string
    //     $decryptedString = $encryption->decrypt($encryptedString);
    //     echo "Decrypted String: $decryptedString";
    // }

    public function myclientprofile($token)
    {
        // Fetch it from the database
        $data = array_merge($this->agcon->getData(), $this->agcon->getDataAge());
        $data['client'] = $this->client->where('client_token', $token)->first();
        if ($data['client']) {
            $data['myplan'] = $this->client_plan->select('agent.username as agent_name, plan.plan_name, client_plan.created_at, 
                client_plan.mode_payment, client_plan.term, client_plan.status, client_plan.id, client_plan.token ')
                ->join('agent', 'agent.agent_id = client_plan.agent')
                ->join('plan', 'plan.token = client_plan.plan')
                ->where('client_plan.client_id', $data['client']['client_id'])
                ->findAll();
        } else {
            // Handle the case where the client is not found
            return redirect()->to('some_error_page')->with('error', 'Client not found');
        }
        return view('Agent/clientprofile', $data);
    }
    private function getData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['user'] = $this->user->find($userId);
        return $data;
    }

    private function getDataApp()
    {
        $session = session();
        $userId = $session->get('id');
        $data['applicant'] = $this->app->where('applicant_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }

    public function clientprofile($token)
    {
        $data = array_merge($this->getDataAd(), $this->notifcont->notification());
        $data['client'] = $this->client->where('client_token', $token)->first();
        if ($data['client']) {
            $data['myplan'] = $this->client_plan->select('agent.username as agent_name, plan.plan_name, client_plan.created_at, 
                client_plan.mode_payment, client_plan.term, client_plan.status, client_plan.id, client_plan.token, client_plan.receipt, clientt_plan.id')
                ->join('agent', 'agent.agent_id = client_plan.agent')
                ->join('plan', 'plan.token = client_plan.plan')
                ->where('client_plan.client_id', $data['client']['client_id'])
                ->findAll();
        }
        if ($data['client']) {
            $data = $this->files($data, $data['client']['client_id'], 'client'); // Pass $data to the files method
        }
        return view("Admin/clientprofile", $data);
    }
}
