<?php

use App\Service;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the datasbase seed
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Service::truncate();

        $faker = \Faker\Factory::create();

        // Crear artículos ficticios en la tabla
        for($i = 0; $i < 50; $i++) {
            Service::create([
                'title'=> $faker->text,
                'type'=> $faker->jobTitle,
                'locate'=> $faker->city,
                'price'=> $faker->randomFloat(2,10,100),
                'description'=> $faker->text,
            ]);
        }
    }
}
