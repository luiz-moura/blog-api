<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'adresses';
    protected $returnType = 'object';
    protected $useSoftDelete = true;
    protected $useTimestamps = true;

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
}
