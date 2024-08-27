<?php

namespace App\Models;

use CodeIgniter\Model;

class Form4Model extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aonff';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'applicant_id',
        'app_aonff_token',
        'name',
        'place',
        'reason',
        'day',
        'month',
        'year',
        'affiant',
        'ctc_no',
        'witness_place',
        'ctc_issue_date',
        'ctc_issue_place',
        'sworn_day',
        'sworn_month',
        'sworn_year',
        'sworn_place',
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
