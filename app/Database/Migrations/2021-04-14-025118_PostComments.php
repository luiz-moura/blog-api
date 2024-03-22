<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostComments extends Migration
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
            'author' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'post' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'parent' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'content' => [
                'type' => 'VARCHAR',
                'constraint' => 540,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 135,
                'unique' => true,
            ],
            'status' => [
                // MYSQL
                // 'type'						=> 'ENUM',
                // 'constraint'			=> ['approved', 'pending', 'spam'],
                // PGSQL
                'type' => 'status_comment',
                'default' => 'pending',
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
        $this->forge->addForeignKey('author', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('post', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('post_comments');
    }

    public function down()
    {
        $this->forge->dropTable('post_comments');
    }
}
