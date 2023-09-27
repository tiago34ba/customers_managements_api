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
        DB::table('clientes')->insert([            
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            "cnpj"=> fake()->cnpj(),
            "cpf"=> fake()->cpf(),
            "status"=> fake()->status(),
            "data_cadastro"=> fake()->data_cadastro(),
            'updated_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
        ]);
}
}
