<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
  protected $table      = 'cities';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['state', 'name', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'state'       => 'required|integer',
    'name'        => 'required|string',
    'status'      => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
