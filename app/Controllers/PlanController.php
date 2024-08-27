<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\AdminController;
use App\Models\PlanModel;
use App\Models\NotifModel;
use App\Controllers\NotifController;

class PlanController extends BaseController
{
    private $plan;
    private $adcon;
    private $notifcont;
    public function __construct()
    {
        $this->plan = new PlanModel();
        $this->adcon = new AdminController();
        $this->notifcont = new NotifController();
    }
    public function plans()
    {
        $data = array_merge($this->adcon->getData(), $this->adcon->getDataAd(), $this->notifcont->notification());
        $data['plan'] = $this->plan->findAll();
        return view("Admin/plan", $data);
    }

    public function newplan()
    {
        $token = bin2hex(random_bytes(50));
        if ($imageFile = $this->request->getFile('image')) {
            if ($imageFile->isValid()) {
                $imageName = $imageFile->getRandomName();
                $uploadPath = FCPATH . 'uploads/plans';
                if ($imageFile->move($uploadPath, $imageName)) {
                    $plan['image'] = $imageName;
                }
            }
        }
        $data = [
            'plan_name' => $this->request->getVar('plan_name'),
            'brief_description' => $this->request->getVar('brief_description'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'token' => $token,
            'image' => $plan,
            'coverage' => $this->request->getVar('coverage'),
            'com_percentage' => $this->request->getVar('com_percentage'),
        ];
            $this->plan->save($data);

        return redirect()->to('plans')->with('success', 'new plan added');
    }

    public function newplanUpdate($token)
    {
        // $token2 = bin2hex(random_bytes(50));
        $id = $this->request->getVar('id');
        $oldproduct = $this->plan->select('image')->where('id', $id)->first();
        $plan = []; // Idagdag ang pagdeklara ng $plan dito
        if ($imageFile = $this->request->getFile('image')) {
            if ($imageFile->isValid()) {
                $imageName = $imageFile->getRandomName();
                $uploadPath = FCPATH . 'uploads/plans';
                if ($imageFile->move($uploadPath, $imageName)) {
                    $plan['image'] = $imageName;
                    if (!empty($oldproduct['image'])) {
                        $oldFilePath = $uploadPath . $oldproduct['image'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                }
            }
        }
        $plan += [
            'plan_name' => $this->request->getVar('plan_name'),
            'brief_description' => $this->request->getVar('brief_description'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            // 'token' => $token2,
            'coverage' => $this->request->getVar('coverage'),
            'com_percentage' => $this->request->getVar('com_percentage'),
        ];

        // var_dump($plan);
        $this->plan->set($plan)->where('token', $token)->update();
        return redirect()->to('plans')->with('success', 'Plan Updated');
    }

}
