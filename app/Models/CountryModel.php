<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'countries';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
    'name',
    'initials',
    'initials_three',
    'code',
    'status',
  ];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
    'name'            => 'required|string|max_length[90]',
    'initials'        => 'required|string|max_length[2]',
    'initials_three'  => 'required|string|max_length[3]',
    'code'            => 'required|alpha_numeric|max_length[5]',
    'status'          => 'permit_empty|alpha',
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
