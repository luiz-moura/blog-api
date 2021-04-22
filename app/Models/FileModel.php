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
  protected $allowedFields = ['path', 'name'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'path' => 'required|string|is_unique[files.path,id,{id}]',
    'name' => 'required|string|min_length[3]',
  ];
  protected $skipValidation   = false;
}
