<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
  protected $table      = 'countries';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['name', 'initials', 'initials3', 'code'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'name'        => 'required|string',
    'initials'    => 'required|string',
    'initials3'   => 'required|string',
    'code'        => 'required|alpha_numeric',
    'status'      => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
