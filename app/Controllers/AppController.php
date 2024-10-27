<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\RTCController;
use App\Models\ApplicantModel;
use App\Models\Form1Model;
use App\Models\Form2Model;
use App\Models\Form3Model;
use App\Models\Form4Model;
use App\Models\Form5Model;
use App\Models\SignatureModel;
use \App\Models\UserModel;
use \App\Models\AgentModel;
use \App\Models\NotifModel;
use \App\Controllers\NotifController;

class AppController extends BaseController
{
    private $RTC;
    private $agent;
    private $form1;
    private $form2;
    private $form3;
    private $form4;
    private $form5;
    private $esign;
    private $user;
    private $applicant;
    private $notif;
    private $notificationcontroller;
    // protected $cache;

    public function __construct()
    {
        $this->agent = new AgentModel();
        $this->form1 = new Form1Model();
        $this->form2 = new Form2Model();
        $this->form3 = new Form3Model();
        $this->form4 = new Form4Model();
        $this->form5 = new Form5Model();
        $this->esign = new SignatureModel();
        $this->user = new UserModel();
        $this->RTC = new RTCController();
        $this->applicant = new ApplicantModel();
        $this->notif = new NotifModel();
        $this->notificationcontroller = new NotifController();
        // $this->cache = \Config\Services::cache();
    }

    public function AppDash()
    {
        $data = array_merge($this->getData(), $this->getDataApp(), $this->RTC->RTC());
        return view('Applicant/AppDash', $data);
        // var_dump($data);
    }

    public function AppProfile()
    {
        $data = array_merge($this->getData(), $this->getDataApp());
        return view('Applicant/AppProfile', $data);
    }

    public function AppForms()
    {
        $data = array_merge($this->getData(), $this->getDataApp());
        return view('Applicant/forms', $data);
    }



    private function getData()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('id')) {
            // Redirect or handle the case where the user is not logged in
            return redirect()->to('login');
        }
        // Get the user ID from the session
        $userId = $session->get('id');
        // Find the user by ID
        $data['user'] = $this->user->find($userId);
        return $data;
    }

    public function getDataApp()
    {
        $session = session();
        $userId = $session->get('id');
        $data['applicant'] = $this->applicant->where('applicant_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }

    public function getform1Data()
    {
        $session = session();
        $userId = $session->get('id');
        $data['lifechangerform'] = $this->form1->where('user_id', $userId)
            ->first();
        return $data;
    }

    public function getform2Data()
    {
        $session = session();
        $userId = $session->get('id');
        $data['aial'] = $this->form2->where('user_id', $userId)
            ->first();
        return $data;
    }

    public function getform3Data()
    {
        $session = session();
        $userId = $session->get('id');
        $data['gli'] = $this->form3->where('applicant_id', $userId)
            ->first();
        return $data;
    }

    public function getform4Data()
    {
        $session = session();
        $userId = $session->get('id');
        $data['aonff'] = $this->form4->where('applicant_id', $userId)
            ->first();
        return $data;
    }

    public function getform5Data()
    {
        $session = session();
        $userId = $session->get('id');
        $data['sou'] = $this->form5->where('applicant_id', $userId)
            ->first();
        return $data;
    }

    public function esign()
    {
        $session = session();
        $userId = $session->get('id');
        $data['sign'] = $this->esign->where('user_id', $userId)
            ->first();
        return $data;
    }

    public function AppSetting()
    {
        $data = array_merge($this->getData(), $this->getDataApp());
        return view('Applicant/AppSetting', $data);
    }

    public function signature()
    {
        $data = array_merge($this->getData(), $this->getDataApp(), $this->esign());
        return view('Applicant/signature', $data);
    }

    public function signsave()
    {
        // Retrieve user_id from the session
        $session = session();
        $userId = $session->get('id');
        $token = $session->get('token');

        // Decode the base64 signature data
        $base64Image = $this->request->getVar('sign');
        if (!$base64Image) {
            return redirect()->back()->with('error', 'No signature data received.');
        }

        // Decode the base64 data to get the image content
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        if ($imageData === false) {
            return redirect()->back()->with('error', 'Invalid signature data.');
        }

        // Define the upload path and filename
        $uploadPath = FCPATH . 'uploads/signatures/';
        $filename = 'signature_' . time() . '.png';

        // Ensure the directory exists
        if (!is_dir($uploadPath) && !mkdir($uploadPath, 0755, true)) {
            return redirect()->back()->with('error', 'Failed to create directory for signature uploads.');
        }

        // Create an image resource from the decoded data
        $signatureImage = imagecreatefromstring($imageData);
        if (!$signatureImage) {
            return redirect()->back()->with('error', 'Failed to create image from signature data.');
        }

        // Get the dimensions of the signature image
        $width = imagesx($signatureImage);
        $height = imagesy($signatureImage);

        // Create a white background image with the same dimensions
        $backgroundImage = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($backgroundImage, 255, 255, 255); // White color
        imagefill($backgroundImage, 0, 0, $white); // Fill the background with white

        // Merge the signature image onto the white background
        imagecopy($backgroundImage, $signatureImage, 0, 0, 0, 0, $width, $height);

        // Save the final image with the white background
        $saved = imagepng($backgroundImage, $uploadPath . $filename);

        // Clean up resources
        imagedestroy($signatureImage);
        imagedestroy($backgroundImage);

        if ($saved) {
            // Prepare data for insertion/updation
            $signatureData = [
                'user_id' => $userId,
                'user_token' => $token,
                'signature' => $filename,
            ];

            // Check if the user_id exists in the e-signature table
            $existingSignature = $this->esign->where('user_id', $userId)->first();
            if ($existingSignature) {
                // Update the existing record
                $this->esign->where('user_id', $userId)->set($signatureData)->update();

                // Remove the old signature file if it exists
                $oldSignature = $existingSignature['signature'];
                if (!empty($oldSignature)) {
                    $oldFilePath = $uploadPath . $oldSignature;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
            } else {
                $this->esign->save($signatureData);
            }

            // Redirect or display a success message
            return redirect()->back()->with('success', 'Signature saved successfully');
        } else {
            // Handle error in saving the image
            return redirect()->back()->with('error', 'Failed to save signature image');
        }
    }

    public function svap()
    {
        $session = session();
        $userId = $session->get('id');
        // Initialize $data array
        $data = [];
        // Get the old image file name from the database
        $oldApp = $this->applicant->select('profile')->where('applicant_id', $userId)->first();
        // Check if a file is uploaded
        if ($imageFile = $this->request->getFile('profile')) {
            // Check if the file is valid
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                // Generate a unique name for the uploaded image
                $imageName = $imageFile->getRandomName();

                // Set the path to the upload directory
                $uploadPath = FCPATH . 'uploads/';

                // Move the uploaded image to the upload directory
                if ($imageFile->move($uploadPath, $imageName)) {
                    // Image upload successful, store the image filename in the database
                    $data['profile'] = $imageName;

                    // Delete the old image file if it exists
                    if (!empty($oldApp['profile'])) {
                        $oldFilePath = $uploadPath . $oldApp['profile'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                } else {
                    $error = $imageFile->getError();
                    echo $error;
                }
            }
        }

        // Add other form data to the data array
        $data += [
            // 'applicantfullname' => $this->request->getVar('applicantfullname'),
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
            $this->applicant->set($data)->where('applicant_id', $userId)->update();
        }
        return redirect()->to('/AppSetting');
    }

    public function AppHelp()
    {
        $data = array_merge($this->getData(), $this->getDataApp());
        return view('Applicant/AppHelp', $data);
    }

    public function AppForm1()
    {
        $data['agents'] = $this->agent->findAll();
        // Merge arrays while retaining the 'agents' key
        $data = array_merge($this->getData(), $this->getDataApp(), $this->getform1Data(), $this->esign(), $this->refbywhom(), $data);
        return view('Applicant/AppForm1', $data);
    }

    public function refbywhom()
    {
        $session = session();
        $userId = $session->get('id');
        $refcode = $this->applicant->select('refcode')->where('applicant_id', $userId)->first()['refcode'] ?? null;

        // Proceed only if refcode is found
        $referalby = $refcode
            ? $this->agent->select("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) as fullname")
                ->where('AgentCode', $refcode)->first()['fullname'] ?? null
            : null;

        // Return an array with the referral name
        return ['referalby' => $referalby];
    }


    // public function form1sv()
    // {
    //     $session = session();
    //     // Retrieve user_id from the session
    //     $userId = $session->get('id');
    //     $token = $session->get('token');

    //     // Decode the base64 signature data
    //     $base64Image = $this->request->getVar('sign');
    //     $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

    //     // Define the upload path and filename
    //     $uploadPath = FCPATH . 'uploads/signatures/'; // Adjust the path as needed
    //     $filename = 'signature_' . time() . '.png'; // Generate a unique filename

    //     // Check if user_id exists in the database
    //     $existingUser = $this->form1->select('signature')->where('user_id', $userId)->first();

    //     if (file_put_contents($uploadPath . $filename, $imageData)) {
    //         // Image saved successfully, prepare data for insertion/updation
    //         $data = [
    //             'user_id' => $userId,
    //             'app_life_token' => $token,
    //             'position' => $this->request->getVar('positionApplying'),
    //             'preferredArea' => $this->request->getVar('preferredArea'),
    //             'referral' => $this->request->getVar('referral') ?? 'No',
    //             'referralBy' => $this->request->getVar('referralBy'),
    //             'onlineAd' => $this->request->getVar('onlineAd') ?? 'No',
    //             'walkIn' => $this->request->getVar('walkIn') ?? 'No',
    //             'othersRef' => $this->request->getVar('othersRef') ?? 'No',
    //             'fname' => $this->request->getVar('fullname'),
    //             'nickname' => $this->request->getVar('nickname'),
    //             'birthdate' => $this->request->getVar('birthdate'),
    //             'placeOfBirth' => $this->request->getVar('placeOfBirth'),
    //             'gender' => $this->request->getVar('gender'),
    //             'bloodType' => $this->request->getVar('bloodType'),
    //             'homeAddress' => $this->request->getVar('homeAddress'),
    //             'mobileNo' => $this->request->getVar('mobileNo'),
    //             'landline' => $this->request->getVar('landline') ?? 'N/A',
    //             'email' => $this->request->getVar('email'),
    //             'citizenship' => $this->request->getVar('citizenship'),
    //             'othersCitizenship' => $this->request->getVar('othersCitizenship') ?? 'N/A',
    //             'naturalizationInfo' => $this->request->getVar('naturalizationInfo') ?? 'N/A',
    //             'maritalStatus' => $this->request->getVar('maritalStatus'),
    //             'maidenName' => $this->request->getVar('maidenName') ?? 'N/A',
    //             'spouseName' => $this->request->getVar('spouseName') ?? 'N/A',
    //             'sssNo' => $this->request->getVar('sssNo'),
    //             'tin' => $this->request->getVar('tin'),
    //             'lifeInsuranceExperience' => $this->request->getVar('lifeInsuranceExperience') ?? 'No',
    //             'traditional' => $this->request->getVar('traditional') ?? 'No',
    //             'variable' => $this->request->getVar('variable') ?? 'No',
    //             'recentInsuranceCompany' => $this->request->getVar('recentInsuranceCompany') ?? 'N/A',
    //             'highSchool' => $this->request->getVar('highSchool') ?? 'N/A',
    //             'highSchoolCourse' => $this->request->getVar('highSchoolCourse') ?? 'N/A',
    //             'highSchoolYear' => $this->request->getVar('highSchoolYear') ?? 'N/A',
    //             'college' => $this->request->getVar('college') ?? 'N/A',
    //             'collegeCourse' => $this->request->getVar('collegeCourse') ?? 'N/A',
    //             'collegeYear' => $this->request->getVar('collegeYear') ?? 'N/A',
    //             'graduateSchool' => $this->request->getVar('graduateSchool') ?? 'N/A',
    //             'graduateCourse' => $this->request->getVar('graduateCourse') ?? 'N/A',
    //             'graduateYear' => $this->request->getVar('graduateYear') ?? 'N/A',
    //             'companyName1' => $this->request->getVar('companyName1') ?? 'N/A',
    //             'position1' => $this->request->getVar('position1') ?? 'N/A',
    //             'employmentFrom1' => $this->request->getVar('employmentFrom1') ?? 'N/A',
    //             'employmentTo1' => $this->request->getVar('employmentTo1') ?? 'N/A',
    //             'reason1' => $this->request->getVar('reason1') ?? 'N/A',
    //             'companyName2' => $this->request->getVar('companyName2') ?? 'N/A',
    //             'position2' => $this->request->getVar('position2') ?? 'N/A',
    //             'employmentFrom2' => $this->request->getVar('employmentFrom2') ?? 'N/A',
    //             'employmentTo2' => $this->request->getVar('employmentTo2') ?? 'N/A',
    //             'reason2' => $this->request->getVar('reason2') ?? 'N/A',
    //             'companyName3' => $this->request->getVar('companyName3') ?? 'N/A',
    //             'position3' => $this->request->getVar('position3') ?? 'N/A',
    //             'employmentFrom3' => $this->request->getVar('employmentFrom3') ?? 'N/A',
    //             'employmentTo3' => $this->request->getVar('employmentTo3') ?? 'N/A',
    //             'reason3' => $this->request->getVar('reason3') ?? 'N/A',
    //             'companyName' => $this->request->getVar('companyName') ?? 'N/A',
    //             'resposition' => $this->request->getVar('position') ?? 'N/A',
    //             'contactName' => $this->request->getVar('contactName') ?? 'N/A',
    //             'contactPosition' => $this->request->getVar('contactPosition') ?? 'N/A',
    //             'emailAddress' => $this->request->getVar('emailAddress') ?? 'N/A',
    //             'contactNumber' => $this->request->getVar('contactNumber') ?? 'N/A',
    //             'yescuremployed' => $this->request->getVar('yescuremployed') ?? 'N/A',
    //             'nocuremployed' => $this->request->getVar('nocuremployed') ?? 'N/A',
    //             'allowed' => $this->request->getVar('allowed') ?? 'N/A',
    //             'notallowed' => $this->request->getVar('notallowed') ?? 'N/A',
    //             'ifnoProvdtls' => $this->request->getVar('ifnoProvdtls') ?? 'N/A',
    //             'persontonotif' => $this->request->getVar('persontonotif'),
    //             'moNo' => $this->request->getVar('moNo'),
    //             'n1' => $this->request->getVar('n1'),
    //             'p1' => $this->request->getVar('p1'),
    //             'c1' => $this->request->getVar('c1'),
    //             'e1' => $this->request->getVar('e1'),
    //             'n2' => $this->request->getVar('n2'),
    //             'p2' => $this->request->getVar('p2'),
    //             'c2' => $this->request->getVar('c2'),
    //             'e2' => $this->request->getVar('e2'),
    //             'n3' => $this->request->getVar('n3'),
    //             'p3' => $this->request->getVar('p3'),
    //             'c3' => $this->request->getVar('c3'),
    //             'e3' => $this->request->getVar('e3'),
    //             'g1y' => $this->request->getVar('g1y'),
    //             'g1n' => $this->request->getVar('g1n'),
    //             'accused' => $this->request->getVar('accused'),
    //             'g2y' => $this->request->getVar('g2y'),
    //             'g2n' => $this->request->getVar('g2n'),
    //             'bankruptcy' => $this->request->getVar('bankruptcy'),
    //             'g3y' => $this->request->getVar('g3y'),
    //             'g3n' => $this->request->getVar('g3n'),
    //             'investigated' => $this->request->getVar('investigated'),
    //             'g4y' => $this->request->getVar('g4y'),
    //             'g4n' => $this->request->getVar('g4n'),
    //             'terminat' => $this->request->getVar('terminated'),
    //             'printedName' => $this->request->getVar('printedName'),
    //             'botdate' => $this->request->getVar('botdate'),
    //             'signature' => $filename, // Remove this from form1 data
    //         ];

    //         if ($existingUser) {
    //             // Update existing record
    //             $this->form1->set($data)->where('user_id', $userId)->update();
    //         } else {
    //             // Insert new record
    //             $this->form1->insert($data);
    //         }

    //         // Signature data for e-signature table
    //         $signatureData = [
    //             'user_id' => $userId,
    //             'signature' => $filename,
    //         ];

    //         // Check if signature already exists for the user
    //         $existingSignature = $this->esign->where('user_id', $userId)->first();

    //         if ($existingSignature) {
    //             // Delete the old image file if it exists
    //             if (!empty($existingSignature['signature'])) {
    //                 $oldFilePath = $uploadPath . $existingSignature['signature'];
    //                 if (file_exists($oldFilePath)) {
    //                     unlink($oldFilePath);
    //                 }
    //             }
    //             // Update existing signature record
    //             $this->esign->set($signatureData)->where('user_id', $userId)->update();
    //         } else {
    //             // Insert new signature record
    //             $this->esign->insert($signatureData);
    //         }

    //         return redirect()->back()->with('status', 'Form saved successfully');
    //     } else {
    //         // Handle error in saving the image
    //         return redirect()->back()->with('error', 'Failed to save signature image');
    //     }
    // }

    public function form1sv()
    {
        $session = session();
        // Retrieve user_id from the session
        $userId = $session->get('id');
        $username = $session->get('username');
        $token = $session->get('token');
        $role = $session->get('role');

        // $refcode = $this->applicant->select('refcode')->where('applicant_id', $userId)->first()['refcode'] ?? null;

        // // Proceed only if refcode is found
        // $referalby = $refcode
        //     ? $this->agent->select("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) as fullname")
        //         ->where('AgentCode', $refcode)->first()['fullname'] ?? null
        //     : null;

        // // Output the concatenated name or null if no agent found
        // var_dump($referalby);


        // Check if user_id exists in the database
        $existingUser = $this->form1->select('user_id')->where('user_id', $userId)->first();

        // Prepare data for insertion/updating
        $data = [
            'user_id' => $userId,
            'app_life_token' => $token,
            'position' => $this->request->getVar('positionApplying'),
            'preferredArea' => $this->request->getVar('preferredArea'),
            'referral' => $this->request->getVar('referral') ?? 'No',

            'referralBy' => $this->request->getVar('referralBy'),

            'onlineAd' => $this->request->getVar('onlineAd') ?? 'No',
            'walkIn' => $this->request->getVar('walkIn') ?? 'No',
            'othersRef' => $this->request->getVar('othersRef') ?? 'No',
            'fname' => $this->request->getVar('fullname'),
            'nickname' => $this->request->getVar('nickname'),
            'birthdate' => $this->request->getVar('birthdate'),
            'placeOfBirth' => $this->request->getVar('placeOfBirth'),
            'gender' => $this->request->getVar('gender'),
            'bloodType' => $this->request->getVar('bloodType'),
            'homeAddress' => $this->request->getVar('homeAddress'),
            'mobileNo' => $this->request->getVar('mobileNo'),
            'landline' => $this->request->getVar('landline') ?? 'N/A',
            'email' => $this->request->getVar('email'),
            'citizenship' => $this->request->getVar('citizenship'),
            'othersCitizenship' => $this->request->getVar('othersCitizenship') ?? 'N/A',
            'naturalizationInfo' => $this->request->getVar('naturalizationInfo') ?? 'N/A',
            'maritalStatus' => $this->request->getVar('maritalStatus'),
            'maidenName' => $this->request->getVar('maidenName') ?? 'N/A',
            'spouseName' => $this->request->getVar('spouseName') ?? 'N/A',
            'sssNo' => $this->request->getVar('sssNo'),
            'tin' => $this->request->getVar('tin'),
            'lifeInsuranceExperience' => $this->request->getVar('lifeInsuranceExperience') ?? 'No',
            'traditional' => $this->request->getVar('traditional') ?? 'No',
            'variable' => $this->request->getVar('variable') ?? 'No',
            'recentInsuranceCompany' => $this->request->getVar('recentInsuranceCompany') ?? 'N/A',
            'highSchool' => $this->request->getVar('highSchool') ?? 'N/A',
            'highSchoolCourse' => $this->request->getVar('highSchoolCourse') ?? 'N/A',
            'highSchoolYear' => $this->request->getVar('highSchoolYear') ?? 'N/A',
            'college' => $this->request->getVar('college') ?? 'N/A',
            'collegeCourse' => $this->request->getVar('collegeCourse') ?? 'N/A',
            'collegeYear' => $this->request->getVar('collegeYear') ?? 'N/A',
            'graduateSchool' => $this->request->getVar('graduateSchool') ?? 'N/A',
            'graduateCourse' => $this->request->getVar('graduateCourse') ?? 'N/A',
            'graduateYear' => $this->request->getVar('graduateYear') ?? 'N/A',
            'companyName1' => $this->request->getVar('companyName1') ?? 'N/A',
            'position1' => $this->request->getVar('position1') ?? 'N/A',
            'employmentFrom1' => $this->request->getVar('employmentFrom1') ?? 'N/A',
            'employmentTo1' => $this->request->getVar('employmentTo1') ?? 'N/A',
            'reason1' => $this->request->getVar('reason1') ?? 'N/A',
            'companyName2' => $this->request->getVar('companyName2') ?? 'N/A',
            'position2' => $this->request->getVar('position2') ?? 'N/A',
            'employmentFrom2' => $this->request->getVar('employmentFrom2') ?? 'N/A',
            'employmentTo2' => $this->request->getVar('employmentTo2') ?? 'N/A',
            'reason2' => $this->request->getVar('reason2') ?? 'N/A',
            'companyName3' => $this->request->getVar('companyName3') ?? 'N/A',
            'position3' => $this->request->getVar('position3') ?? 'N/A',
            'employmentFrom3' => $this->request->getVar('employmentFrom3') ?? 'N/A',
            'employmentTo3' => $this->request->getVar('employmentTo3') ?? 'N/A',
            'reason3' => $this->request->getVar('reason3') ?? 'N/A',
            'companyName' => $this->request->getVar('companyName') ?? 'N/A',
            'resposition' => $this->request->getVar('position') ?? 'N/A',
            'contactName' => $this->request->getVar('contactName') ?? 'N/A',
            'contactPosition' => $this->request->getVar('contactPosition') ?? 'N/A',
            'emailAddress' => $this->request->getVar('emailAddress') ?? 'N/A',
            'contactNumber' => $this->request->getVar('contactNumber') ?? 'N/A',
            'yescuremployed' => $this->request->getVar('yescuremployed') ?? 'N/A',
            'nocuremployed' => $this->request->getVar('nocuremployed') ?? 'N/A',
            'allowed' => $this->request->getVar('allowed') ?? 'N/A',
            'notallowed' => $this->request->getVar('notallowed') ?? 'N/A',
            'ifnoProvdtls' => $this->request->getVar('ifnoProvdtls') ?? 'N/A',
            'persontonotif' => $this->request->getVar('persontonotif'),
            'moNo' => $this->request->getVar('moNo'),
            'n1' => $this->request->getVar('n1'),
            'p1' => $this->request->getVar('p1'),
            'c1' => $this->request->getVar('c1'),
            'e1' => $this->request->getVar('e1'),
            'n2' => $this->request->getVar('n2'),
            'p2' => $this->request->getVar('p2'),
            'c2' => $this->request->getVar('c2'),
            'e2' => $this->request->getVar('e2'),
            'n3' => $this->request->getVar('n3'),
            'p3' => $this->request->getVar('p3'),
            'c3' => $this->request->getVar('c3'),
            'e3' => $this->request->getVar('e3'),
            'g1y' => $this->request->getVar('g1y'),
            'g1n' => $this->request->getVar('g1n'),
            'accused' => $this->request->getVar('accused'),
            'g2y' => $this->request->getVar('g2y'),
            'g2n' => $this->request->getVar('g2n'),
            'bankruptcy' => $this->request->getVar('bankruptcy'),
            'g3y' => $this->request->getVar('g3y'),
            'g3n' => $this->request->getVar('g3n'),
            'investigated' => $this->request->getVar('investigated'),
            'g4y' => $this->request->getVar('g4y'),
            'g4n' => $this->request->getVar('g4n'),
            'terminat' => $this->request->getVar('terminated'),
            'printedName' => $this->request->getVar('printedName'),
            'botdate' => $this->request->getVar('botdate')
        ];
        if ($existingUser) {
            $link = 'ViewAppForm/' . $token . '';
            $message = $role . ' ' . $username . ' has updated their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            // Insert new record
            $this->form1->set($data)->where('user_id', $userId)->update();
        } else {
            $link = 'ViewAppForm/' . $token . '';
            $message = $role . ' ' . $username . ' has save their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form1->insert($data);
        }
        // Redirect back with a status message
        return redirect()->back()->with('status', 'Form saved successfully');
    }

    public function form3sv()
    {
        $session = session();
        // Retrieve user_id from the session
        $userId = $session->get('id');
        $username = $session->get('username');
        $token = $session->get('token');
        $role = $session->get('role');

        // Prepare the data array
        $data = [
            'applicant_id' => $userId,
            'app_gli_token' => $token,
            'lastName' => $this->request->getVar('lastName'),
            'firstName' => $this->request->getVar('firstName'),
            'middleName' => $this->request->getVar('middleName'),
            'dateOfBirth' => $this->request->getVar('dateOfBirth'),
            'occupation' => $this->request->getVar('occupation'),
            'companyName' => $this->request->getVar('companyName'),
            'businessNature' => $this->request->getVar('businessNature'),
            'sex' => $this->request->getVar('sex'),
            'civilStatus' => $this->request->getVar('civilStatus'),
            'nationality' => $this->request->getVar('nationality'),
            'residenceAddress' => $this->request->getVar('residenceAddress'),
            'residenceTelephone' => $this->request->getVar('residenceTelephone'),
            'businessAddress' => $this->request->getVar('businessAddress'),
            'businessTelephone' => $this->request->getVar('businessTelephone'),
            'firstName1' => $this->request->getVar('firstName1'),
            'mi1' => $this->request->getVar('mi1'),
            'lastName1' => $this->request->getVar('lastName1'),
            'month1' => $this->request->getVar('month1'),
            'day1' => $this->request->getVar('day1'),
            'year1' => $this->request->getVar('year1'),
            'relationship1' => $this->request->getVar('relationship1'),
            'remarks1' => $this->request->getVar('remarks1'),
            'firstName2' => $this->request->getVar('firstName2'),
            'mi2' => $this->request->getVar('mi2'),
            'lastName2' => $this->request->getVar('lastName2'),
            'month2' => $this->request->getVar('month2'),
            'day2' => $this->request->getVar('day2'),
            'year2' => $this->request->getVar('year2'),
            'relationship2' => $this->request->getVar('relationship2'),
            'remarks2' => $this->request->getVar('remarks2'),
            'firstName3' => $this->request->getVar('firstName3'),
            'mi3' => $this->request->getVar('mi3'),
            'lastName3' => $this->request->getVar('lastName3'),
            'month3' => $this->request->getVar('month3'),
            'day3' => $this->request->getVar('day3'),
            'year3' => $this->request->getVar('year3'),
            'relationship3' => $this->request->getVar('relationship3'),
            'remarks3' => $this->request->getVar('remarks3'),
            'firstName4' => $this->request->getVar('firstName4'),
            'mi4' => $this->request->getVar('mi4'),
            'lastName4' => $this->request->getVar('lastName4'),
            'month4' => $this->request->getVar('month4'),
            'day4' => $this->request->getVar('day4'),
            'year4' => $this->request->getVar('year4'),
            'relationship4' => $this->request->getVar('relationship4'),
            'remarks4' => $this->request->getVar('remarks4'),
            'trusteeMinorBeneficiary' => $this->request->getVar('trusteeMinorBeneficiary'),
            'place' => $this->request->getVar('place'),
            'day' => $this->request->getVar('day'),
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'applicantSignature' => $this->request->getVar('applicantSignature'),
        ];

        // Check if the applicant_id exists in the database
        $existingApplicant = $this->form3->where('applicant_id', $userId)->first();

        if ($existingApplicant) {
            $link = 'ViewAppForm3/' . $token . '';
            $message = $role . ' ' . $username . ' has updated their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form3->set($data)->where('applicant_id', $userId)->update();
        } else {
            // Insert new record
            $link = 'ViewAppForm3/' . $token . '';
            $message = $role . ' ' . $username . ' has updated their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form3->insert($data);
        }
        return redirect()->back()->with('status', 'Form saved successfully');
    }


    public function AppForm2()
    {
        $data = array_merge($this->getData(), $this->getDataApp(), $this->getform2Data());
        return view('Applicant/AppForm2', $data);
    }
    public function AppForm3()
    {
        $data = array_merge($this->getData(), $this->getDataApp(), $this->getform3Data());
        return view('Applicant/AppForm3', $data);
    }
    public function AppForm4()
    {
        $data = array_merge($this->getData(), $this->getDataApp(), $this->getform4Data());
        return view('Applicant/AppForm4', $data);
    }
    public function AppForm5()
    {
        $data = array_merge($this->getData(), $this->getDataApp(), $this->getform5Data());
        return view('Applicant/AppForm5', $data);
    }

    public function FA()
    {
        $data = array_merge($this->getData(), $this->getDataApp());
        // Get the search input from the form
        $filterUser = $this->request->getPost('searchfa');

        // If $filterUser is not empty, add a where condition to filter records
        if (!empty($filterUser)) {
            $agents = $this->agent->like('username', $filterUser)->paginate(10, 'group1'); // Adjust the limit as needed
        } else {
            // If no filter, retrieve all agents with pagination
            $agents = $this->agent->paginate(10, 'group1'); // Adjust the limit as needed
        }

        // Correctly assign the pager
        $data['pager'] = $this->agent->pager;
        $data['agents'] = $agents;
        return view('Applicant/FA', $data);
    }

    public function form2sv()
    {
        $session = session();
        // Retrieve user_id from the session
        $userId = $session->get('id');
        $username = $session->get('username');
        $token = $session->get('token');
        $role = $session->get('role');

        $data = [
            'applicant_id' => $userId,
            'aial_token' => $token,
            'nonLife' => $this->request->getVar('nonLife'),
            'life' => $this->request->getVar('life'),
            'variableLife' => $this->request->getVar('variableLife'),
            'accidentAndHealth' => $this->request->getVar('accidentAndHealth'),
            'others' => $this->request->getVar('others'),
            'othersSpecification' => $this->request->getVar('othersSpecification'),
            'agencyName' => $this->request->getVar('agencyName'),
            'surname' => $this->request->getVar('surname'),
            'firstName' => $this->request->getVar('firstName'),
            'middleName' => $this->request->getVar('middleName'),
            'agentType' => $this->request->getVar('agentType'),
            'homeAddress' => $this->request->getVar('homeAddress'),
            'zipCode' => $this->request->getVar('zipCode'),
            'businessAddress' => $this->request->getVar('businessAddress'),
            'tin' => $this->request->getVar('tin'),
            'email' => $this->request->getVar('email'),
            'mobileNumber' => $this->request->getVar('mobileNumber'),
            'birthDate' => $this->request->getVar('birthDate'),
            'birthPlace' => $this->request->getVar('birthPlace'),
            'citizenship' => $this->request->getVar('citizenship'),
            'sex' => $this->request->getVar('sex'),
            'civilStatus' => $this->request->getVar('civilStatus'),
            'maidenName' => $this->request->getVar('maidenName'),
            'husbandsName' => $this->request->getVar('husbandsName'),
            'naturalizationDetails' => $this->request->getVar('naturalizationDetails'),
            'foreignerDetails' => $this->request->getVar('foreignerDetails'),
            'certifiedCopyDetails' => $this->request->getVar('certifiedCopyDetails'),
            'filipinoParticipation' => $this->request->getVar('filipinoParticipation'),
            'company1' => $this->request->getVar('company1'),
            'licenseType1' => $this->request->getVar('licenseType1'),
            'licenseNo1' => $this->request->getVar('licenseNo1'),
            'yearIssued1' => $this->request->getVar('yearIssued1'),
            'company2' => $this->request->getVar('company2'),
            'licenseType2' => $this->request->getVar('licenseType2'),
            'licenseNo2' => $this->request->getVar('licenseNo2'),
            'yearIssued2' => $this->request->getVar('yearIssued2'),
            'company3' => $this->request->getVar('company3'),
            'licenseType3' => $this->request->getVar('licenseType3'),
            'licenseNo3' => $this->request->getVar('licenseNo3'),
            'yearIssued3' => $this->request->getVar('yearIssued3'),
            'taxReturnFiled' => $this->request->getVar('taxReturnFiled'),
            'taxReturnNotFiledReason' => $this->request->getVar('taxReturnNotFiledReason'),
            'employer1' => $this->request->getVar('employer1'),
            'position1' => $this->request->getVar('position1'),
            'dates1' => $this->request->getVar('dates1'),
            'employer2' => $this->request->getVar('employer2'),
            'position2' => $this->request->getVar('position2'),
            'dates2' => $this->request->getVar('dates2'),
            'insuranceEmployee' => $this->request->getVar('insuranceEmployee'),
            'positionHeld' => $this->request->getVar('positionHeld'),
            'governmentEmployee' => $this->request->getVar('governmentEmployee'),
            'date' => $this->request->getVar('date'),
            'month2' => $this->request->getVar('month2'),
            'year' => $this->request->getVar('year'),
            'place' => $this->request->getVar('place'),
            'applicantName' => $this->request->getVar('applicantName'),
            'provinceCity' => $this->request->getVar('provinceCity'),
            'affiant' => $this->request->getVar('affiant'),
            'tin2' => $this->request->getVar('tin2'),
            'sss' => $this->request->getVar('sss'),
            'day' => $this->request->getVar('day'),
            'month' => $this->request->getVar('month'),
            'year2' => $this->request->getVar('year2'),
            'exhibit' => $this->request->getVar('exhibit'),
            'applicant' => $this->request->getVar('applicant'),
            'companyName' => $this->request->getVar('companyName'),
            'place2' => $this->request->getVar('place2'),
            'date2' => $this->request->getVar('date2'),
            'authorizedRepresentative' => $this->request->getVar('authorizedRepresentative'),
        ];

        // Check if the user_id exists in the form2 table
        $existingRecord = $this->form2->where('user_id', $userId)->first();

        if ($existingRecord) {
            $link = 'ViewAppForm2/' . $token . '';
            $message = $role . ' ' . $username . ' has updated their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            // Update existing record
            $this->form2->set($data)->where('user_id', $userId)->update();
        } else {
            // Insert new record
            $data['user_id'] = $userId;
            $link = 'ViewAppForm2/' . $token . '';
            $message = $role . ' ' . $username . ' has save their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form2->insert($data);
        }

        return redirect()->back()->with('status', 'Form saved successfully');
    }

    public function form4sv()
    {
        $session = session();
        // Retrieve user_id from the session
        $userId = $session->get('id');
        $username = $session->get('username');
        $token = $session->get('token');
        $role = $session->get('role');

        $data = [
            'applicant_id' => $userId,
            'app_aonff_token' => $token,
            'name' => $this->request->getVar('name'),
            'place' => $this->request->getVar('place'),
            'reason' => $this->request->getVar('reason'),
            'day' => $this->request->getVar('day'),
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'affiant' => $this->request->getVar('affiant'),
            'ctc_no' => $this->request->getVar('ctc_no'),
            'witness_place' => $this->request->getVar('witness_place'),
            'ctc_issue_date' => $this->request->getVar('ctc_issue_date'),
            'ctc_issue_place' => $this->request->getVar('ctc_issue_place'),
            'sworn_day' => $this->request->getVar('sworn_day'),
            'sworn_month' => $this->request->getVar('sworn_month'),
            'sworn_year' => $this->request->getVar('sworn_year'),
            'sworn_place' => $this->request->getVar('sworn_place'),
        ];
        $existingRecord = $this->form4->where('applicant_id', $userId)->first();
        if ($existingRecord) {
            $link = 'ViewAppForm4/' . $token . '';
            $message = $role . ' ' . $username . ' has updated their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            // Update existing record
            $this->form4->set($data)->where('applicant_id', $userId)->update();
        } else {
            // Insert new record
            $data['applicant_id'] = $userId; // Make sure to set the user_id for the new record
            $link = 'ViewAppForm4/' . $token . '';
            $message = $role . ' ' . $username . ' has save their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form4->insert($data);
        }
        return redirect()->back()->with('status', 'Form saved successfully');
    }

    public function form5sv()
    {
        $session = session();
        // Retrieve user_id from the session
        $userId = $session->get('id');
        $username = $session->get('username');
        $token = $session->get('token');
        $role = $session->get('role');

        $data = [
            'applicant_id' => $userId,
            'app_sou_token' => $token,
            'name' => $this->request->getVar('name'),
            'position' => $this->request->getVar('position'),
            'printedname' => $this->request->getVar('printedname'),
        ];
        $existingRecord = $this->form5->where('applicant_id', $userId)->first();
        if ($existingRecord) {
            // Update existing record
            $link = 'ViewAppForm5/' . $token . '';
            $message = $role . ' ' . $username . ' has updated their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form5->set($data)->where('applicant_id', $userId)->update();
        } else {
            // Insert new record
            $data['applicant_id'] = $userId; // Make sure to set the user_id for the new record
            $link = 'ViewAppForm5/' . $token . '';
            $message = $role . ' ' . $username . ' has save their form. Please click the link to see';
            $r = 'admin';
            $this->notificationcontroller->newnotif($userId, $link, $message, $r);
            $this->form5->insert($data);
        }
        return redirect()->back()->with('status', 'Form saved successfully');
    }
}