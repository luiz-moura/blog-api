<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permissions extends Migration
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
			'role'				=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
			],
			'name'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 45,
        'unique'          => true,
			],
      'key'				  => [
				'type'						=> 'VARCHAR',
				'constraint'			=> 45,
        'unique'          => true,
			],
			'allowed'	=> [
				'type'						=> 'BIT',
			],
			'create'			=> [
				'type'						=> 'BIT',
			],
			'read'				=> [
				'type'						=> 'BIT',
			],
			'update'			=> [
				'type'						=> 'BIT',
			],
			'delete'			=> [
				'type'						=> 'BIT',
			],
			'created_at'	=> [
				'type'						=> 'DATETIME',
			],
			'updated_at'	=> [
				'type'						=> 'DATETIME',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('role', 'roles', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('permissions');
	}

	public function down()
	{
		$this->forge->dropTable('permissions');
	}
}
