<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cities extends Migration
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
			'state'				=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
			],
			'name'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 45,
			],
			'status'			=> [
				'type'						=> 'ENUM',
				'constraint'			=> ['active', 'inactive'],
				'default'					=> 'active',
			],
			'created_at'	=> [
				'type'						=> 'DATETIME',
			],
			'updated_at'	=> [
				'type'						=> 'DATETIME',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('state', 'states', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('cities');
	}

	public function down()
	{
		$this->forge->dropTable('cities');
	}
}
