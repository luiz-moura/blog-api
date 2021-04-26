<?php

namespace App\Models;

use CodeIgniter\Model;

class WidgetModel extends Model
{
  protected $table      = 'widgets';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = false;

  protected $protectFields = true;
  protected $allowedFields = ['title', 'content', 'type', 'position', 'sequence', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules  = [
    'title'       => 'required|string',
    'content'     => 'permit_empty|string',
    'type'        => 'required|alpha_numeric',
    'position'    => 'required|alpha',
    'sequence'    => 'required|integer',
    'status'      => 'required|alpha',
  ];
  protected $skipValidation   = false;
}
