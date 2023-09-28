<?php

namespace Database\Factories;




use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cliente>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = clientes::Cliente;

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'CPF' => $faker->cpf,
            'CNPJ' => $faker->cnpj(false),
            'telefone' => sprintf('(0%s) %s', $faker->areaCode, $faker->landline),
            'endereco' => $faker->address,
            'cidade' => $faker->city,
            'UF' => $faker->stateAbbr,
        ];
                  
    }
}
