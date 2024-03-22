<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Widgets extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 135,
            ],
            'content' => [
                'type' => 'text',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'sequence' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'status' => [
                // MYSQL
                // 'type'						=> 'ENUM',
                // 'constraint'			=> ['active', 'inactive'],
                // PGSQL
                'type' => 'status_active',
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
        $this->forge->createTable('widgets');
    }

    public function down()
    {
        $this->forge->dropTable('widgets');
    }
}
