<?php

namespace App\Models;

use CodeIgniter\Model;

class relative_vehicleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'relative_vehicle';
    protected $primaryKey       = 'relative_vehicle_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true; //false;
    #protected $protectFields    = true;
    protected $allowedFields    = ['identity', 'vehicle_plate', 'name', 'land_number', 'phone', 'entry_at', 'out_at', 'created_at', 'updated_at', 'deleted_at'];

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