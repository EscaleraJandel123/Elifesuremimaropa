<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\UserModel;
use App\Models\AgentModel;
use App\Models\ApplicantModel;
use App\Models\Form1Model;
use App\Models\ConfirmModel;
use App\Models\FeedbackModel;
use App\Models\PlanModel;
use App\Controllers\ClientController;
use App\Controllers\NotifController;
use App\Libraries\SmsLibrary;


class HomepageController extends BaseController
{
    private $confirm;
    private $agent;
    private $client;
    private $user;
    private $form1;
    private $plan;
    protected $feedbackModel;
    private $conclient;
    // protected $cache;
    private $notifcont;
    private $smsLibrary;


    public function __construct()
    {
        $this->confirm = new ConfirmModel();
        $this->form1 = new Form1Model();
        $this->user = new UserModel();
        $this->client = new ClientModel();
        $this->agent = new AgentModel();
        $this->plan = new PlanModel();
        $this->feedbackModel = new FeedbackModel();
        $this->conclient = new ClientController();
        // $this->cache = \Config\Services::cache();
        $this->notifcont = new NotifController();
        $this->smsLibrary = new SmsLibrary();
    }
    public function home()
    {
        $data = $this->conclient->ag();
        $data['feed'] = $this->feedbackModel->findAll();
        $data['plan'] = $this->plan->findAll();
        return view('Home/home', $data);
    }

    public function logout()
    {
        $updatetoken = bin2hex(random_bytes(50));
        $session = session();
        // Get the user ID from the session
        $userId = $session->get('id');
        // Update the user's token in the database
        $userModel = new UserModel(); // Assuming you have a UserModel
        $userModel->update($userId, ['token' => $updatetoken]);
        $session->destroy(); // Destroy the user's session data
        return redirect()->to('/'); // Redirect to the login page or any other page you prefer
    }

    public function login()
    {
        helper(['form']);
        $data = [];
        return view("Home/login");
    }
    //applicant reg

    public function register($ref)
    {
        helper(['form']);
        $data['ref'] = $ref; // Define and pass $ref to the view
        return view("Home/register", $data);
    }
    public function Authreg($ref)
    {
        helper(['form']); // Load both form and semaphore helpers

        $rules = [
            'username' => 'required|min_length[6]|max_length[50]|is_unique[users.username,id]',
            'email' => 'required|min_length[8]|max_length[100]|valid_email|is_unique[users.email,id]',
            'password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/]',
            'confirmpassword' => 'required|matches[password]',
        ];

        $usertoken = bin2hex(random_bytes(50));

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $agent = $this->agent->where('AgentCode', $ref)->first();

            if ($agent) {
                $userData = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'role' => $this->request->getVar('role'),
                    'status' => 'unverified',
                    'accountStatus' => 'active',
                    'token' => $usertoken,
                    'confirm' => 'false',
                ];
                $this->user->save($userData);
            } else {
                return redirect()->to('/register/' . $ref)->with('error', 'Invalid Registration Link');
            }

            $userId = $this->user->insertID();

            if ($this->request->getVar('role') === 'applicant') {
                $applicantData = [
                    'applicant_id' => $userId,
                    'username' => $this->request->getVar('username'),
                    'number' => $this->request->getVar('number'),
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'middlename' => $this->request->getVar('middlename'),
                    'email' => $this->request->getVar('email'),
                    'refcode' => $ref,
                    'token' => $usertoken,
                    'role' => 'applicant',
                ];

                $link = 'confirmation';
                $message = 'A new applicant, ' . $this->request->getVar('username') . ', has just signed up.';
                $r = 'admin';
                $this->notifcont->newnotif($userId, $link, $message, $r);

                $to = $this->request->getVar('number'); 
                $from = '447491163443';
                $text = 'Thank you for registering! Your account is currently registered. Please wait for confirmation from the admin before you can log in.';
                $response = $this->smsLibrary->sendSms($to, $from, $text);
                $this->confirm->save($applicantData);
            }

            $emailSubject = "Account Registration Confirmation";
            $emailMessage = "Thank you for registering! Your account is currently registered. Please wait for confirmation from the admin before you can log in.";
            // $this->sendVerificationEmail($this->request->getVar('email'), $emailSubject, $emailMessage);

            return redirect()->to('/login')->with('success', 'Account Registered. Please be patient. An email has been sent to your registered email address.');
        } else {
            $validation = \Config\Services::validation();
            $errorList = $validation->listErrors();

            if ($this->request->getVar('role') === 'client') {
                return redirect()->to('/ClientRegister')->with('error', $errorList);
            } else {
                return redirect()->to('/register/' . $ref)->with('error', $errorList);
            }
        }
    }


    public function sendVerificationEmail($to, $subject, $message)
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

    public function verifyEmail($token)
    {
        $userModel = new UserModel();

        // Find user by verification token
        $user = $userModel->where('verification_token', $token)
            ->where('status', 'unverified')
            ->first();
        if ($user) {
            // Update user status to 'verified'
            $userModel->update($user['id'], [
                'status' => 'verified',
                'verification_token' => null
            ]);
            // Redirect to a success page or login page

            return redirect()->to('/login')->with('success', 'Email verified! You can now log in with your account.');
        } else {
            // Invalid or expired token
            return redirect()->to('/login')->with('error', 'Invalid or expired verification token.');
        }
    }

    public function authlog()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $session->setFlashdata('error', 'Invalid email address.');
            return redirect()->to('/login');
        }

        // Fetch the user from the database
        $user = $userModel->where('email', $email)->first();

        // Check if the user exists
        if (!$user) {
            // No user found with that email
            $session->setFlashdata('error', 'No account found with that email address.');
            return redirect()->to('/login');
        }

        $user = $userModel->where('email', $email)->first();
        // Check if the user's status is 'verified'
        if ($user['status'] == 'verified') {
            // Check if the password matches
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id' => $user['id'],
                    'role' => $user['role'],
                    'IsLoggin' => true,
                    'accountStatus' => $user['accountStatus'],
                    'confirm' => $user['confirm'],
                    'token' => $user['token'],
                    'username' => $user['username'],
                ];
                $session->set($sessionData);
                $log = ['time_log' => date('Y-m-d H:i:s')];
                $this->user->set($log)->where('id', $user['id'])->update();

                switch ($user['role']) {
                    case 'admin':
                        return redirect()->to('/AdDash');
                    case 'applicant':
                        return redirect()->to('/AppDash');
                    case 'agent':
                        return redirect()->to('/AgDash');
                    case 'client':
                        return redirect()->to('/ClientPage');
                }

            } else {
                // Password mismatch
                $session->setFlashdata('error', 'Invalid password.');
                return redirect()->to('/login');
            }
        } else {
            // User status is not 'verified'
            $session->setFlashdata('warning', 'Your account has not been verified. Please check your email for the verification link.');
            return redirect()->to('/login');
        }
    }


    public function updatePassword()
    {
        helper(['form']);
        $rules = [
            'current_password' => 'required',
            // 'new_password' => 'required|min_length[6]|max_length[50]',
            'new_password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/]',
            'confirm_new_password' => 'matches[new_password]',
        ];

        if ($this->validate($rules)) {
            $session = session();
            $userId = $session->get('id');

            $userModel = new UserModel();

            // Get the current user data
            $userData = $userModel->find($userId);

            // Check if the entered current password matches the stored password
            if (password_verify($this->request->getVar('current_password'), $userData['password'])) {
                // Passwords match, update the password
                $newPassword = password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT);
                $userModel->update($userId, ['password' => $newPassword]);
                return redirect()->to('/logout')->with('success', 'Password Updated');
            } else {
                echo 'Current password is incorrect.';
            }
        } else {
            $data['validation'] = $this->validator;
            echo view('Home/register', $data);
        }
    }

    public function updatePasswordlogin()
    {
        helper(['form']);
        $session = session();
        $userId = $session->get('id');

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/]',
            'confirm_new_password' => 'matches[new_password]',
        ];

        // Check if form validation is correct
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $userData = $userModel->find($userId);

            // Verify the current password
            if (password_verify($this->request->getVar('current_password'), $userData['password'])) {
                // Passwords match, proceed to update the password
                $newPassword = password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT);
                $userModel->update($userId, ['password' => $newPassword]);
                return redirect()->to('/logout')->with('success', 'Password Updated');
            } else {
                // Current password does not match
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }
        } else {
            // Validation failed
            $validationErrors = $this->validator->listErrors(); // Get validation errors as a string
            return redirect()->back()->with('error', $validationErrors);
        }
    }

    public function forgot()
    {
        return view("Home/forgot");
    }

    public function sendResetLink()
    {
        $userEmail = $this->request->getVar('email');

        // Generate a random token
        $token = bin2hex(random_bytes(16));

        // Save the token to the database
        $userModel = new UserModel();
        $user = $userModel->where('email', $userEmail)->first();

        if ($user) {
            $userModel->update($user['id'], ['pass_token' => $token]);

            // Load Email Library and configure SMTP
            $email = \Config\Services::email();
            $config = array(
                'protocol' => 'smtp',
                'SMTPHost' => 'smtp.gmail.com',
                'SMTPUser' => 'alejandrogino950@gmail.com', // Your Gmail address
                'SMTPPass' => 'kiewkcfnftnigkvh',
                'SMTPPort' => 587,
                'SMTPCrypto' => 'tls',
                'mailType' => 'html',
                'charset' => 'utf-8'
            );
            $email->initialize($config);

            // Set Email Parameters
            $email->setFrom('alejandrogino950@gmail.com', 'ALLIANZ PNB CALAPAN'); // Replace with your Gmail address and name
            $email->setTo($userEmail);
            $email->setSubject('Password Reset Link');
            $resetLink = site_url("reset-password/{$token}");
            $email->setMessage("Click the link to reset your password: $resetLink");

            // Send the email
            if ($email->send()) {
                return view('emailsend');
            } else {
                $data['error'] = $email->printDebugger(['headers']);
                echo 'Failed to send reset link. Error: ' . $data['error'];
            }
        } else {
            // Email not found in the database
            echo 'Invalid email address';
        }
    }

    public function resetPassword($token)
    {
        $userModel = new UserModel();
        $user = $userModel->where('pass_token', $token)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Invalid reset token.');
        }
        return view('Home/reset_password', ['pass_token' => $token]);
    }

    public function processResetPassword($token)
    {
        helper(['form']);
        $rules = [
            'new_password' => 'required|min_length[6]|max_length[50]',
            'confirm_new_password' => 'matches[new_password]',
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();

            // Get the user based on the reset token
            $user = $userModel->where('pass_token', $token)->first();

            if (!$user) {
                return redirect()->to('/login')->with('error', 'Invalid reset token.');
            }

            // Update the password and remove the token from the database
            $newPassword = password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT);
            $userModel->update($user['id'], ['password' => $newPassword, 'pass_token' => null]);

            return redirect()->to('/login')->with('success', 'Password reset successful');
        } else {
            $data['pass_token'] = $token; // Add this line to pass the token to the view
            $data['vali'] = $this->validator;
            echo view('Home/reset_password', $data);
        }
    }

    public function terms()
    {
        $data['plan'] = $this->plan->findAll();
        return view('Home/terms', $data);
    }

    public function policy()
    {
        $data['plan'] = $this->plan->findAll();
        return view('Home/policy', $data);
    }

    public function comingsoon()
    {
        $data['plan'] = $this->plan->findAll();
        return view('Home/comingsoon', $data);
    }

    public function contactus()
    {
        $data['plan'] = $this->plan->findAll();
        return view('Home/contactus', $data);
    }

    public function feedback()
    {
        $data['plan'] = $this->plan->findAll();
        return view('Home/feedback', $data);
    }

}
