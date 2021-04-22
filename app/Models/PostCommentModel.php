<?php

namespace App\Models;

use CodeIgniter\Model;

class PostCommentModel extends Model
{
  protected $table      = 'post_comments';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $protectFields = true;
  protected $allowedFields = ['author', 'post', 'parent', 'content', 'slug', 'status'];

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules  = [
    'author'      => 'permit_empty|integer',
    'post'        => 'permit_empty|integer',
    'parent'      => 'permit_empty|integer',
    'content'     => 'permit_empty|string',
    'slug'        => 'required|alpha_dash|is_unique[post_comments.slug,id,{id}]',
    'status'      => 'permit_empty|alpha',
  ];
  protected $skipValidation   = false;
}
