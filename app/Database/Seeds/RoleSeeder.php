<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
	public function run()
	{
		$model = model('RoleModel');

    $data = [
      [
        'name' => 'Desenvolvedor',
        'description' => 'Suporte',
      ],
      [
        'name' => 'Administrador',
        'description' => 'Possui todas as permissões',
      ],
      [
        'name' => 'Editor',
        'description' => 'Pode criar e editar todas as postagens (Páginas, postagens, eventos)',
      ],
      [
        'name' => 'Autor',
        'description' => 'Pode crirar e editas as proprias postagens',
      ],
    ];

    $model->insertBatch($data);
	}
}
