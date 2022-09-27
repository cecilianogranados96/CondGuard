<?php

namespace App\Models;

use CodeIgniter\Model;

class relativeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'relative';
    protected $primaryKey       = 'relative_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true; //false;
    #protected $protectFields    = true;
    protected $allowedFields    = ['identity', 'name', 'email', 'password', 'phone', 'entry_at', 'out_at', 'can_reserve'];

    // Dates
    protected $useTimestamps = true; //false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    #protected $cleanValidationRules = true;

    // Callbacks
    /*
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    */
}