<?php

namespace App\Models;

use CodeIgniter\Model;

class Form3Model extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'gli';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'applicant_id',
        'app_gli_token',
        'lastName',
        'firstName',
        'middleName',
        'dateOfBirth',
        'occupation',
        'companyName',
        'businessNature',
        'sex',
        'civilStatus',
        'nationality',
        'residenceAddress',
        'residenceTelephone',
        'businessAddress',
        'businessTelephone',
        'firstName1',
        'mi1',
        'lastName1',
        'month1',
        'day1',
        'year1',
        'relationship1',
        'remarks1',
        'firstName2',
        'mi2',
        'lastName2',
        'month2',
        'day2',
        'year2',
        'relationship2',
        'remarks2',
        'firstName3',
        'mi3',
        'lastName3',
        'month3',
        'day3',
        'year3',
        'relationship3',
        'remarks3',
        'firstName4',
        'mi4',
        'lastName4',
        'month4',
        'day4',
        'year4',
        'relationship4',
        'remarks4',
        'trusteeMinorBeneficiary',
        'place',
        'day',
        'month',
        'year',
        'applicantSignature'
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
