<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
  protected $table      = 'posts';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = [
    'image',
    'author',
    'title',
    'subtitle',
    'description',
    'content',
    'comments_status',
    'type',
    'slug',
    'status',
  ];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'image'           => 'permit_empty|integer',
    'author'          => 'required|integer',
    'title'           => 'required|string|max_length[270]',
    'subtitle'        => 'permit_empty|string|max_length[540]',
    'description'     => 'permit_empty|string|max_length[1080]',
    'content'         => 'permit_empty|string',
    'comments_status' => 'permit_empty|alpha',
    'type'            => 'permit_empty|alpha',
    'slug'            => 'required|alpha_dash|is_unique[posts.slug,id,{id}]',
    'status'          => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
