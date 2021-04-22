<?php

namespace App\Models;

use CodeIgniter\Model;

class PostHasCategoryModel extends Model
{
  protected $table      = 'post_has_categories';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['post', 'category'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'post'      => 'required|integer',
    'category'  => 'required|integer',
  ];
  protected $skipValidation   = false;
}
