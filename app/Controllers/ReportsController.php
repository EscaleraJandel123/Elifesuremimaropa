<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\AgentModel;
use App\Models\ClientModel;
use App\Models\CommiModel;
use App\Models\AdminModel;

class ReportsController extends BaseController
{
    private $commi;
    private $user;
    private $agent;
    private $applicant;
    private $client;
    private $db;
    private $admin;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->commi = new CommiModel();
        $this->user = new UserModel();
        $this->agent = new AgentModel();
        $this->applicant = new ApplicantModel();
        $this->client = new ClientModel();
        $this->admin = new AdminModel();
    }
    public function usersreportdata()
    {
        $data['alluser'] = $this->user->where('role !=', 'admin')->findAll();
        $data['allagents'] = $this->agent->findAll();
        $data['allclient'] = $this->client->findAll();
        $data['allapplicants'] = $this->applicant->where('status', 'confirmed')->findAll();
        return $data;
    }

    // public function topcommissioner()
    // {
    //     // Select the agent_id and sum of commissions for each agent
    //     $this->commi->select('agent_id, SUM(commi) AS total_commissions')
    //         ->groupBy('agent_id')
    //         ->orderBy('total_commissions', 'DESC')
    //         ->limit(3);//change to your top desire
    //     // Get the query result
    //     $result = $this->commi->get()->getResultArray();
    //     // Fetch additional agent data for the top agents
    //     $topAgents = [];
    //     foreach ($result as $row) {
    //         $agentId = $row['agent_id'];
    //         $agentData = $this->agent->where('agent_id', $agentId)->first();
    //         if ($agentData) {
    //             $agentData['total_commissions'] = $row['total_commissions'];
    //             $topAgents[] = $agentData;
    //         }
    //     }
    //     // Prepare the data to be returned
    //     $data['top_commi'] = $topAgents;
    //     // Return the data
    //     return $data;
    // }

    public function topcommissioner()
    {
        // Select the agent_id and sum of commissions for each agent
        $this->commi->select('agent_id, SUM(commi) AS total_commissions')
            ->groupBy('agent_id')
            ->orderBy('total_commissions', 'DESC')
            ->limit(3); // Change to your desired number of top agents

        // Get the query result
        $result = $this->commi->get()->getResultArray();

        // Initialize ranking
        $rank = 1;
        $topAgents = [];

        // Fetch additional agent data for the top agents
        foreach ($result as $row) {
            $agentId = $row['agent_id'];
            $agentData = $this->agent->where('agent_id', $agentId)->first();

            if ($agentData) {
                // Add total commissions and ranking
                $agentData['total_commissions'] = $row['total_commissions'];
                $agentData['ranking'] = $rank++;

                // Add the agent data to the topAgents array
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
        $builder->select('a.username, a.lastname, a.firstname, a.middlename, a.FA, a.rank, a.agentprofile, a.agent_token, 
            (SELECT COUNT(*) FROM agent b WHERE b.FA = a.agent_id) AS total_fA');
        $builder->having('total_fA > 0'); 
        $builder->orderBy('total_fA', 'DESC');
        $builder->limit(3); // change for your desired number of top agents

        // Get the result as an array
        $result = $builder->get()->getResultArray();

        // Add rank to the result
        $rank = 1;
        $rankedAgents = [];

        foreach ($result as $agent) {
            // Add rank to each agent data
            $agent['ranking'] = $rank++;
            $rankedAgents[] = $agent;
        }

        // Pass the ranked data
        $data['top'] = $rankedAgents;
        return $data;
    }

    public function getData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['user'] = $this->user->find($userId);
        return $data;
    }

    public function getDataAd()
    {
        $session = session();
        $userId = $session->get('id');
        $data['admin'] = $this->admin->where('admin_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }
    private function getagent()
    {
        $data['agents'] = $this->agent->findAll();
        return $data;
    }

    private function getapplicants()
    {
        $data['applicants'] = $this->applicant->where('status', 'pending')->findAll();
        return $data;
    }

    public function reports()
    {
        $data = array_merge(
            $this->getData(),
            $this->getDataAd(),
            $this->getagent(),
            $this->topcommissioner(),
            $this->topagentrecruters(),
            $this->getapplicants()
        );
        return view('Admin/reports', $data);
    }
}
