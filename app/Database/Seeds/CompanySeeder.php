<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompanySeeder extends Seeder
{
	public function run()
	{
		$model = model('CompanyModel');

    $data = [
      [
        'name'          => 'AnyCode',
        'description'   => 'AnyCode description',
        'email'         => 'anycodesuport@gmail.com',
      ],
    ];

    $model->insertBatch($data);
	}
}
