<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$model = model('UserModel');

    $data = [
      [
        'first_name'      => 'Suporte 🤖',
        'last_name'       => 'AnyCode',
        'cpf'             => '000.000.000.00',
        'email'           => 'anycodesuport@gmail.com',
        'password'        => 'system123',
        'pass_confirm'    => 'system123',
      ],
      [
        'first_name'      => 'Administrator',
        'last_name'       => 'ADM',
        'cpf'             => '000.000.000.00',
        'email'           => static::faker()->email,
        'password'        => 'adm123',
        'pass_confirm'    => 'adm123',
      ],
    ];

    $model->insertBatch($data);
	}
}
