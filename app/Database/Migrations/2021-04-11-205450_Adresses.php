<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adresses extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'						=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
				'auto_increment'	=> true,
			],
			'city'					=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
			],
			'street'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 135,
			],
			'neighborhood'	=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 135,
			],
			'complement'		=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 135,
			],
			'number'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 20,
			],
			'zip_code'			=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 20,
			],
			'status'				=> [
				'type'						=> 'ENUM',
				'constraint'			=> ['active', 'inactive'],
				'default'					=> 'active',
			],
			'created_at'		=> [
				'type'						=> 'DATETIME',
			],
			'updated_at'		=> [
				'type'						=> 'DATETIME',
			],
			'deleted_at'		=> [
				'type'						=> 'DATETIME',
				'null'           	=> true,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('city', 'cities', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('adresses');
	}

	public function down()
	{
		$this->forge->dropTable('adresses');
	}
}
