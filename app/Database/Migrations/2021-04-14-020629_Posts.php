<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'image' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'author' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 270,
            ],
            'subtitle' => [
                'type' => 'VARCHAR',
                'constraint' => 540,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 1080,
            ],
            'content' => [
                'type' => 'text',
            ],
            'type' => [
                // MYSQL
                // 'type'						=> 'ENUM',
                // 'constraint'    	=> ['post', 'page'],
                // PGSQL
                'type' => 'post_type',
                'default' => 'post',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 135,
                'unique' => true,
            ],
            'comments_status' => [
                // MYSQL
                // 'type'						=> 'ENUM',
                // 'constraint'			=> ['active', 'inactive'],
                // PGSQL
                'type' => 'status_active',
                'default' => 'active',
            ],
            'status' => [
                // MYSQL
                // 'type'						=> 'ENUM',
                // 'constraint'			=> ['active', 'inactive', 'pending'],
                // PGSQL
                'type' => 'status_with_pending',
                'default' => 'active',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('image', 'files', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('author', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
