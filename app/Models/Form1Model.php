<?php

namespace App\Models;

use CodeIgniter\Model;

class Form1Model extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'lifechangerform';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id',
        'position',
        'preferredArea',
        'referral',
        'referralBy',
        'onlineAd',
        'walkIn',
        'othersRef',
        'fname',
        'nickname',
        'birthdate',
        'placeOfBirth',
        'gender',
        'bloodType',
        'homeAddress',
        'mobileNo',
        'landline',
        'email',
        'citizenship',
        'othersCitizenship',
        'naturalizationInfo',
        'maritalStatus',
        'maidenName',
        'spouseName',
        'sssNo',
        'tin',


        'lifeInsuranceExperience',
        'traditional',
        'variable',
        'recentInsuranceCompany',

        'highSchool',
        'highSchoolCourse',
        'highSchoolYear',

        'college',
        'collegeCourse',
        'collegeYear',
        'graduateSchool',
        'graduateCourse',
        'graduateYear',

        'companyName1',
        'position1',
        'employmentFrom1',
        'employmentTo1',
        'reason1',

        'companyName2',
        'position2',
        'employmentFrom2',
        'employmentTo2',
        'reason2',

        'companyName3',
        'position3',
        'employmentFrom3',
        'employmentTo3',
        'reason3',

        'companyName',
        'resposition',
        'contactName',
        'contactPosition',
        'emailAddress',
        'contactNumber',
        'yescuremployed',
        'nocuremployed',
        'allowed',
        'notallowed',
        'ifnoProvdtls',
        'app_life_token',
        'username',


        'persontonotif',
        'moNo',
        'n1',
        'p1',
        'c1',
        'e1',
        'n2',
        'p2',
        'c2',
        'e2',
        'n3',
        'p3',
        'c3',
        'e3',
        'g1y',
        'g1n',
        'accused',
        'g2y',
        'g2n',
        'bankruptcy',
        'g3y',
        'g3n',
        'investigated',
        'g4y',
        'g4n',
        'terminat',
        'printedName',
        'botdate',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
