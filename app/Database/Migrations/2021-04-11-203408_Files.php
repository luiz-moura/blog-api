<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Files extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'					=> [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
				'auto_increment' 		=> true,
			],
      'name'				=> [
				'type'           		=> 'VARCHAR',
				'constraint'     		=> 45,
			],
      'path'				=> [
				'type'           		=> 'VARCHAR',
				'constraint'     		=> 260,
        'unique'         		=> true,
			],
			'created_at'	=> [
				'type'							=> 'DATETIME',
			],
			'updated_at'	=> [
				'type'							=> 'DATETIME',
			],
			'deleted_at'	=> [
				'type'							=> 'DATETIME',
				'null'           		=> true,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('files');
	}

	public function down()
	{
		$this->forge->dropTable('files');
	}
}
