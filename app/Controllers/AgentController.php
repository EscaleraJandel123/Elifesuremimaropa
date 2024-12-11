<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\AgentModel;
use \App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Controllers\AppController;
use App\Models\ScheduleModel;
use App\Models\Scheduler;
use App\Models\ClientModel;
use App\Models\PlanModel;
use App\Models\ClientPlanModel;
use App\Models\CommiModel;
use App\Controllers\FilesController;
use DateTime;

class AgentController extends BaseController
{
    private $commission;
    private $client_plan;
    private $plan;
    private $client;
    private $sched;
    private $appcon;
    private $user;
    private $applicant;
    private $agent;
    protected $scheduleModel;
    private $filescont;
    // protected $cache;
    public function __construct()
    {
        $this->appcon = new AppController();
        $this->agent = new AgentModel();
        $this->user = new UserModel();
        $this->applicant = new ApplicantModel();
        $this->scheduleModel = new ScheduleModel();
        $this->sched = new Scheduler();
        $this->client = new ClientModel();
        $this->plan = new PlanModel();
        $this->client_plan = new ClientPlanModel();
        $this->commission = new CommiModel();
        $this->filescont = new FilesController();
        // $this->cache = \Config\Services::cache();
    }
    public function AgDash()
    {
        $data = array_merge(
            $this->getData(), // Assuming this method fetches general user data
            $this->getDataAge() // Assuming this method fetches agent-specific data
        );
        $agentid = $data['agent']['agent_id'];
        $agentcode = $data['agent']['AgentCode'];

        $data['FA'] = $this->agent->where('FA', $agentid)->findAll();
        $data['applicants'] = $this->applicant->where('refcode', $agentcode)->countAllResults();
        $data['ranking'] = $this->agent->where('FA', $agentid)->countAllResults();
        $data['clients'] = $this->client_plan->where('agent', $agentid)->countAllResults();
        $totalCommis = $this->client_plan->selectSum('commission')->where('agent', $agentid)->findAll();
        $data['totalcommi'] = !empty($totalCommis) ? $totalCommis[0]['commission'] : 0;
        return view('Agent/AgDash', $data);
    }

    public function AgProfile()
    {
        $agentModel = new AgentModel();
        $data = array_merge($this->getData(), $this->getDataAge(), $this->filescont->getFiles());
        $agentid = $data['agent']['agent_id'];
        $data['FA'] = $agentModel->where('FA', $agentid)->findAll();
        return view('Agent/AgProfile', $data);
    }

    public function AgSetting()
    {
        $data = array_merge($this->getData(), $this->getDataAge());
        return view('Agent/AgSetting', $data);
    }

    public function AgForms()
    {
        $data = array_merge($this->getData(), $this->getDataAge());
        return view('Agent/forms', $data);
    }

    public function AgHelp()
    {
        return view('Agent/AgHelp');
    }
    public function getData()
    {

        $session = session();

        // Check if the user is logged in
        if (!$session->get('id')) {
            // Redirect or handle the case where the user is not logged in
            return redirect()->to('login');
        }
        // Get the user ID from the session
        $userId = $session->get('id');
        // Load the User model
        $userModel = new UserModel();
        // Find the user by ID
        $data['user'] = $userModel->find($userId);
        return $data;
    }

    public function subagent()
    {
        $session = session();
        $userId = $session->get('id');
        // Fetch the agent data
        $agents = $this->agent->where('FA', $userId)->paginate(10, 'group1');
        $data = array_merge($this->getData(), $this->getDataAge());
        $data['pager'] = $this->agent->pager;
        $data['subagent'] = $agents;
        // Fetch the user data
        $data['user'] = $this->user->find($userId);
        return view('Agent/subagents', $data);
    }

    public function subagentSearch()
    {
        $session = session();
        $userId = $session->get('id');

        $agentModel = new AgentModel();
        $data = $this->getDataAge();

        $filterUser = $this->request->getPost('filterAgent');

        // Use the paginate method to enable pagination
        $agents = $agentModel->like('username', $filterUser)
            ->where('FA', $userId)
            ->paginate(10); // Adjust the limit as needed

        // Correctly assign the pager
        $data['pager'] = $agentModel->pager;
        $data['agent'] = $agents;

        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);

        return view('Agent/subagents', $data);
    }

    public function getDataAge()
    {
        $session = session();
        $userId = $session->get('id');
        $agentModel = new AgentModel();
        $data['agent'] = $agentModel->where('agent_id', $userId)
            // ->orderBy('id', 'desc')
            ->first();
        return $data;
    }
    public function svag()
    {
        $session = session();
        $userId = $session->get('id');

        // Initialize $data array
        $data = [];

        // Get the old image file name from the database
        $oldAgent = $this->agent->select('agentprofile')->where('agent_id', $userId)->first();
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
                    $data['agentprofile'] = $imageName;

                    // Delete the old image file if it exists
                    if (!empty($oldAgent['agentprofile'])) {
                        $oldFilePath = $uploadPath . $oldAgent['agentprofile'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                } else {
                    $error = $imageFile->getError();
                    // Handle the error as needed
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
            // Update the applicant data
            $this->agent->set($data)->where('agent_id', $userId)->update();
        }

        return redirect()->to('/AgSetting');
    }
    public function AgForm2()
    {
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge(),$this->appcon->getform2Data());
        return view('Agent/AgForm2', $data);
    }
    public function AgForm3()
    {
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->appcon->getform3Data(), $this->getDataAge());
        return view('Agent/AgForm3', $data);
    }
    public function AgForm4()
    {
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge(),$this->appcon->getform4Data());
        return view('Agent/AgForm4', $data);
    }
    public function AgForm5()
    {
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge(),$this->appcon->getform5Data());
        return view('Agent/AgForm5', $data);
    }
    public function Agsignature()
    {
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge(),$this->appcon->esign());
        return view('Agent/signature', $data);
    }


    public function AgForm1()
    {
        $data['agents'] = $this->agent->findAll();
        // Merge arrays while retaining the 'agents' key
        $data = array_merge(
            $this->getData(),
            $this->appcon->getDataApp(),
            $this->getDataAge(),
            $this->appcon->getform1Data(),
            $this->appcon->esign(),$data
        );
        return view('Agent/AgForm1', $data);
    }

    public function sched()
    {
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge());
        $scheduleModel = new ScheduleModel();
        // Get all schedules from the database
        $data['schedules'] = $scheduleModel->findAll();
        // Pass data to the view
        return view('Agent/Schedule', $data);
    }

    public function cliSched()
    {
        $session = session();
        $agentId = $session->get('id');
        $data = array_merge(
            $this->getData(), // Assuming this method fetches general user data
            $this->appcon->getDataApp(), // Assuming this method fetches application-related data
            $this->getDataAge() // Assuming this method fetches agent-specific data
        );

        $data['schedule'] = $this->sched->where('agent', $agentId)->where('status', 'pending')->orderBy('created_at', 'desc')->findAll();
        $data['plans'] = $this->plan->findAll();
        $data['client'] = $this->client->findAll();
        $data['status'] = 'Awaiting';
        $data['class'] = 'Awaiting';
        return view('Agent/cliSched', $data);
    }


    public function inprog()
    {
        $session = session();
        $agent = $session->get('id');
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge());
        $data['schedule'] = $this->sched->where('agent', $agent)->where('status', 'inprogress')->findAll();
        $data['plans'] = $this->plan->findAll();
        $data['client'] = $this->client->findAll();
        $data['status'] = 'In Progress';
        $data['class'] = 'In Progress';
        return view('Agent/cliSched', $data);
        // var_dump($agent);
    }

    public function comp()
    {
        $session = session();
        $agent = $session->get('id');
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge());
        $data['schedule'] = $this->sched->where('agent', $agent)->where('status', 'completed')->findAll();
        $data['plans'] = $this->plan->findAll();
        $data['client'] = $this->client->findAll();
        $data['status'] = 'Completed';
        $data['class'] = 'Completed';
        return view('Agent/cliSched', $data);
        // var_dump($agent);
    }

    public function compost()
    {

        $data = [];
        $uploadPath = FCPATH . 'uploads/clients/receipts/';

        // Ensure the upload directory exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if ($imageFile = $this->request->getFile('receipt')) {
            if ($imageFile->isValid()) {
                $imageName = $imageFile->getRandomName();
                if ($imageFile->move($uploadPath, $imageName)) {
                    $data['receipt'] = $imageName;
                } else {
                    $error = $imageFile->getError();
                    // Handle the error accordingly
                }
            }
        }

        // Calculate commission based on the mode of payment
        $cal['plan'] = $this->plan->where('token', $this->request->getVar('plan'))->first();
        if ($cal['plan']) {
            $price = $cal['plan']['price'];
            $percentage = $cal['plan']['com_percentage'] / 100;
            switch ($this->request->getVar('typeofpayment')) {
                case 'Annual':
                    $commissionAmount = $price * $percentage;
                    $amountPaid = $price; // Amount Paid = Annual Price - Commission
                    break;
                case 'Semi-Annual':
                    $commissionAmount = ($price / 2) * $percentage;
                    $amountPaid = ($price / 2); // Amount Paid = Half of Annual Price
                    break;
                case 'Quarterly':
                    $commissionAmount = ($price / 4) * $percentage;
                    $amountPaid = ($price / 4); // Amount Paid = Quarter of Annual Price
                    break;
                case 'Monthly':
                    $commissionAmount = ($price / 12) * $percentage;
                    $amountPaid = ($price / 12); // Amount Paid = Twelfth of Annual Price
                    break;
                default:
                    $commissionAmount = 0;
                    $amountPaid = 0;
            }
        }

        $token = bin2hex(random_bytes(25));
        $tokens = bin2hex(random_bytes(50));
        $data += [
            'plan' => $this->request->getVar('plan'),
            'agent' => $this->request->getVar('agent'),
            'client_id' => $this->request->getVar('client_id'),
            'mode_payment' => $this->request->getVar('typeofpayment'),
            'term' => $this->request->getVar('term'),
            'applicationNo' => $this->request->getVar('applicationNo'),
            'status' => 'paid',
            'token' => $token,
            'commission' => $commissionAmount,
        ];
        $this->client_plan->save($data);

        $this->sched->set(['status' => 'completed'])->where('id', $this->request->getVar('schedId'))->update();

        $this->commission->save([
            'token' => $tokens,
            'commi' => $commissionAmount,
            'agent_id' => $this->request->getVar('agent'),
            'client_id' => $this->request->getVar('client_id'),
            'amount_paid' => $amountPaid,
            'receipts' => $imageName,
        ]);
        return redirect()->to('cliSched')->with('success', 'Transaction Completed');
    }


    // public function compost()
    // {
    //     $data = [];
    //     if ($imageFile = $this->request->getFile('receipt')) {
    //         if ($imageFile->isValid()) {
    //             $imageName = $imageFile->getRandomName();
    //             $uploadPath = FCPATH . 'uploads/clients/receipts/';
    //             if ($imageFile->move($uploadPath, $imageName)) {
    //                 $data['receipt'] = $imageName;
    //             } else {
    //                 $error = $imageFile->getError();
    //             }
    //         }
    //     }
    //     $token = bin2hex(random_bytes(25));
    //     $tokens = bin2hex(random_bytes(50));
    //     $schedId = $this->request->getVar('schedId');
    //     $plan = $this->request->getVar('plan');
    //     $email = $this->request->getVar('email');
    //     $plantoken = $this->request->getVar('plan');
    //     $modepayment = $this->request->getVar('typeofpayment');
    //     $cal['plan'] = $this->plan->where('token', $plantoken)->first();

    //     if ($cal['plan']) {
    //         switch ($modepayment) {
    //             case 'Annual':
    //                 $commissionAmount = $cal['plan']['price'] / 1 * ($cal['plan']['com_percentage'] / 100);
    //                 break;
    //             case 'Semi-Annual':
    //                 $commissionAmount = $cal['plan']['price'] / 2 * ($cal['plan']['com_percentage'] / 100);
    //                 break;
    //             case 'Quarterly':
    //                 $commissionAmount = $cal['plan']['price'] / 4 * ($cal['plan']['com_percentage'] / 100);
    //                 break;
    //             case 'Monthly':
    //                 $commissionAmount = $cal['plan']['price'] / 12 * ($cal['plan']['com_percentage'] / 100);
    //                 break;
    //             default:
    //                 $commissionAmount = 0;
    //         }
    //     }

    //     $data += [
    //         'plan' => $this->request->getVar('plan'),
    //         'agent' => $this->request->getVar('agent'),
    //         'client_id' => $this->request->getVar('client_id'),
    //         'mode_payment' => $this->request->getVar('typeofpayment'),
    //         'term' => $this->request->getVar('term'),
    //         'applicationNo' => $this->request->getVar('applicationNo'),
    //         'status' => 'paid',
    //         'token' => $token,
    //         'commission' => $commissionAmount,
    //     ];
    //     $this->client_plan->save($data);
    //     $s = ['status' => 'completed'];
    //     $this->sched->set($s)->where('id', $schedId)->update();

    //     $commi = [
    //         'token' => $tokens,
    //         'commi' => $commissionAmount,
    //         'agent_id' => $this->request->getVar('agent'),
    //         'client_id' => $this->request->getVar('client_id'),

    //     ];
    //     $this->commission->save($commi);
    //     return redirect()->to('cliSched')->with('success', 'Transaction Completed');
    // }

    // public function upstatusplan($token)
    // {
    //     $stats = [];

    //     if ($imageFile = $this->request->getFile('receipt')) {
    //         if ($imageFile->isValid()) {
    //             $imageName = $imageFile->getRandomName();
    //             $uploadPath = FCPATH . 'uploads/clients/receipts/';

    //             if ($imageFile->move($uploadPath, $imageName)) {
    //                 $data['receipt'] = $imageName;

    //             } else {
    //                 $error = $imageFile->getError();
    //                 // Handle the error as needed
    //                 return redirect()->back()->with('error', 'Image upload error: ' . $error);
    //             }
    //         } else {
    //             return redirect()->back()->with('error', 'Invalid file upload');
    //         }
    //     }

    //     $tokens = bin2hex(random_bytes(50));
    //     $data['commi'] = $this->client_plan->where('token', $token)->first();
    //     $data['percentage'] = $this->plan->where('token', $data['commi']['plan'])->first();

    //     $annualpay = $data['percentage']['price'];
    //     $per = $data['percentage']['com_percentage'];
    //     $paymentmode = $data['commi']['mode_payment'];
    //     $oldcommi = $data['commi']['commission'];
    //     $agentid = $data['commi']['agent'];
    //     $clientid = $data['commi']['client_id'];

    //     // Calculate new commission based on payment mode

    //     $newcommi = $oldcommi;
    //     $amountPaid = 0; // Initialize amount_paid variable

    //     switch ($paymentmode) {
    //         case 'Annual':
    //             $newcommi += $annualpay * ($per / 100);
    //             $amountPaid = $annualpay;
    //             break;
    //         case 'Semi-Annual':
    //             $newcommi += $annualpay * ($per / 100) / 2;
    //             $amountPaid = $annualpay / 2;
    //             break;
    //         case 'Quarterly':
    //             $newcommi += $annualpay * ($per / 100) / 4;
    //             $amountPaid = $annualpay / 4;
    //             break;
    //         case 'Monthly':
    //             $newcommi += $annualpay * ($per / 100) / 12;
    //             $amountPaid = $annualpay / 12;
    //             break;
    //     }

    //     if ($paymentmode == 'Annual') {
    //         $commi = $annualpay * ($per / 100);
    //     } elseif ($paymentmode == 'Semi-Annual') {
    //         $commi = $annualpay * ($per / 100) / 2;
    //     } elseif ($paymentmode == 'Quarterly') {
    //         $commi = $annualpay * ($per / 100) / 4;
    //     } elseif ($paymentmode == 'Monthly') {
    //         $commi = $annualpay * ($per / 100) / 12;
    //     }

    //     // Update the commission and status in the database
    //     $stats += [
    //         'status' => 'paid',
    //         'commission' => $newcommi,
    //     ];

    //     // Merge image data into the stats array if an image was uploaded
    //     if (isset($data['receipt'])) {
    //         $stats['receipt'] = $data['receipt'];
    //     }

    //     $this->client_plan->set($stats)->where('token', $token)->update();
    //     // pwede ko ditong lagyan ng add para ma filters yung monthly nya

    //     $commiS = [
    //         'token' => $tokens,
    //         'commi' => $commi,
    //         'agent_id' => $agentid,
    //         'client_id' => $clientid,
    //         'receipts' => $imageName,
    //         'amount_paid' => $amountPaid,
    //     ];
    //     $this->commission->save($commiS);
    //     return redirect()->back()->with('success', 'Plan updated successfully');
    // }

    public function upstatusplan($token)
{
    $stats = [];

    if ($imageFile = $this->request->getFile('receipt')) {
        if ($imageFile->isValid()) {
            $imageName = $imageFile->getRandomName();
            $uploadPath = FCPATH . 'uploads/clients/receipts/';

            if ($imageFile->move($uploadPath, $imageName)) {
                $data['receipt'] = $imageName;

            } else {
                $error = $imageFile->getError();
                return redirect()->back()->with('error', 'Image upload error: ' . $error);
            }
        } else {
            return redirect()->back()->with('error', 'Invalid file upload');
        }
    }

    $tokens = bin2hex(random_bytes(50));
    $data['commi'] = $this->client_plan->where('token', $token)->first();
    $data['percentage'] = $this->plan->where('token', $data['commi']['plan'])->first();

    $annualpay = $data['percentage']['price'];
    $per = $data['percentage']['com_percentage'];
    $paymentmode = $data['commi']['mode_payment'];
    $oldcommi = $data['commi']['commission'];
    $agentid = $data['commi']['agent'];
    $clientid = $data['commi']['client_id'];

    $newcommi = $oldcommi;
    $amountPaid = 0;
    $currentDate = new DateTime();

    switch ($paymentmode) {
        case 'Annual':
            $newcommi += $annualpay * ($per / 100);
            $amountPaid = $annualpay;
            $currentDate->modify('+1 year');
            break;
        case 'Semi-Annual':
            $newcommi += $annualpay * ($per / 100) / 2;
            $amountPaid = $annualpay / 2;
            $currentDate->modify('+6 months');
            break;
        case 'Quarterly':
            $newcommi += $annualpay * ($per / 100) / 4;
            $amountPaid = $annualpay / 4;
            $currentDate->modify('+3 months');
            break;
        case 'Monthly':
            $newcommi += $annualpay * ($per / 100) / 12;
            $amountPaid = $annualpay / 12;
            $currentDate->modify('+1 month');
            break;
    }

    $duedate = $currentDate->format('Y-m-d');

    $stats += [
        'status' => 'paid',
        'commission' => $newcommi,
    ];

    if (isset($data['receipt'])) {
        $stats['receipt'] = $data['receipt'];
    }

    $this->client_plan->set($stats)->where('token', $token)->update();

    $commiS = [
        'token' => $tokens,
        'commi' => $newcommi,
        'agent_id' => $agentid,
        'client_id' => $clientid,
        'receipts' => $imageName ?? null,
        'amount_paid' => $amountPaid,
        'duedate' => $duedate,
    ];

    $this->commission->save($commiS);

    return redirect()->back()->with('success', 'Plan updated successfully');
}


    public function con($dec)
    {
        $id = base64_decode($dec);
        $status = $this->sched->where('id', $id)->get()->getRow()->status;

        $clientEmail = $this->sched->where('id', $id)->get()->getRow()->email;
        if ($status === 'pending') {
            $con = ['status' => 'inprogress'];
            $this->sched->set($con)->where('id', $id)->update();
        }
        $emailSubject = "Appointment In Progress";
        $emailMessage = "Your Appointment has been confirm";
        $this->sendVerificationEmail($clientEmail, $emailSubject, $emailMessage);
        // var_dump($clientEmail);
        return redirect()->to('cliSched')->with('success', 'Transaction In Progress');
    }

    public function client()
    {
        $session = session();
        $agId = $session->get('id');

        $data['client'] = $this->client_plan->where('agent', $agId)->findAll();
        // var_dump($data);
        $clientIds = array_column($data['client'], 'client_id');
        $clientId = array_unique($clientIds);

        $filter = $this->request->getVar('filterclient');
        if (!empty($clientId)) { // Check if $clientId array is not empty
            if (!empty($filter)) {
                $clients = $this->client->like('username', $filter)->whereIn('client_id', $clientId)->paginate(10, 'group1');
            } else {
                $clients = $this->client->whereIn('client_id', $clientId)->paginate(10, 'group1');
            }
        } else {
            $clients = [];
        }
        $data = array_merge($this->getData(), $this->appcon->getDataApp(), $this->getDataAge());
        $data['pager'] = $this->client->pager;
        $data['client'] = $clients;
        // var_dump($client);
        return view('Agent/clients', $data);
    }

    public function mycommi()
    {
        $data = array_merge(
            $this->getData(), // Assuming this method fetches general user data
            $this->appcon->getDataApp(), // Assuming this method fetches application-related data
            $this->getDataAge() // Assuming this method fetches agent-specific data
        );

        $data['mycommission'] = $this->client_plan->select('client.username as client_name, client.client_token, client_plan.token as tokin, client_plan.*, plan.*')
            ->join('client', 'client.client_id = client_plan.client_id')
            ->join('plan', 'plan.token = client_plan.plan')
            ->where('client_plan.agent', $data['agent']['agent_id'])
            ->findAll();
        return view('Agent/mycommi', $data);
    }
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
}
