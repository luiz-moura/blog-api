<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'					=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
				'auto_increment'	=> true,
			],
			'name'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 45,
        'unique'         	=> true,
			],
			'description'	=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 135,
			],
			'status'			=> [
				// MYSQL
				// 'type'						=> 'ENUM',
				// 'constraint'			=> ['active', 'inactive'],
        // PGSQL
        'type'						=> 'status_active',
				'default'					=> 'active',
			],
			'created_at'	=> [
				'type'						=> 'DATETIME',
			],
			'updated_at'	=> [
				'type'						=> 'DATETIME',
			],
      'deleted_at'	=> [
				'type'						=> 'DATETIME',
        'null'            => true,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('roles');
	}

	public function down()
	{
		$this->forge->dropTable('roles');
	}
}
