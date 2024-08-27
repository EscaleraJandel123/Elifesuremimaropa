<?php

namespace App\Models;

use CodeIgniter\Model;

class Form2Model extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aial';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'username',
        'user_id',
        'aial_token',
        'nonLife',
        'life',
        'variableLife',
        'accidentAndHealth',
        'others',
        'othersSpecification',
        'agencyName',
        'surname',
        'firstName',
        'middleName',
        'agentType',
        'homeAddress',
        'zipCode',
        'businessAddress',
        'tin',
        'email',
        'mobileNumber',
        'birthDate',
        'birthPlace',
        'citizenship',
        'sex',
        'civilStatus',
        'maidenName',
        'husbandsName',
        'naturalizationDetails',
        'foreignerDetails',
        'certifiedCopyDetails',
        'filipinoParticipation',
        'company1',
        'licenseType1',
        'licenseNo1',
        'yearIssued1',
        'company2',
        'licenseType2',
        'licenseNo2',
        'yearIssued2',
        'company3',
        'licenseType3',
        'licenseNo3',
        'yearIssued3',
        'taxReturnFiled',
        'taxReturnNotFiledReason',
        'employer1',
        'position1',
        'dates1',
        'employer2',
        'position2',
        'dates2',
        'insuranceEmployee',
        'positionHeld',
        'governmentEmployee',
        'date',
        'month2',
        'year',
        'place',
        'applicantName',
        'provinceCity',
        'affiant',
        'tin2',
        'sss',
        'day',
        'month',
        'year2',
        'exhibit',
        'applicant',
        'companyName',
        'place2',
        'date2',
        'authorizedRepresentative',
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