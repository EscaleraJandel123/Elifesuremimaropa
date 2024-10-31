<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use \App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\Form1Model;
use App\Models\AgentModel;
// use App\Models\NotifModel;
use App\Controllers\AdminController;
use App\Controllers\NotifController;


class UsersManageController extends BaseController
{
    private $agent;
    private $user;
    private $applicant;
    private $admin;
    private $form;
    private $notifcont;
    private $admincon;
    // protected $cache;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->applicant = new ApplicantModel();
        $this->agent = new AgentModel();
        $this->admin = new AdminModel();
        $this->form = new Form1Model();
        $this->notifcont = new NotifController();
        $this->admincon = new AdminController();
        // $this->cache = \Config\Services::cache();
    }
    private function alluser()
    {
        $data['users'] = $this->user->where(['role !=' => 'admin'])->orderBy('username')->findAll();
        return $data;
    }
    public function usermanagement()
    {
        // Check for validation errors in the session
        if (session()->has('validation')) {
            $data['validation'] = session('validation');
            session()->remove('validation'); // Clear the session variable
        }
        $data = array_merge($this->getDataAd(), $this->alluser(), $this->notifcont->notification());
        $filterroles = $this->request->getPost('filterDropdown');
        $search = $this->request->getPost('searchusers');
        // Check if filter roles are selected
        if (!empty($filterroles)) {
            if ($filterroles == 'all') {
                $data['users'] = $this->user->where(['role !=' => 'admin', 'confirm !=' => 'false'])->orderBy('username')->paginate(10, 'group1');

            } else {
                // If another role is selected, filter by role
                $data['users'] = $this->user->where('role', $filterroles)->where(['role !=' => 'admin', 'confirm !=' => 'false'])->orderBy('username')->paginate(10, 'group1');
            }
        } else if (!empty($search)) {
            // If no filter roles, check if search query is provided
            $data['users'] = $this->user->like('username', $search)->where(['role !=' => 'admin', 'confirm !=' => 'false'])->orderBy('username')->paginate(10, 'group1');

        } else {
            // If neither filter roles nor search query is provided, get all users
            $data['users'] = $this->user->where(['role !=' => 'admin', 'confirm !=' => 'false'])->orderBy('username')->paginate(10, 'group1');

        }
        // $data['notifications'] = $this->notif->orderBy('created_at', 'DESC')->findAll();
        $data['pager'] = $this->user->pager;
        return view('Admin/usermanagement', $data);
    }

    // public function notif()
    // {
    //     $data['notifications'] = $this->notif->where('role', 'admin')->orderBy('created_at', 'DESC')->limit(5)->findAll();
    //     if (!empty($data['notifications'])) {
    //         foreach ($data['notifications'] as &$notification) {
    //             if (isset($notification['user_id'])) {
    //                 $id = $notification['user_id'];
    //                 $usertoken = $this->user->where('id', $id)->findColumn('token');
    //                 if (!empty($usertoken)) {
    //                     $notification['token'] = $usertoken[0]; // Assuming 'token' is a single value
    //                 }
    //             }
    //         }
    //     }
    //     return $data;
    // }

    private function getDataAd()
    {

        $session = session();
        $userId = $session->get('id');
        $data['admin'] = $this->admin->where('admin_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }

    public function newuser()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[50]',
            'confirmpassword' => 'matches[password]',
        ];
        $token = bin2hex(random_bytes(50));
        if ($this->validate($rules)) {
            $newuser = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'role' => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'token' => $token
            ];
            $this->user->save($newuser);
            return redirect()->to('usermanagement')->with('success', 'New user added');
        } else {
            session()->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->to('usermanagement')->with('error', 'Invalid Input Data');
        }
    }
    public function upuser($token)
    {
        $newuser = [
            'accountStatus' => $this->request->getVar('accountStatus'),
        ];
        if ($this->request->getVar('accountStatus') == 'active') {
            $timelog = ['time_log' => date('Y-m-d H:i:s')];
            $this->user->set($timelog)->where('token', $token)->update();
        }
        $this->user->set($newuser)->where('token', $token)->update();
        return redirect()->to('usermanagement')->with('success', 'Account updated');
        // var_dump($newuser);
    }


}
