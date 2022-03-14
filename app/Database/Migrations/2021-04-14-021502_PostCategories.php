<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostCategories extends Migration
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
      'parent'	          => [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
        'null'              => true,
			],
			'image'						  => [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
        'null'              => true,
			],
			'name'				      => [
				'type'           		=> 'VARCHAR',
				'constraint'     		=> 45,
			],
			'description'				=> [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 90,
			],
			'slug'							=> [
				'type'           		=> 'VARCHAR',
				'constraint'		 		=> 135,
				'unique'         		=> true,
			],
			'status'						=> [
				// MYSQL
				// 'type'						=> 'ENUM',
				// 'constraint'			=> ['active', 'inactive'],
        // PGSQL
        'type'						=> 'status_active',
				'default'					=> 'active',
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
		$this->forge->addForeignKey('parent', 'post_categories', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('image', 'files', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('post_categories');
	}

	public function down()
	{
		$this->forge->dropTable('post_categories');
	}
}
