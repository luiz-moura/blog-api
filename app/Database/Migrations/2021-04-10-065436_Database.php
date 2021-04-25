<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Database extends Migration
{
	public function up()
	{
		$forge->createDatabase('dashboard', TRUE);
	}

	public function down()
	{
		$forge->dropDatabase('dashboard');
	}
}
