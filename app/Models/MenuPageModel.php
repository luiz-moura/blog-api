<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuPageModel extends Model
{
  protected $table      = 'menu_pages';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['menu', 'parent', 'title', 'type', 'sequence', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'menu'        => 'required|integer',
    'parent'      => 'permit_empty|integer',
    'title'       => 'required|string',
    'type'        => 'required|alpha',
    'sequence'    => 'required|integer',
    'status'      => 'required|alpha',
  ];
  protected $skipValidation   = false;
}
