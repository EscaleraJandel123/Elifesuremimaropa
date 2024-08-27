<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    public function index()
    {
        // 
    }

    public function saveFeedback()
    {
        $input = $this->request->getPost();
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'content' => 'required'
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'content' => $input['content'],
            'created_at' => date('Y-m-d H:i:s') 
        ];
        $this->feedbackModel->insert($data);
        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }

}
