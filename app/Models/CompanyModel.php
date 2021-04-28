<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'companies';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['name', 'description', 'email'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
    'name'            => 'required|string|max_length[135]',
    'description'     => 'required|string|max_length[540]',
    'email'           => 'required|valid_email|is_unique[users.email,id,{id}]|max_length[135]',
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
