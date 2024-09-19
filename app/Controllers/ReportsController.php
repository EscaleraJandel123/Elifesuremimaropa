<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\AgentModel;
use App\Models\ClientModel;
use app\Models\CommiModel;

class ReportsController extends BaseController
{
    private $commi;
    private $user;
    private $agent;
    private $applicant;
    private $client;
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->commi = new CommiModel();
        $this->user = new UserModel();
        $this->agent = new AgentModel();
        $this->applicant = new ApplicantModel();
        $this->client = new ClientModel();
    }
    public function usersreportdata()
    {
        $data['alluser'] = $this->user->where('role !=', 'admin')->findAll();
        $data['allagents'] = $this->agent->findAll();
        $data['allclient'] = $this->client->findAll();
        $data['allapplicants'] = $this->applicant->where('status', 'confirmed')->findAll();
        return $data;
    }

    public function topcommissioner()
    {
        // Select the agent_id and sum of commissions for each agent
        $this->commi->select('agent_id, SUM(commi) AS total_commissions')
            ->groupBy('agent_id')
            ->orderBy('total_commissions', 'DESC')
            ->limit(3);//change to your top desire
        // Get the query result
        $result = $this->commi->get()->getResultArray();
        // Fetch additional agent data for the top agents
        $topAgents = [];
        foreach ($result as $row) {
            $agentId = $row['agent_id'];
            $agentData = $this->agent->where('agent_id', $agentId)->first();
            if ($agentData) {
                $agentData['total_commissions'] = $row['total_commissions'];
                $topAgents[] = $agentData;
            }
        }
        // Prepare the data to be returned
        $data['top_commi'] = $topAgents;
        // Return the data
        return $data;
    }

    private function topagentrecruters()
    {
        // Load the database service
        $builder = \Config\Database::connect()->table('agent a');
        $builder->select('a.username, a.FA, a.agentprofile, a.agent_token, (SELECT COUNT(*) FROM agent b WHERE b.FA = a.agent_id) AS total_fA');
        $builder->orderBy('total_fa', 'DESC');
        $builder->limit(3); // change for your desire
        // Get the result as an array
        $result = $builder->get()->getResultArray();
        // Pass the data to your view or perform any other actions
        $data['top'] = $result;
        return $data;
    }

    public function reports()
    {

        return view('Admin/reports');
    }
}
