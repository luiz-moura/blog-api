<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
  protected $table      = 'menus';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = ['title', 'position', 'sequence', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'title'       => 'required|string',
    'position'    => 'required|alpha',
    'sequence'    => 'required|integer',
    'status'      => 'required|alpha',
  ];
  protected $skipValidation   = false;
}
