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
        /*Service::truncate();

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
        }*/
        // Vaciar la tabla articles.
        Service::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos la lista de todos los usuarios creados e
        // // iteramos sobre cada uno y simulamos un inicio de
        // // sesión con cada uno para crear artículos en su nombre
        $users = App\User::all();
        foreach ($users as $user)
        {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunos articulos
            $num_services = 5;
            for ($j = 0; $j < $num_services; $j++)
            {
                Service::create([
                    'title' => $faker->sentence,
                    'type'=> $faker->jobTitle,
                    'locate'=> $faker->city,
                    'price'=> $faker->randomFloat(2,10,100),
                    'description'=> $faker->text,
                    ]);
            }
        }
    }
}
