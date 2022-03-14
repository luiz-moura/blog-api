<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
      'role'						=> [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
        'null'              => true,
			],
			'avatar'						=> [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
        'null'              => true,
			],
			'first_name'				=> [
				'type'           		=> 'VARCHAR',
				'constraint'     		=> 45,
			],
			'last_name'					=> [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 45,
			],
			'cpf'								=> [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 20,
        'unique'         		=> true,
        'null'              => true,
			],
			'birth_date'				=> [
				'type'           		=> 'DATE',
        'null'              => true,
			],
			'gender'						=> [
        // MYSQL
				// 'type'           		=> 'ENUM',
				// 'constraint'     		=> ['M', 'F'],
        // PGSQL
        'type'              => 'gender',
        'null'              => true,
			],
			'phone'							=> [
				'type'           		=> 'VARCHAR',
				'constraint'		 		=> 20,
        'null'              => true,
			],
			'email'							=> [
				'type'           		=> 'VARCHAR',
				'constraint'		 		=> 135,
				'unique'         		=> true,
			],
			'password'					=> [
				'type'           		=> 'VARCHAR',
				'constraint'		 		=> 270,
			],
			'activation_code'	 => [
				'type'           		=> 'VARCHAR',
        'constraint'		 		=> 135,
				'null'           		=> true,
			],
			'status'						=> [
        // MYSQL
				// 'type'           		=> 'ENUM',
				// 'constraint'     		=> ['active', 'inactive', 'pending'],
        // PGSQL
        'type'           		=> 'status_with_pending',
				'default'        		=> 'pending',
			],
			'created_at'				=> [
				'type'							=> 'DATETIME',
			],
			'updated_at'				=> [
				'type'							=> 'DATETIME',
			],
			'deleted_at'				=> [
				'type'							=> 'DATETIME',
				'null'           		=> true,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('role', 'roles', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('avatar', 'files', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
