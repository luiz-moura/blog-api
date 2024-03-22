<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run()
    {
        $model = model('StateModel');

        $data = [
            [
                'id' => 1,
                'country' => 31,
                'initials' => 'AC',
                'name' => 'Acre',
            ],
            [
                'id' => 2,
                'country' => 31,
                'initials' => 'AL',
                'name' => 'Alagoas',
            ],
            [
                'id' => 3,
                'country' => 31,
                'initials' => 'AM',
                'name' => 'Amazonas',
            ],
            [
                'id' => 4,
                'country' => 31,
                'initials' => 'AP',
                'name' => 'Amapá',
            ],
            [
                'id' => 5,
                'country' => 31,
                'initials' => 'BA',
                'name' => 'Bahia',
            ],
            [
                'id' => 6,
                'country' => 31,
                'initials' => 'CE',
                'name' => 'Ceará',
            ],
            [
                'id' => 7,
                'country' => 31,
                'initials' => 'DF',
                'name' => 'Distrito Federal',
            ],
            [
                'id' => 8,
                'country' => 31,
                'initials' => 'ES',
                'name' => 'Espírito Santo',
            ],
            [
                'id' => 9,
                'country' => 31,
                'initials' => 'GO',
                'name' => 'Goiás',
            ],
            [
                'id' => 10,
                'country' => 31,
                'initials' => 'MA',
                'name' => 'Maranhão',
            ],
            [
                'id' => 11,
                'country' => 31,
                'initials' => 'MG',
                'name' => 'Minas Gerais',
            ],
            [
                'id' => 12,
                'country' => 31,
                'initials' => 'MS',
                'name' => 'Mato Grosso do Sul',
            ],
            [
                'id' => 13,
                'country' => 31,
                'initials' => 'MT',
                'name' => 'Mato Grosso',
            ],
            [
                'id' => 14,
                'country' => 31,
                'initials' => 'PA',
                'name' => 'Pará',
            ],
            [
                'id' => 15,
                'country' => 31,
                'initials' => 'PB',
                'name' => 'Paraíba',
            ],
            [
                'id' => 16,
                'country' => 31,
                'initials' => 'PE',
                'name' => 'Pernambuco',
            ],
            [
                'id' => 17,
                'country' => 31,
                'initials' => 'PI',
                'name' => 'Piauí',
            ],
            [
                'id' => 18,
                'country' => 31,
                'initials' => 'PR',
                'name' => 'Paraná',
            ],
            [
                'id' => 19,
                'country' => 31,
                'initials' => 'RJ',
                'name' => 'Rio de Janeiro',
            ],
            [
                'id' => 20,
                'country' => 31,
                'initials' => 'RN',
                'name' => 'Rio Grande do Norte',
            ],
            [
                'id' => 21,
                'country' => 31,
                'initials' => 'RO',
                'name' => 'Rondônia',
            ],
            [
                'id' => 22,
                'country' => 31,
                'initials' => 'RR',
                'name' => 'Roraima',
            ],
            [
                'id' => 23,
                'country' => 31,
                'initials' => 'RS',
                'name' => 'Rio Grande do Sul',
            ],
            [
                'id' => 24,
                'country' => 31,
                'initials' => 'SC',
                'name' => 'Santa Catarina',
            ],
            [
                'id' => 25,
                'country' => 31,
                'initials' => 'SE',
                'name' => 'Sergipe',
            ],
            [
                'id' => 26,
                'country' => 31,
                'initials' => 'SP',
                'name' => 'São Paulo',
            ],
            [
                'id' => 27,
                'country' => 31,
                'initials' => 'TO',
                'name' => 'Tocantins',
            ],
        ];

        $model->insertBatch($data);
    }
}
