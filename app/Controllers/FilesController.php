<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentModel;
use App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\FilesModel;
use App\Models\AdminModel;

class FilesController extends BaseController
{
    private $user;
    private $app;
    private $file;
    private $agent;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->app = new ApplicantModel();
        $this->file = new FilesModel();
        $this->agent = new AgentModel();
    }

    public function applicantfiles()
    {
        $session = session();
        $userId = $session->get('id');
        $data = array_merge($this->getData(), $this->getDataApp());

        // Fetch user's files
        $files = $this->file->where('user_id', $userId)->first();

        // Initialize an array with null values to handle non-existing files
        $fileData = [
            'file1' => null,
            'file2' => null,
            'file3' => null,
            'file4' => null,
            'file5' => null,
            'file6' => null,
            'file7' => null,
            'file8' => null,
            'file9' => null,
            'file10' => null,
            'file11' => null,
        ];

        if ($files) {
            // Merge existing files into the array
            $fileData = array_merge($fileData, $files);
        }
        $data['username'] = $data['user']['username'];
        $data['files'] = $fileData;
        $data['userIdExists'] = $files ? true : false;
        return view('Applicant/files', $data);
    }

    public function fileuploads()
    {
        $session = session();
        $userId = $session->get('id');
        $role = $session->get('role');
        $data = $this->getData();
        $username = $data['user']['username'];

        // Directory to store files
        $uploadPath = FCPATH . 'uploads/files/' . $username;

        // Create the directory if it doesn't exist
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Get files
        $files = [
            'file1' => $this->request->getFile('file1'),
            'file2' => $this->request->getFile('file2'),
            'file3' => $this->request->getFile('file3'),
            'file4' => $this->request->getFile('file4'),
            'file5' => $this->request->getFile('file5'),
            'file6' => $this->request->getFile('file6'),
            'file7' => $this->request->getFile('file7'),
            'file8' => $this->request->getFile('file8'),
            'file9' => $this->request->getFile('file9'),
            'file10' => $this->request->getFile('file10'),
            'file11' => $this->request->getFile('file11'),
        ];

        $fileData = [];

        // Check if user_id exists in the database
        $existingRecord = $this->file->where('user_id', $userId)->first();

        if ($existingRecord) {
            // Delete old files from the filesystem and debug output
            foreach ($files as $key => $file) {
                if ($file->isValid() && !$file->hasMoved() && !empty($existingRecord[$key])) {
                    $oldFilePath = $uploadPath . '/' . $existingRecord[$key];
                    if (file_exists($oldFilePath)) {
                        $deleteResult = unlink($oldFilePath); // Attempt to delete file
                        if ($deleteResult) {
                            echo 'File deleted successfully: ' . $oldFilePath . '<br>';
                        } else {
                            echo 'Failed to delete file: ' . $oldFilePath . '<br>';
                        }
                    } else {
                        echo 'File not found: ' . $oldFilePath . '<br>';
                    }
                }
            }
        }

        // Process each file
        foreach ($files as $key => $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newFileName = $file->getRandomName();
                $file->move($uploadPath, $newFileName);
                $fileData[$key] = $newFileName;
            }
        }

        if (!empty($fileData)) {
            $fileData['user_id'] = $userId;
            $fileData['token'] = bin2hex(random_bytes(16));

            if ($existingRecord) {
                // Update the existing record
                $this->file->where('user_id', $userId)->set($fileData)->update();
            } else {
                // Insert a new record
                $this->file->insert($fileData);
            }

            // Debugging output
            // var_dump($fileData);
        }
        if($role == 'agent') {
            return redirect()->to('/agfiles')->with('success', 'Files uploaded successfully.');
        } else {
            return redirect()->to('/appfiles')->with('success', 'Files uploaded successfully.');
        }
    }

    private function getData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['user'] = $this->user->find($userId);
        return $data;
    }

    private function getDataApp()
    {
        $session = session();
        $userId = $session->get('id');
        $data['applicant'] = $this->app->where('applicant_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }

    private function getDataAgent()
    {
        $session = session();
        $userId = $session->get('id');
        $data['applicant'] = $this->agent->where('agent_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }

    public function agfiles()
    {
        $session = session();
        $userId = $session->get('id');
        $data = array_merge($this->getData(), $this->getDataAgent());

        // Fetch user's files
        $files = $this->file->where('user_id', $userId)->first();

        // Initialize an array with null values to handle non-existing files
        $fileData = [
            'file1' => null,
            'file2' => null,
            'file3' => null,
            'file4' => null,
            'file5' => null,
            'file6' => null,
            'file7' => null,
            'file8' => null,
            'file9' => null,
            'file10' => null,
            'file11' => null,
        ];

        if ($files) {
            $fileData = array_merge($fileData, $files);
        }
        $data['username'] = $data['user']['username'];
        $data['files'] = $fileData;
        $data['userIdExists'] = $files ? true : false;

        return view('Agent/files', $data);
    }
}
