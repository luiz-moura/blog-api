<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypesPgsql extends Migration
{
	public function up()
	{
    /**
     * Excluir esta classe se o banco de dados for o MYSQL
     */
    $this->db->query("
      CREATE TYPE gender AS ENUM ('M', 'F');
      CREATE TYPE status_active AS ENUM ('active', 'inactive');
      CREATE TYPE status_with_pending AS ENUM ('active', 'inactive', 'pending');
      CREATE TYPE status_comment AS ENUM ('approved', 'pending', 'spam');
      CREATE TYPE post_type AS ENUM ('post', 'page');
    ");
	}

	public function down()
	{
    $this->db->query("
      DROP TYPE gender;
      DROP TYPE status_active;
      DROP TYPE status_with_pending;
      DROP TYPE status_comment;
      DROP TYPE post_type;
    ");
	}
}
