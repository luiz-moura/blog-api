<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
  protected $table      = 'roles';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = ['name', 'description', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'name'        => 'required|string|max_length[135]',
    'description' => 'required|string|max_length[135]',
    'status'      => 'permit_empty|alpha|is_unique[roles.slug,id,{id}]',
  ];
  protected $skipValidation   = false;
}
