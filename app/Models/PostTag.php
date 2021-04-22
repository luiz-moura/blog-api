<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
  protected $table      = 'files';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['name', 'description', 'slug', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'name'        => 'required|string',
    'description' => 'required|string',
    'slug'        => 'required|alpha_dash|is_unique[post_categories.slug,id,{id}',
    'status'      => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
