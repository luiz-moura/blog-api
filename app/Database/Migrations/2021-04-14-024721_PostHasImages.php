<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostHasImages extends Migration
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
            'post' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'image' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('post', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('image', 'files', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('post_has_images');
    }

    public function down()
    {
        $this->forge->dropTable('post_has_images');
    }
}
