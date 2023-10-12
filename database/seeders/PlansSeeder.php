<?php

namespace Database\Seeders;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;



class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<500; $i++) {
            DB::table('plan_')->insert([
                'name' => $faker->name,
                'price' => $faker->randomFloat(2, 10, 100,1000), 
                'description' => $faker->realText(200),
            ]);   
         }
    }

}