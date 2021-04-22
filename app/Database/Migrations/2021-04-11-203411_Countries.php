<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'					=> [
				'type'           	=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
				'auto_increment' 	=> true,
			],
			'name'				=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 90,
        'unique'         		=> true,
			],
			'initials'		=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 2,
        'unique'         		=> true,
			],
      'initials_three'		=> [
				'type'						=> 'VARCHAR',
				'constraint'			=> 3,
        'unique'         		=> true,
			],
      'code'		    => [
				'type'						=> 'VARCHAR',
				'constraint'			=> 5,
        'unique'         		=> true,
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
		$this->forge->createTable('countries');
	}

	public function down()
	{
		$this->forge->dropTable('countries');
	}
}
