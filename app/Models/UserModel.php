<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
    'avatar',
    'default_shipping',
    'first_name',
    'last_name',
    'cpf',
    'birth_date',
    'gender',
    'phone',
    'email',
    'password',
    'activation_code',
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
    'avatar'            => 'permit_empty|integer',
    'default_shipping'  => 'permit_empty|integer',
    'first_name'        => 'required|string|min_length[2]|max_length[45]',
    'last_name'         => 'required|string|min_length[2]|max_length[45]',
    'cpf'               => 'required|string|max_length[20]',
    'birth_date'        => 'required|valid_date',
    'gender'            => 'required|alpha',
    'phone'             => 'required|string|max_length[20]',
    'email'             => 'required|valid_email|is_unique[users.email,id,{id}]|max_length[135]',
    'password'          => 'required|string|min_length[6]|max_length[135]',
    'pass_confirm'      => 'required_with[password]|matches[password]',
    'status'            => 'permit_empty|alpha',
  ];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ['passwordHash'];
	protected $afterInsert          = ['passwordHash'];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

  protected function passwordHash(array $data){
    if (isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);

    return $data;
  }

  // Custom
  public function findUserByEmail(string $email)
  {
    $user = $this->where(array('email' => $email))->asObject()->first();

    if (!$user)
      throw new Exception('User does not exist for specified email address');

    return $user;
  }
}
