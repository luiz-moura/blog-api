<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Database extends Migration
{
	public function up()
	{
		$this->forge->createDatabase('dashboard', TRUE);
	}

	public function down()
	{
		$this->forge->dropDatabase('dashboard');
	}
}
