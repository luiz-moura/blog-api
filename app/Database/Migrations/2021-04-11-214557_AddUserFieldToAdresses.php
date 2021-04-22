<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserFieldToAdresses extends Migration
{
	public function up()
	{
		$fields = [
			'user'				=> [
				'type'						=> 'INT',
				'contraint'				=> 5,
				'unsigned'				=> true,
				'after' 					=> 'city'
			],
			'CONSTRAINT adresses_user_foreign FOREIGN KEY(`user`) REFERENCES `users`(`id`)'
		];
		$this->forge->addColumn('adresses', $fields);
	}

	public function down()
	{
		$this->forge->dropForeignKey('adresses', 'adresses_user_foreign');
		$this->forge->dropColumn('adresses', 'user');
	}
}
