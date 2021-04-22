<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
  protected $table      = 'adresses';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = ['city', 'user', 'street', 'neighborhood', 'complement', 'number', 'zip_code', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'city'          => 'required|integer',
    'user'          => 'required|integer',
    'street'        => 'required|string|min_length[3]|max_length[135]',
    'neighborhood'  => 'required|string|min_length[3]|max_length[135]',
    'complement'    => 'permit_empty|string|min_length[3]|max_length[135]',
    'number'        => 'required|alpha_numeric_space',
    'zip_code'      => 'required|alpha_numeric_space',
    'status'        => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
