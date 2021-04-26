<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Company extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'								=> [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
				'auto_increment' 		=> true,
			],
      'name'					    => [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 135,
			],
      'description'					    => [
				'type'            =>'VARCHAR',
				'constraint'     		=> 45,
			],
			'created_at'				=> [
				'type'							=> 'DATETIME',
			],
			'updated_at'				=> [
				'type'							=> 'DATETIME',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('company');
	}

	public function down()
	{
		$this->forge->dropTable('company');
	}
}
