<?php

namespace App\Models;

use CodeIgniter\Model;

class PostHasTag extends Model
{
  protected $table      = 'post_has_tags';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['post', 'tag'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'post'      => 'required|integer',
    'tag'       => 'required|integer',
  ];
  protected $skipValidation   = false;
}
