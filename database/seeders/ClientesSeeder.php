<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<100; $i++) {
            DB::table('Clientes')->insert([
                'nome' => $faker->name,
                'CPF' => $faker->cpf,
                'CNPJ' => $faker->cnpj(false),
                'telefone' => sprintf('(0%s) %s', $faker->areaCode, $faker->landline),
                'endereco' => $faker->address,
                'cidade' => $faker->city,
                'UF' => $faker->stateAbbr,
            ]);   
         }
    }

}