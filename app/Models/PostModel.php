<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'object';
    protected $useSoftDelete = true;
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

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'image' => 'permit_empty|integer',
        'author' => 'required|integer',
        'title' => 'required|string|max_length[270]',
        'subtitle' => 'permit_empty|string|max_length[540]',
        'description' => 'permit_empty|string|max_length[1080]',
        'content' => 'permit_empty|string',
        'comments_status' => 'permit_empty|alpha',
        'type' => 'permit_empty|alpha',
        'slug' => 'required|alpha_dash|is_unique[posts.slug,id,{id}]|max_length[135]',
        'status' => 'permit_empty|alpha',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
