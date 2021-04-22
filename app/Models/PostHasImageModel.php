<?php

namespace App\Models;

use CodeIgniter\Model;

class PostHasImageModel extends Model
{
  protected $table      = 'post_has_images';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['post', 'image'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'post'      => 'required|integer',
    'image'     => 'required|integer',
  ];
  protected $skipValidation   = false;
}
