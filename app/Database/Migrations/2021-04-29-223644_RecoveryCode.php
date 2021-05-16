<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecoveryCode extends Migration
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
      'user'	            => [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
			],
			'code'					    => [
				'type'           		=> 'VARCHAR',
				'constraint'     		=> 20,
        'unique'         	=> true,
			],
      'expiration'				=> [
				'type'           		=> 'DATETIME',
			],
      'status'						=> [
				'type'           		=> 'ENUM',
				'constraint'     		=> ['active', 'inactive'],
				'default'        		=> 'active',
			],
			'created_at'				=> [
				'type'							=> 'DATETIME',
			],
			'updated_at'				=> [
				'type'							=> 'DATETIME',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('recovery_codes');
	}

	public function down()
	{
		$this->forge->dropTable('recovery_codes');
	}
}
