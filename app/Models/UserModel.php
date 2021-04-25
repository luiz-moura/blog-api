<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;
use \Tatter\Relations\Traits\ModelTrait;

class UserModel extends Model
{
  protected $table      = 'users';
  protected $primaryKey = 'id';
  protected $with = 'files';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = [
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

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'avatar'            => 'permit_empty|integer',
    'default_shipping'  => 'permit_empty|integer',
    'first_name'        => 'required|alpha|min_length[3]|max_length[45]',
    'last_name'         => 'required|alpha|min_length[3]|max_length[45]',
    'cpf'               => 'required|string',
    'birth_date'        => 'required|valid_date',
    'gender'            => 'required|alpha',
    'phone'             => 'required|alpha_numeric_punct|max_length[20]',
    'email'             => 'required|valid_email|is_unique[users.email,id,{id}]|max_length[135]',
    'password'          => 'required|min_length[6]|max_length[135]',
    'pass_confirm'      => 'required_with[password]|matches[password]',
    'status'            => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;

  # Password
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    return $data;
  }

  protected function beforeUpdate(array $data){
    $data = $this->passwordHash($data);
    return $data;
  }

  protected function passwordHash(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
    return $data;
  }

  public function findUserByEmail(string $email)
  {
    $user = $this->where(array('email' => $email))->asObject()->first();

    if (!$user)
      throw new Exception('User does not exist for specified email address');

    return $user;
  }
}
