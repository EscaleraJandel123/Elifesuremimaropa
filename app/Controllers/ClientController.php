<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClientModel;
use App\Models\AgentModel;
use App\Models\PlanModel;
use App\Models\ConfirmModel;
use App\Models\Scheduler;
use App\Models\ClientPlanModel;
use App\Models\CommiModel;
use App\Controllers\NotifController;
use App\Libraries\SmsLibrary;

class ClientController extends BaseController
{
    private $commission;
    private $client_plan;
    private $sched;
    private $confirm;
    private $plan;
    private $user;
    private $client;
    protected $agent;
    private $notifcont;
    // protected $cache;
    private $smsLibrary;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->client = new ClientModel();
        $this->agent = new AgentModel();
        $this->plan = new PlanModel();
        $this->confirm = new ConfirmModel();
        $this->sched = new Scheduler();
        $this->client_plan = new ClientPlanModel();
        $this->commission = new CommiModel();
        // $this->cache = \Config\Services::cache();
        $this->notifcont = new NotifController();
        $this->smsLibrary = new SmsLibrary();
    }

    public function ClientService()
    {
        $data['plan'] = $this->plan->paginate(6, 'plan');
        $data['pager'] = $this->plan->pager;
        return view('Client/ClientService', $data);
    }

    public function ServiceDescription($token)
    {
        $data['plan'] = $this->plan->findAll();
        $data['plandesc'] = $this->plan->where('token', $token)->first();
        return view('Client/ServiceDescription', $data);
    }

    public function ClientAgent()
    {
        $data = $this->ag();
        $data['plan'] = $this->plan->findAll();
        return view('Client/ClientAgent', $data);
    }

    public function register()
    {
        helper(['form']);
        return view('Client/registers');
    }

    public function clientreg()
    {
        $userToken = bin2hex(random_bytes(50));
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email,id]',
            'password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/]',
            'confirmpassword' => 'matches[password]',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
        ];
        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 'client',
                'status' => 'unverified',
                'accountStatus' => 'active',
                'token' => $userToken,
                'confirm' => 'false'
            ];
            // var_dump($data);
            $this->user->save($data);
            $userId = $this->user->insertID();
            $clientData = [
                'applicant_id' => $userId,
                'username' => $this->request->getVar('username'),
                'number' => $this->request->getVar('phone'),
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'middlename' => $this->request->getVar('middlename'),
                'email' => $this->request->getVar('email'),
                'refcode' => NULL,
                'token' => $userToken,
                'role' => 'client',
            ];
            $link = 'confirmation';
            $message = 'A new Client, ' . $this->request->getVar('username') . ', has just signed up.';
            $r = 'admin';
            $this->notifcont->newnotif($userId, $link, $message, $r);


            $to = $this->request->getVar('phone');
            $from = '447491163443';
            $text = 'Thank you for registering! Your account is currently registered. Please wait for confirmation from the admin before you can log in.';
            $response = $this->smsLibrary->sendSms($to, $from, $text);

            $this->confirm->save($clientData);

            $emailSubject = "Account Registration Confirmation";
            $emailMessage = "Thank you for registering! Your account is currently registered. Please wait for confirmation from the admin before you can log in. An email has been sent to your registered email address.";
            $this->sendVerificationEmail($this->request->getVar('email'), $emailSubject, $emailMessage);
            return redirect()->to('/login')->with('success', 'Account Registered please be patient. An email has been sent to your registered email address.');
        } else {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/ClientRegister')->withInput();
        }
    }

    public function ag()
    {
        $data['agents'] = $this->agent->paginate(8, 'agent');
        $data['pager'] = $this->agent->pager;
        return $data;
    }

    // public function registers()
    // {
    //     return view('Client/registers');
    // }

    private function sendVerificationEmail($to, $subject, $message)
    {
        // Load Email Library
        $email = \Config\Services::email();

        // SMTP Configuration (replace with your actual SMTP settings)
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPUser' => 'alejandrogino950@gmail.com', // Your Gmail address
            'SMTPPass' => 'kiewkcfnftnigkvh',
            'SMTPPort' => 587,
            'SMTPCrypto' => 'tls',
            'mailType' => 'html',
            'charset' => 'utf-8'
        ];
        $email->initialize($config);

        // Set Email Parameters
        $email->setTo($to);
        $email->setFrom('alejandrogino950@gmail.com', 'ALLIANZ PNB CALAPAN'); // Set the "From" address and name
        $email->setSubject($subject);
        $email->setMessage($message);

        // Try sending the email
        if ($email->send()) {
            echo 'Email sent successfully.';
        } else {
            echo 'Error: ' . $email->printDebugger(['headers']);
        }
    }

    public function ClientPage()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        $data['myplan'] = $this->client_plan->where('client_id', $data['client']['client_id'])->limit(3)->findAll();
        // $data['myplan'] = $this->client_plan->where('client_id', $data['client']['client_id'])->where('status', 'paid')->limit(3)->findAll();
        $data['history'] = $this->commission->where('client_id', $data['client']['client_id'])->limit(3)->findAll();
        $data['schedule'] = $this->sched->where('client_id', $data['client']['client_id'])->limit(3)->findAll();
        $data['activeinsurances'] = [];

        foreach ($data['myplan'] as $plan) {
            $insurance = $this->plan->where('token', $plan['plan'])->first();

            // Calculate due date based on mode_payment
            $dueDate = null;
            switch ($plan['mode_payment']) {
                case 'Annual':
                    $dueDate = date('Y-m-d', strtotime('+1 year', strtotime($plan['created_at'])));
                    break;
                case 'Semi-Annual':
                    $dueDate = date('Y-m-d', strtotime('+6 months', strtotime($plan['created_at'])));
                    break;
                case 'Quarterly':
                    $dueDate = date('Y-m-d', strtotime('+3 months', strtotime($plan['created_at'])));
                    break;
                case 'Monthly':
                    $dueDate = date('Y-m-d', strtotime('+1 month', strtotime($plan['created_at'])));
                    break;
                default:
                    // Default due date if mode_payment is not recognized
                    $dueDate = 'One Time Payment';
                    break;
            }
            // Add insurance data including due date to activeinsurances array
            $data['activeinsurances'][] = [
                'plan_name' => $insurance['plan_name'],
                'image' => $insurance['image'],
                'duedate' => $dueDate,
                'status' => $plan['status'], // Add status here
            ];
        }
        return view('Client/dashboard/dashboard', $data);
    }


    public function paymenthistory()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        $data['myplan'] = $this->commission->where('client_id', $data['client']['client_id'])->findAll();
        return view('Client/dashboard/history', $data);
    }


    public function viewplans()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        $data['plan'] = $this->plan->findAll();
        $data['agent'] = $this->agent->findAll();
        return view('Client/dashboard/plans', $data);
    }


    public function clientprofile()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        return view('Client/dashboard/myprofile', $data);
    }


    public function getData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['user'] = $this->user->find($userId);
        return $data;
    }
    public function ClientData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['client'] = $this->client->where('client_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }
    public function svclient()
    {
        $session = session();
        $userId = $session->get('id');

        $data = [];
        $img = []; // Initialize $img as an array to store image information

        // Get the old image file name from the database
        $oldpic = $this->client->select('profile')->where('client_id', $userId)->first();

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
                    // Image upload successful, store the image filename in the $img array
                    $img['profile'] = $imageName;

                    // Delete the old image file if it exists
                    if (!empty($oldpic['profile'])) {
                        $oldFilePath = $uploadPath . $oldpic['profile'];
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
        $data = [
            'lastName' => $this->request->getVar('lastname'),
            'firstName' => $this->request->getVar('firstname'),
            'middleName' => $this->request->getVar('middlename'),
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

        // If an image was uploaded, include it in the data array
        if (!empty($img['profile'])) {
            $data['profile'] = $img['profile'];
        }

        // Check if $data array is not empty before updating the database
        if (!empty($data)) {
            // Update the client data
            $this->client->set($data)->where('client_id', $userId)->update();
        }
        return redirect()->to('/clientprofile');
    }


    public function agents()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        $data['agent'] = $this->agent->paginate(8, 'group1');
        $data['pager'] = $this->agent->pager;
        return view('Client/dashboard/agents', $data);
    }


    public function seeprofile($token)
    {
        $decodedToken = base64_decode($token);
        $data = array_merge($this->getData(), $this->ClientData());
        $data['agent'] = $this->agent->where('agent_token', $decodedToken)->first();
        return view('Client/dashboard/agentsProfile', $data);
    }

    public function createSchedule()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        $data['plan'] = $this->request->getVar('planToken');
        $data['agent'] = $this->request->getVar('agentToken');
        return view('Client/dashboard/createSchedule', $data);
        // var_dump($data);
    }

    public function sched()
    {
        $session = session();
        $userId = $session->get('id');
        $client['info'] = $this->client->where('client_id', $userId)->first();
        $agent = $this->agent->select('email')->where('agent_id', $this->request->getVar('agent'))->first();
        $agentEmail = $agent ? $agent['email'] : null;

        $agentNumberData = $this->agent->select('number')->where('agent_id', $this->request->getVar('agent'))->first();
        $agentNumber = $agentNumberData ? $agentNumberData['number'] : null;

        $dat = [
            'client_id' => $client['info']['client_id'],
            'applicationNo' => $client['info']['applicationNo'],
            'username' => $client['info']['username'],
            'clientName' => $client['info']['lastName'] . ', ' . $client['info']['firstName'] . ' ' . $client['info']['middleName'] . '.',
            'number' => $client['info']['number'],
            'email' => $client['info']['email'],
            'complteaddress' => $client['info']['region'] . ', ' . $client['info']['province'] . ', ' . $client['info']['city'] . ', ' . $client['info']['barangay'] . ', ' . $client['info']['street'],
            'selected_date' => $this->request->getVar('selected_date'),
            'agent' => $this->request->getVar('agent'),
            'plan' => $this->request->getVar('plan'),
            'schedule_time' => $this->request->getVar('schedule_time'),
            'meeting_type' => $this->request->getVar('meeting_type'),
        ];
        // var_dump($agentEmail);
        $this->sched->save($dat);
        $emailSubject = "New Appointment Scheduled";
        $emailMessage = "You have a new appointment scheduled, please see at yout trsansations tab";
        $this->sendVerificationEmail($agentEmail, $emailSubject, $emailMessage);

        $emailSub = "Schedule Confirmation";
        $emailMes = "Thank you for scheduling an appointment with us";
        $this->sendVerificationEmail($client['info']['email'], $emailSub, $emailMes);

        $to = $agentNumber;
        $from = '447491163443';
        $text = 'You have a new appointment scheduled from our beloved client';
        $response = $this->smsLibrary->sendSms($to, $from, $text);
        return redirect()->to('/viewplans')->with('success', 'Schedule created!');
    }

    public function mysched()
    {
        $data = array_merge($this->getData(), $this->ClientData());
        $id = $data['client']['client_id'];
        $data['schedule'] = $this->sched->where('client_id', $id)->orderBy('selected_date', 'ASC')->findAll();
        $data['agent'] = $this->agent->findAll();
        $data['plan'] = $this->plan->findAll();
        return view('Client/dashboard/mysched', $data);
    }


    public function delsched($id)
    {
        $delId = base64_decode($id);
        $this->sched->delete($delId);
        return redirect()->to('mysched')->with('success', 'Schedule deleted!');
    }

    public function upsched()
    {
        $id = $this->request->getVar('schedID');
        $data = [
            'selected_date' => $this->request->getVar('selected_date'),
            'schedule_time' => $this->request->getVar('schedule_time'),
            'meeting_type' => $this->request->getVar('meeting_type'),
        ];
        $this->sched->set($data)->where('id', $id)->update();
        return redirect()->to('mysched')->with('success', 'Schedule Updated!');
    }
    public function checkDuePoliciesAndSendEmails()
    {
        $today = date('Y-m-d');

        // Query for policies with due date equal to today
        $duePolicies = $this->client_plan->where('duedate', $today)->findAll();

        if (!empty($duePolicies)) {
            foreach ($duePolicies as $policy) {
                $clientEmail = $this->client->find($policy['client_id'])['email']; // Get client email
                // $policyDetails = $policy['plan']; 
                // $subject = 'Policy Due Reminder';
                // $message = "<p>Dear Client,</p>
                //             <p>This is a reminder that your policy <strong>{$policyDetails}</strong> is due today ({$policy['duedate']}).</p>
                //             <p>Please make the necessary payments to avoid any inconvenience.</p>
                //             <p>Thank you!</p>";

                // // Send the email
                // $this->sendVerificationEmail($clientEmail, $subject, $message);
            }
            return 'Emails sent successfully for due policies. ' . $clientEmail;
        } else {
            return 'No policies are due today.';
        }
    }
}
