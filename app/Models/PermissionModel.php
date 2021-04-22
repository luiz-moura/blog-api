<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
  protected $table      = 'permissions';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = [
    'role', 'name', 'allowed', 'create', 'read', 'update', 'delete'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'role'            => 'required|integer',
    'name'            => 'required|string|min_length[3]|max_length[45]',
    'allowed'         => 'permit_empty|integer',
    'create'          => 'permit_empty|integer',
    'read'            => 'permit_empty|integer',
    'update'          => 'permit_empty|integer',
    'delete'          => 'permit_empty|integer',
  ];
  protected $skipValidation   = false;
}
