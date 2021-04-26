<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuPages extends Migration
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
      'menu'	            => [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
			],
			'parent'					    => [
				'type'           		=> 'INT',
				'constraint'     		=> 5,
				'unsigned'       		=> true,
			],
      'title'					    => [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 135,
			],
      'type'					    => [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 45,
			],
      'sequence'					=> [
				'type'           		=>'VARCHAR',
				'constraint'     		=> 45,
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
      'deleted_at'				=> [
				'type'							=> 'DATETIME',
        'null'              => true,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('menu', 'menus', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('parent', 'menu_pages', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('menu_pages');
	}

	public function down()
	{
		$this->forge->dropTable('menu_pages');
	}
}
