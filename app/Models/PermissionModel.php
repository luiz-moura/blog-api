<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'permissions';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
    'role',
    'name',
    'allowed',
    'create',
    'read',
    'update',
    'delete',
  ];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
    'role'            => 'required|integer',
    'name'            => 'required|string|min_length[3]|max_length[45]',
    'allowed'         => 'permit_empty|integer',
    'create'          => 'permit_empty|integer',
    'read'            => 'permit_empty|integer',
    'update'          => 'permit_empty|integer',
    'delete'          => 'permit_empty|integer',
  ];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
