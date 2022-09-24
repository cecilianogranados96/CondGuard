<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true; //false;
    #protected $protectFields    = true;
    protected $allowedFields    = ['identity', 'name', 'email', 'password', 'phone', 'land_number', 'payment', 'user_role', 'status'];

    // Dates
    protected $useTimestamps = true; //false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    /*
    // Validation
    protected $validationRules      = [
        'identity' => 'required|min_length[9]|numeric|is_unique[user.identity]',
        'name' => 'required|alpha_numeric_space|min_length[10]|max_length[50]',
        'email' => 'valid_email|is_unique[user.email]|permit_empty',
        'password' => 'required|min_length[8]|max_length[50]|alpha_numeric_punct|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/]',
        'phone' => 'numeric|min_length[8]|is_unique[user.phone]|permit_empty',
        'land_number' => 'alpha_numeric|permit_empty',
        'payment' => 'numeric|permit_empty',
        'user_role' => 'required|alpha_numeric|',
        'status' => 'required|alpha_numeric'
    ];
    protected $validationMessages   = [
        'identity' => [
            'required' => 'La identificacion es un dato requerido',
            'min_length' => 'La identificacion debe contener al menos 9 digitos',
            'numeric' => 'La identificacion debe contener solo datos numericos',
            'is_unique' => 'Ya existe un usuario con esa identificacion'
        ],
        'name' => [
            'required' => 'Se requiere del nombre completo',
            'alpha_numeric_space' => '',
            'min_length',
            'max_length'
        ],
        'email' => 'valid_email|is_unique[user.email]|permit_empty',
        'password' => 'required|min_length[8]|max_length[50]|alpha_numeric_punct',
        'phone' => 'numeric|min_length[8]|is_unique[user.phone]|permit_empty',
        'land_number' => 'alpha_numeric|permit_empty',
        'payment' => 'numeric|permit_empty',
        'user_role' => 'required|alpha_numeric|',
        'status' => 'required|alpha_numeric'
    ];
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
/*
protected $validationRules    = [
    'name' => 'required|alpha_numeric_space|min_length[3]',
    'email' => 'required|valid_email' //|is_unique[users.email]'

];
protected $validationMessages = [
    'email' => [
        'is_unique' => 'Lo sentimos tu correo ya esta siendo usado por otro usuarios',
        'required' => 'EL email es un dato requerido',
        'valid_email' => 'El email es invalido'
    ]
];*/