<?php

namespace App\Controllers;

use App\Models\AgentModel;
use App\Controllers\BaseController;
use App\Models\CommiModel;
use App\Models\ApplicantModel;

class ChartsController extends BaseController
{
  private $commission;
  private $agent;
  private $app;
  // protected $cache;

  public function __construct()
  {
    $this->agent = new AgentModel();
    $this->commission = new CommiModel();
    $this->app = new ApplicantModel();
    // $this->cache = \Config\Services::cache();
  }

  public function monthlyAgentCount()
  {
    $query = $this->agent->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, COUNT(agent_id) AS agent_count FROM agent GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;

  }

  public function getApplicantsCount()
  {
    $query = $this->app->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, COUNT(applicant_id) AS applicant_count FROM applicant GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;
  }

  // Controller method to fetch monthly commission data
  public function getMonthlyCommissions()
  {
    $session = session();
    $userId = $session->get('id');
    $query = $this->commission->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, SUM(commi) AS total_commission FROM commissions WHERE agent_id = $userId GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;
  }

  public function getoverallMonthlyCommissions()
  {
    $session = session();
    $userId = $session->get('id');
    $query = $this->commission->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, SUM(commi) AS total_commission FROM commissions GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;
  }

  public function getoverallYearlyCommissions()
  {
    $session = session();
    $userId = $session->get('id');
    $query = $this->commission->query("SELECT YEAR(created_at) AS year, SUM(commi) AS total_commission FROM commissions GROUP BY YEAR(created_at) ORDER BY year ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;
  }

  public function getYearlyCommissions()
  {
    $session = session();
    $userId = $session->get('id');
    $query = $this->commission->query("SELECT YEAR(created_at) AS year, SUM(commi) AS total_commission FROM commissions WHERE agent_id = $userId GROUP BY YEAR(created_at) ORDER BY year ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;
  }


  public function predictMonthlyAgents()
  {
    $result = json_decode($this->monthlyAgentCount(), true);
    $predictions = $this->generatePredictions($result, 'agent_count');
    return json_encode($predictions);
  }

  public function predictMonthlyApplicants()
  {
    $result = json_decode($this->getApplicantsCount(), true);
    $predictions = $this->generatePredictions($result, 'applicant_count');
    return json_encode($predictions);
  }

  public function predictMonthlyCommissions()
  {
    $result = json_decode($this->getoverallMonthlyCommissions(), true);
    $predictions = $this->generatePredictions($result, 'total_commission');
    return json_encode($predictions);
  }

  private function generatePredictions($data, $field, $periods = 3)
  {
    // Get the last available month and year
    $lastYear = $data[count($data) - 1]['year'];
    $lastMonth = $data[count($data) - 1]['month'];

    // Calculate an average growth rate or trend
    $values = array_column($data, $field);
    $movingAverage = array_sum(array_slice($values, -$periods)) / $periods;

    $predictions = [];
    for ($i = 1; $i <= $periods; $i++) {
      // Increment month and adjust year if necessary
      $lastMonth++;
      if ($lastMonth > 12) {
        $lastMonth = 1;
        $lastYear++;
      }

      $predictions[] = [
        'month' => $lastMonth,
        'year' => $lastYear,
        $field => round($movingAverage)  // predicted value
      ];
    }

    return $predictions;
  }
}
