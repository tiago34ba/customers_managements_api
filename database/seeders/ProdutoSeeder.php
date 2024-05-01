<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=1; $i<100; $i++)  {
            DB::table('products')->insert([
                'name' => $faker->city,
                'details' => $faker->paragraph($nb =2),
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'image'=>$image = $faker->image(null, 640, 480),
                'description'=> $faker->paragraph($nb =8)
            ]);
         }
    }
}
