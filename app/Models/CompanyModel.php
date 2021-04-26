<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
  protected $table      = 'company';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['name', 'description'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'name'          => 'required|string',
    'description'   => 'required|string',
  ];
  protected $skipValidation   = false;
}
