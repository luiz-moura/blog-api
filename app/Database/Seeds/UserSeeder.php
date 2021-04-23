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
        'first_name'      => 'Desenvolvedor',
        'last_name'       => 'System',
        'cpf'             => 'luizhom@outlook.com',
        'birth_date'      => '13/02/199',
        'gender'          => 'M',
        'phone'           => '+5569993308334',
        'email'           => 'luizhom@outlook.com',
        'password'        => 'system123',
        'pass_confirm'    => 'system123',
      ],
      [
        'first_name'      => 'Administrator',
        'last_name'       => 'ADM',
        'cpf'             => static::faker()->email,
        'birth_date'      => date('Y-m-d'),
        'gender'          => 'M',
        'phone'           => static::faker()->phoneNumber,
        'email'           => static::faker()->email,
        'password'        => 'adm123',
        'pass_confirm'    => 'adm123',
      ],
    ];

    $model->insertBatch($data);
	}
}
