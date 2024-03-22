<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'adresses';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'object';
    protected $useSoftDelete = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'city',
        'user',
        'street',
        'neighborhood',
        'complement',
        'number',
        'zip_code',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'city' => 'required|integer',
        'user' => 'required|integer',
        'street' => 'required|string|min_length[3]|max_length[135]',
        'neighborhood' => 'required|string|min_length[3]|max_length[135]',
        'complement' => 'permit_empty|string|min_length[3]|max_length[135]',
        'number' => 'required|alpha_numeric_space|max_length[20]',
        'zip_code' => 'required|alpha_numeric_space|max_length[20]',
        'status' => 'permit_empty|alpha',
    ];
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
