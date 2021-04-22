<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class States extends Migration
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
			'country'			=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
			],
			'name'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 45,
			],
			'initials'		=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 3,
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
		$this->forge->addForeignKey('country', 'countries', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('states');
	}

	public function down()
	{
		$this->forge->dropTable('states');
	}
}
