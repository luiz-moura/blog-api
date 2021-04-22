<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
  protected $table      = 'states';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['country', 'name', 'initials'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'country'     => 'required|string',
    'name'        => 'required|string',
    'initials'    => 'required|alpha_numeric',
    'status'      => 'permit_empty|alpha|is_unique[states.slug,id,{id}]',
  ];
  protected $skipValidation   = false;
}
