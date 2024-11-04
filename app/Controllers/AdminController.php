<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\HomepageController;
use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\Form1Model;
use App\Models\Form2Model;
use App\Models\Form3Model;
use App\Models\Form4Model;
use App\Models\Form5Model;
use App\Models\AgentModel;
use App\Models\ConfirmModel;
use App\Models\ScheduleModel;
use App\Models\CommiModel;
use App\Models\SignatureModel;
// use App\Models\NotifModel;
use App\Controllers\NotifController;
use App\Controllers\ReportsController;
use App\Libraries\SemaphoreService;

class AdminController extends BaseController
{
    private $commi;
    private $client;
    private $confirm;
    private $db;
    private $homecon;
    private $agent;
    private $user;
    private $applicant;
    private $admin;
    private $form1;
    private $form2;
    private $form3;
    private $form4;
    private $esign;
    private $form5;
    // private $notif;
    private $notifcont;
    private $reportscont;
    private $sms;

    protected $scheduleModel;
    // protected $cache;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->confirm = new ConfirmModel();
        $this->user = new UserModel();
        $this->applicant = new ApplicantModel();
        $this->agent = new AgentModel();
        $this->admin = new AdminModel();
        $this->form1 = new Form1Model();
        $this->form2 = new Form2Model();
        $this->form3 = new Form3Model();
        $this->form4 = new Form4Model();
        $this->form5 = new Form5Model();
        $this->homecon = new HomepageController();
        $this->client = new ClientModel();
        $this->scheduleModel = new ScheduleModel();
        $this->esign = new SignatureModel();
        $this->commi = new CommiModel();
        // $this->notif = new NotifModel();
        // $this->cache = \Config\Services::cache();
        $this->notifcont = new NotifController();
        $this->reportscont = new ReportsController();
        $this->sms = new SemaphoreService();
    }

    public function AdDash()
    {
        $totalAgents = count($this->agent->findAll());
        $totalApplicants = count($this->applicant->findAll());
        $pendingApplicants = $this->applicant->where('status', 'pending')->countAllResults();
        $data = array_merge(
            $this->getData(),
            $this->getDataAd(),
            $this->topagent(),
            $this->getagent(),
            $this->topcommi(),
            $this->notifcont->notification(),
            $this->reportscont->usersreportdata()
        );
        $data['totalAgents'] = $totalAgents;
        $data['totalApplicants'] = $totalApplicants;
        $data['pendingApplicants'] = $pendingApplicants;
        return view('Admin/AdDash', $data);
    }


    //Top 3 Agents
    private function topagent()
    {
        // Load the database service
        $builder = \Config\Database::connect()->table('agent a');
        $builder->select('a.username, a.FA, a.agentprofile, a.agent_token, (SELECT COUNT(*) FROM agent b WHERE b.FA = a.agent_id) AS total_fA');
        $builder->orderBy('total_fa', 'DESC');
        $builder->limit(3);
        // Get the result as an array
        $result = $builder->get()->getResultArray();
        // Pass the data to your view or perform any other actions
        $data['top'] = $result;
        return $data;
    }

    public function topcommi()
    {
        // Select the agent_id and sum of commissions for each agent
        $this->commi->select('agent_id, SUM(commi) AS total_commissions')
            ->groupBy('agent_id')
            ->orderBy('total_commissions', 'DESC')
            ->limit(3);
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

    private function getagent()
    {
        $data['agent'] = $this->agent->findAll();
        return $data;
    }

    public function ManageAgent()
    {
        // $agentModel = new AgentModel();
        $data = array_merge($this->notifcont->notification(), $this->usermerge());
        $data['agent'] = $this->agent->paginate(10, 'group1'); // Change 10 to the number of items per page
        $data['pager'] = $this->agent->pager;
        return view('Admin/ManageAgent', $data);
    }

    public function Forms()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        return view('Admin/Forms', $data);
    }

    public function formsTable($form)
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        $data['user'] = $this->user->where(['role !=' => 'admin'])->Where(['role !=' => 'client'])->findAll();
        $data['link'] = $form;
        $search = $this->request->getPost('searchusers');

        if (!empty($search)) {
            $data['user'] = $this->user->like('username', $search)->where(['role !=' => 'admin'])->findAll();
        }
        return view('Admin/formsTable', $data);
        // var_dump( $search);
    }

    public function ManageApplicant()
    {
        // $appmodel = new ApplicantModel();
        $data = array_merge($this->notifcont->notification(), $this->usermerge());
        // Add a where condition to retrieve only records with status = 'confirmed'
        $applicants = $this->applicant->where('status', 'pending')->paginate(10, 'group1');
        $data['applicant'] = $applicants;
        $data['pager'] = $this->applicant->pager;
        return view('Admin/ManageApplicant', $data);
    }

    private function usermerge()
    {
        $session = session();
        $userId = $session->get('id');
        $data = $this->getDataAd();
        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);
        return $data;
    }

    public function userSearch()
    {
        $data = array_merge($this->notifcont->notification(), $this->usermerge());
        $filterUser = $this->request->getPost('filterUser');
        $applicants = $this->applicant->like('username', $filterUser)->where('status', 'pending')->paginate(10, 'group1');
        $data['applicant'] = $applicants;
        $data['pager'] = $this->applicant->pager;
        return view('Admin/ManageApplicant', $data);
    }

    // Controller method for searching agents by full name
    public function agentSearch()
    {
        $data = array_merge($this->notifcont->notification(), $this->usermerge());
        $filterUser = $this->request->getPost('filterAgent');
        $agents = $this->agent->like('username', $filterUser)->paginate(10, 'group1');
        $data['pager'] = $this->agent->pager; // Use $agentModel->pager
        $data['agent'] = $agents;
        return view('Admin/ManageAgent', $data);
    }

    public function clientSearch()
    {
        $data = array_merge($this->notifcont->notification(), $this->usermerge());
        $filterUser = $this->request->getPost('filterClient');
        $client = $this->client->like('username', $filterUser)->paginate(10, 'group1');
        $data['pager'] = $this->client->pager; // Use $agentModel->pager
        $data['clients'] = $client;
        return view('Admin/ManageClient', $data);
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

    public function AdProfile()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        return view('Admin/AdProfile', $data);
    }

    public function AdSetting()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        return view('Admin/AdSetting', $data);
    }

    public function AdHelp()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        return view('Admin/AdHelp', $data);
    }

    public function promotion()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        $search = $this->request->getPost('searchusers');
        if (!empty($search)) {
            $data['applicant'] = $this->applicant->like('username', $search)->findAll();
        } else {
            $data['applicant'] = $this->applicant->where('status', 'pending')->paginate(10, 'group1');
            $data['pager'] = $this->applicant->pager;
        }
        return view('Admin/promotion', $data);
    }

    public function getData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['user'] = $this->user->find($userId);
        return $data;
    }

    public function viewAppForm($token)
    {
        $lifechangerForm = $this->form1->where('app_life_token', $token)->first();
        if (!$lifechangerForm) {
            return redirect()->back()->with('error', 'No valid Data');
        }
        $data['lifechangerform'] = $this->form1->where('app_life_token', $token)->first();
        $data['sign'] = $this->esign->where('user_token', $token)->first();
        $data['user'] = $this->user->where('token', $token)->first();
        return view('Admin/Forms/details', $data);
    }

    public function viewAppForm2($token)
    {
        $aial = $this->form2->where('aial_token', $token)->first();
        if (!$aial) {
            return redirect()->back()->with('error', 'No valid Data');
        }
        $data['aial'] = $this->form2->where('aial_token', $token)->first();
        $data['sign'] = $this->esign->where('user_token', $token)->first();
        return view('Admin/Forms/details2', $data);
    }

    public function viewAppForm3($token)
    {
        $gli = $this->form3->where('app_gli_token', $token)->first();
        if (!$gli) {
            return redirect()->back()->with('error', 'No valid Data');
        }
        $data['gli'] = $this->form3->where('app_gli_token', $token)->first();
        $data['sign'] = $this->esign->where('user_token', $token)->first();
        return view('Admin/Forms/details3', $data);
    }

    public function viewAppForm4($token)
    {
        $aonff = $this->form4->where('app_aonff_token', $token)->first();
        if (!$aonff) {
            return redirect()->back()->with('error', 'No valid Data');
        }
        $data['aonff'] = $this->form4->where('app_aonff_token', $token)->first();
        $data['sign'] = $this->esign->where('user_token', $token)->first();
        return view('Admin/Forms/details4', $data);
    }

    public function viewAppForm5($token)
    {
        $sou = $this->form5->where('app_sou_token', $token)->first();
        if (!$sou) {
            return redirect()->back()->with('error', 'No valid Data');
        }
        $data['sou'] = $this->form5->where('app_sou_token', $token)->first();
        $data['sign'] = $this->esign->where('user_token', $token)->first();
        return view('Admin/Forms/details5', $data);
    }


    public function random($length = 200)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }

    public function newAgent($app_token)
    {
        $data['applicant'] = $this->applicant->where('app_token', $app_token)->first();
        $username = $data['applicant']['username'];
        $agentCode = $this->random();

        $ref = $data['applicant']['refcode'];
        $agent = $this->agent->where('AgentCode', $ref)->first();
        $FA = $agent['agent_id'];

        $appdata = [
            'agent_id' => $data['applicant']['applicant_id'],
            'username' => $data['applicant']['username'],
            'email' => $data['applicant']['email'],
            'firstname' => $data['applicant']['firstname'],
            'lastname' => $data['applicant']['lastname'],
            'middlename' => $data['applicant']['middlename'],
            'province' => $data['applicant']['province'],
            'region' => $data['applicant']['region'],
            'city' => $data['applicant']['city'],
            'birthday' => $data['applicant']['birthday'],
            'barangay' => $data['applicant']['barangay'],
            'street' => $data['applicant']['street'],
            'number' => $data['applicant']['number'],
            'agentprofile' => $data['applicant']['profile'],
            'zipcode' => $data['applicant']['zipcode'],
            'agent_token' => $data['applicant']['app_token'],
            'AgentCode' => $agentCode,
            'FA' => $FA,
        ];
        // return redirect()->back();
        // var_dump($appdata);

        $this->agent->save($appdata);

        $this->applicant->set('status', 'confirmed')->where('app_token', $app_token)->update();
        $this->user->set('role', 'agent')->where('token', $app_token)->update();

        $verificationLink = site_url("login");
        $emailSubject = 'Promotion';
        $emailMessage = "Congratulations on your promotion! We're thrilled to see your hard work and dedication pay off. 
        Please click the link below to login and access your new responsibilities: $verificationLink";
        $this->homecon->sendVerificationEmail($data['applicant']['email'], $emailSubject, $emailMessage);

        $to = $data['applicant']['number'];
        $message = "Congratulations on your promotion! We're thrilled to see your hard work and dedication pay off. 
        Please click the link below to login and access your new responsibilities: $verificationLink";
        $response = $this->sms->sendSMS($to, $message);

        return redirect()->to('promotion')->with('success', "$username was Promoted To Agent");
    }

    public function svad()
    {
        $session = session();
        $userId = $session->get('id');

        // Initialize $data array
        $data = [];

        // Get the old image file name from the database
        $oldAdmin = $this->admin->select('adminProfile')->where('admin_id', $userId)->first();

        // Check if a file is uploaded
        if ($imageFile = $this->request->getFile('profile')) {
            // Check if the file is valid
            if ($imageFile->isValid()) {
                // Generate a unique name for the uploaded image
                $imageName = $imageFile->getRandomName();

                // Set the path to the upload directory
                $uploadPath = FCPATH . 'uploads/';

                // Move the uploaded image to the upload directory
                if ($imageFile->move($uploadPath, $imageName)) {
                    // Image upload successful, store the image filename in the database
                    $img['adminProfile'] = $imageName;

                    // Delete the old image file if it exists
                    if (!empty($oldAdmin['adminProfile'])) {
                        $oldFilePath = $uploadPath . $oldAdmin['adminProfile'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                } else {
                    $error = $imageFile->getError();
                }
            }
        }

        // Add other form data to the data array
        $data += [
            'lastname' => $this->request->getVar('lastname'),
            'firstname' => $this->request->getVar('firstname'),
            'middlename' => $this->request->getVar('middlename'),
            'username' => $this->request->getVar('username'),
            'number' => $this->request->getVar('number'),
            'email' => $this->request->getVar('email'),
            'birthday' => $this->request->getVar('birthday'),
            'region' => $this->request->getVar('region_text'),
            'province' => $this->request->getVar('province_text'),
            'city' => $this->request->getVar('city_text'),
            'barangay' => $this->request->getVar('barangay_text'),
            'street' => $this->request->getVar('street'),
            'zipcode' => $this->request->getVar('zipcode'),
        ];

        // Check if $data array is not empty before updating the database
        if (!empty($data)) {
            // Update the admin data
            $this->admin->set($data)->where('admin_id', $userId)->update();
        }
        return redirect()->to('/AdSetting');
    }

    public function confirm($token)
    {
        $data['applicant'] = $this->confirm->where('token', $token)->first();
        // $form['applicant'] = $this->applicant->where('app_token', $token)->first();
        $verificationToken = bin2hex(random_bytes(25));

        if ($data['applicant']['role'] != 'client') {
            $appdata = [
                'applicant_id' => $data['applicant']['applicant_id'],
                'username' => $data['applicant']['username'],
                'number' => $data['applicant']['number'],
                'firstname' => $data['applicant']['firstname'],
                'lastname' => $data['applicant']['lastname'],
                'middlename' => $data['applicant']['middlename'],
                'email' => $data['applicant']['email'],
                'refcode' => $data['applicant']['refcode'],
                'app_token' => $data['applicant']['token'],
            ];

            $this->applicant->save($appdata);

            $this->confirm->delete($data['applicant']['id']);
            $con = ['confirm' => 'true', 'verification_token' => $verificationToken];
            $this->user->set($con)->where('token', $token)->update();
        } else {
            $lastApplicationNo = $this->client->selectMax('applicationNo')->get()->getRowArray()['applicationNo'];
            $newApplicationNo = $lastApplicationNo + 1;
            $clientData = [
                'client_id' => $data['applicant']['applicant_id'],
                'username' => $data['applicant']['username'],
                'number' => $data['applicant']['number'],
                'firstName' => $data['applicant']['firstname'],
                'lastName' => $data['applicant']['lastname'],
                'middleName' => $data['applicant']['middlename'],
                'email' => $data['applicant']['email'],
                'refcode' => $data['applicant']['refcode'],
                'client_token' => $data['applicant']['token'],
                // 'plan' => $data['applicant']['plan'],
                'applicationNo' => $newApplicationNo,
            ];
            $this->client->save($clientData);
            $this->confirm->delete($data['applicant']['id']);
            $con = ['confirm' => 'true', 'verification_token' => $verificationToken];
            $this->user->set($con)->where('token', $token)->update();
        }

        $to = $data['applicant']['number'];
        $message = 'Your account has been confirmed, Thank you for choosing ALLIANZ PNB MIMAROPA';
        $response = $this->sms->sendSMS($to, $message);

        $verificationLink = site_url("verify-email/{$verificationToken}");
        $emailSubject = 'Registration Confirmation';
        $emailMessage = "Your account has been confirmed. Please click the link verify your account: {$verificationLink}";
        $this->homecon->sendVerificationEmail($data['applicant']['email'], $emailSubject, $emailMessage);

        return redirect()->to('/confirmation')->with('success', 'Acount Confirmed!');
    }

    public function deny($token)
    {
        $data['applicant'] = $this->confirm->where('token', $token)->first();
        $id = $data['applicant']['id'];

        $this->confirm->delete($id);
        // $verificationLink = site_url("verify-email/{$verificationToken}");
        $emailSubject = 'Register Deny';
        $emailMessage = "Your Account was Deny Where sorry to inform you";
        $this->homecon->sendVerificationEmail($data['applicant']['email'], $emailSubject, $emailMessage);
        // var_dump($id);
        return redirect()->to('/confirmation')->with('warning', 'Acount Denied');
    }

    public function confirmation()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        $con = $this->confirm->paginate(10, 'group1');
        $data['applicant'] = $con;
        $data['pager'] = $this->confirm->pager;
        $search = $this->request->getPost('searchusers');

        if (!empty($search)) {
            $data['applicant'] = $this->confirm->like('username', $search)->paginate(10, 'group1');
        }
        // var_dump($data);
        return view('Admin/confirmation', $data);
    }

    public function sched()
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        $data['schedules'] = $this->scheduleModel->findAll();
        return view('Admin/Schedule', $data);
    }

    public function schedsave()
    {
        $input = $this->request->getPost();
        $validationRules = [
            'title' => 'required',
            'description' => 'required',
            'start_datetime' => 'required|valid_date',
            'end_datetime' => 'required|valid_date'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $input['title'],
            'description' => $input['description'],
            'start_datetime' => $input['start_datetime'],
            'end_datetime' => $input['end_datetime'],
        ];

        $this->scheduleModel->insert($data);
        return redirect()->back()->with('success', 'Schedule submitted successfully.');
    }

    public function schededit($id)
    {
        $data = array_merge($this->getData(), $this->getDataAd(), $this->notifcont->notification());
        $data['schedules'] = $this->scheduleModel->findAll();
        $schedule = $this->scheduleModel->find($id);
        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.');
        }

        $data['schedule'] = $schedule;

        return view('Admin/Schedule', $data);
    }

    public function schedupdate($id)
    {
        $input = $this->request->getPost();
        $validationRules = [
            'title' => 'required',
            'description' => 'required',
            'start_datetime' => 'required|valid_date',
            'end_datetime' => 'required|valid_date'
        ];

        if (!$this->validate($validationRules)) {
            return redirect('sched')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $input['title'],
            'description' => $input['description'],
            'start_datetime' => $input['start_datetime'],
            'end_datetime' => $input['end_datetime'],
        ];

        $this->scheduleModel->update($id, $data);
        return redirect('sched')->with('success', 'Schedule updated successfully.');
    }

    public function scheddelete($id)
    {
        $schedule = $this->scheduleModel->find($id);

        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.');
        }

        $this->scheduleModel->delete($id);
        return redirect('sched')->with('success', 'Schedule deleted successfully.');
    }

    public function ManageClients()
    {
        $data = array_merge($this->notifcont->notification(), $this->usermerge());
        $data['clients'] = $this->client->paginate(10, 'group1'); // Change 10 to the number of items per page
        $data['pager'] = $this->client->pager;
        return view('Admin/ManageClient', $data);
    }

    private function getclients()
    {
        $data['clients'] = $this->client->findAll();
        return $data;
    }
}
