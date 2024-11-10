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
    $query = $this->app->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, COUNT(applicant_id) AS applicant_count FROM applicant WHERE status != 'confirmed' GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
    $result = $query->getResultArray();
    $jsonResult = json_encode($result);
    return $jsonResult;
  }

  // Controller method to fetch monthly commission data
  // public function getMonthlyCommissions()
  // {
  //   $session = session();
  //   $userId = $session->get('id');
  //   $query = $this->commission->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, SUM(commi) AS total_commission FROM commissions WHERE agent_id = $userId GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
  //   $result = $query->getResultArray();
  //   $jsonResult = json_encode($result);
  //   return $jsonResult;
  // }

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
  public function getsubagentscount()
{
    $session = session();
    $userId = $session->get('id');

    // Fetch counts of sub-agents where FA matches the user's ID
    $query = $this->app->query("
        SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, COUNT(id) AS agent_count
        FROM agent
        WHERE FA = ?
        GROUP BY YEAR(created_at), MONTH(created_at)
        ORDER BY year ASC, month ASC
    ", [$userId]);

    $result = $query->getResultArray();
    return json_encode($result);
}

  public function predictMonthlyAgents()
  {
    $result = json_decode($this->monthlyAgentCount(), true);
    $predictions = $this->generateTrendBasedPredictions($result, 'agent_count', 12);  // 12 months for a full year
    return json_encode($predictions);
  }

  public function predictMonthlyApplicants()
  {
    $result = json_decode($this->getApplicantsCount(), true);
    $predictions = $this->generateTrendBasedPredictions($result, 'applicant_count', 12);  // 12 months for a full year
    return json_encode($predictions);
  }

  public function predictMonthlyCommissions()
  {
    $result = json_decode($this->getoverallMonthlyCommissions(), true);
    $predictions = $this->generateTrendBasedPredictions($result, 'total_commission', 12);  // 12 months for a full year
    return json_encode($predictions);
  }

  private function generateTrendBasedPredictions($data, $field, $periods = 12)
  {
    // Get the last available month and year
    $lastYear = $data[count($data) - 1]['year'];
    $lastMonth = $data[count($data) - 1]['month'];
    $lastValue = $data[count($data) - 1][$field];

    // Calculate the growth rate based on recent data points (e.g., last 3 months)
    $recentValues = array_slice(array_column($data, $field), -3);  // Adjust period as needed
    $growthRate = 0;

    if (count($recentValues) > 1) {
      // Calculate average growth rate between recent months
      for ($i = 1; $i < count($recentValues); $i++) {
        $growthRate += ($recentValues[$i] - $recentValues[$i - 1]) / max($recentValues[$i - 1], 1);  // Avoid division by zero
      }
      $growthRate /= (count($recentValues) - 1);  // Average growth rate
    }

    // Generate predictions
    $predictions = [];
    for ($i = 1; $i <= $periods; $i++) {
      // Increment month and adjust year if necessary
      $lastMonth++;
      if ($lastMonth > 12) {
        $lastMonth = 1;
        $lastYear++;
      }

      // Apply growth rate to last value for prediction
      $lastValue = $lastValue * (1 + $growthRate);

      $predictions[] = [
        'month' => $lastMonth,
        'year' => $lastYear,
        $field => round($lastValue)  // Predicted value with trend applied
      ];
    }

    return $predictions;
  }

  // agents
  public function getMonthlyCommissions()
  {
    $session = session();
    $userId = $session->get('id');
    $query = $this->commission->query("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, SUM(commi) AS total_commission FROM commissions WHERE agent_id = $userId GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY year ASC, month ASC");
    $result = $query->getResultArray();
    return json_encode($result);
  }

  // Prediction method for the next 12 months
  public function predictAgentMonthlyCommissions()
  {
    $result = json_decode($this->getMonthlyCommissions(), true);
    $predictions = $this->generatePredictions($result, 'total_commission', 12);  // Predict for the next 12 months
    return json_encode($predictions);
  }


  private function generatePredictions($data, $field, $periods = 12)
  {
    // Get the last available month and year
    $lastYear = $data[count($data) - 1]['year'];
    $lastMonth = $data[count($data) - 1]['month'];

    // Calculate the average growth rate based on recent data
    $values = array_column($data, $field);
    $averageGrowth = count($values) > 1 ? ($values[count($values) - 1] - $values[count($values) - 2]) : 0;

    $predictions = [];
    for ($i = 1; $i <= $periods; $i++) {
      // Increment month and adjust year if necessary
      $lastMonth++;
      if ($lastMonth > 12) {
        $lastMonth = 1;
        $lastYear++;
      }

      // Estimate the commission based on average growth
      $predictedValue = end($values) + $averageGrowth * $i;

      $predictions[] = [
        'month' => $lastMonth,
        'year' => $lastYear,
        $field => round($predictedValue)
      ];
    }

    return $predictions;
  }


}
