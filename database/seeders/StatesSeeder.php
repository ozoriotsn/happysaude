<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'Acre',
                'uf' => 'AC',
                'created_at' => now()
            ),
            1 =>
            array (
                'id' => '2',
                'name' => 'Alagoas',
                'uf' => 'AL',
                'created_at' => now(),

            ),
            2 =>
            array (
                'id' => '3',
                'name' => 'Amazonas',
                'uf' => 'AM',
                'created_at' => now()
            ),
            3 =>
            array (
                'id' => '4',
                'name' => 'Amapá',
                'uf' => 'AP',
                'created_at' => now()
            ),
            4 =>
            array (
                'id' => '5',
                'name' => 'Bahia',
                'uf' => 'BA',
                'created_at' => now()
            ),
            5 =>
            array (
                'id' => '6',
                'name' => 'Ceará',
                'uf' => 'CE',
                'created_at' => now()
            ),
            6 =>
            array (
                'id' => '7',
                'name' => 'Distrito Federal',
                'uf' => 'DF',
                'created_at' => now()
            ),
            7 =>
            array (
                'id' => '8',
                'name' => 'Espírito Santo',
                'uf' => 'ES',
                'created_at' => now()
            ),
            8 =>
            array (
                'id' => '9',
                'name' => 'Goiás',
                'uf' => 'GO',
                'created_at' => now()
            ),
            9 =>
            array (
                'id' => '10',
                'name' => 'Maranhão',
                'uf' => 'MA',
                'created_at' => now()
            ),
            10 =>
            array (
                'id' => '11',
                'name' => 'Minas Gerais',
                'uf' => 'MG',
                'created_at' => now()
            ),
            11 =>
            array (
                'id' => '12',
                'name' => 'Mato Grosso do Sul',
                'uf' => 'MS',
                'created_at' => now()
            ),
            12 =>
            array (
                'id' => '13',
                'name' => 'Mato Grosso',
                'uf' => 'MT',
                'created_at' => now()
            ),
            13 =>
            array (
                'id' => '14',
                'name' => 'Pará',
                'uf' => 'PA',
                'created_at' => now()
            ),
            14 =>
            array (
                'id' => '15',
                'name' => 'Paraiba',
                'uf' => 'PB',
                'created_at' => now()
            ),
            15 =>
            array (
                'id' => '16',
                'name' => 'Pernambuco',
                'uf' => 'PE',
                'created_at' => now()
            ),
            16 =>
            array (
                'id' => '17',
                'name' => 'Piauí',
                'uf' => 'PI',
                'created_at' => now()
            ),
            17 =>
            array (
                'id' => '18',
                'name' => 'Paraná',
                'uf' => 'PR',
                'created_at' => now()
            ),
            18 =>
            array (
                'id' => '19',
                'name' => 'Rio de Janeiro',
                'uf' => 'RJ',
                'created_at' => now()
            ),
            19 =>
            array (
                'id' => '20',
                'name' => 'Rio Grande do Norte',
                'uf' => 'RN',
                'created_at' => now()
            ),
            20 =>
            array (
                'id' => '21',
                'name' => 'Rondônia',
                'uf' => 'RO',
                'created_at' => now()
            ),
            21 =>
            array (
                'id' => '22',
                'name' => 'Roraima',
                'uf' => 'RR',
                'created_at' => now()
            ),
            22 =>
            array (
                'id' => '23',
                'name' => 'Rio Grande do Sul',
                'uf' => 'RS',
                'created_at' => now()
            ),
            23 =>
            array (
                'id' => '24',
                'name' => 'Santa Catarina',
                'uf' => 'SC',
                'created_at' => now()
            ),
            24 =>
            array (
                'id' => '25',
                'name' => 'Sergipe',
                'uf' => 'SE',
                'created_at' => now()
            ),
            25 =>
            array (
                'id' => '26',
                'name' => 'São Paulo',
                'uf' => 'SP',
                'created_at' => now()
            ),
            26 =>
            array (
                'id' => '27',
                'name' => 'Tocantins',
                'uf' => 'TO',
                'created_at' => now()
            ),
        ));




    }
}
