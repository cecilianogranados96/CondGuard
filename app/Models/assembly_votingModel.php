<?php

namespace App\Models;

use CodeIgniter\Model;

class assembly_votingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'assembly_voting';
    protected $primaryKey       = 'assembly_voting_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true; //false;
    #protected $protectFields    = true;
    protected $allowedFields    = ['description', 'question', 'up_votes', 'down_votes', 'total_votes', 'status'];

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