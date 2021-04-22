<?php

namespace App\Models;

use CodeIgniter\Model;

class PostCategoryModel extends Model
{
  protected $table      = 'post_categories';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = ['parent', 'image', 'name', 'description', 'slug', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'parent'      => 'permit_empty|integer',
    'image'       => 'permit_empty|integer',
    'name'        => 'required|string',
    'description' => 'permit_empty|string',
    'slug'        => 'required|alpha_dash|is_unique[post_categories.slug,id,{id}]',
    'status'      => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
