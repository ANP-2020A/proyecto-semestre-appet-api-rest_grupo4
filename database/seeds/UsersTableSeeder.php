<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Vaciar la tabla
        User::truncate();

        $faker = \Faker\Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');

        User::create([
            'name'=> 'Administrador',
            'lastName'=> 'Admin',
            'idCard'=> '12345ABCDE',
            'email'=> 'admin@prueba.com',
            'locate'=> 'Quito El valle',
            'phone'=> '0983194547',
            'userType'=> 'Cliente',
            'registrationDate'=> '2020.07.18',
            'password'=> $password,
         ]);

        // Generar algunos usuarios para nuestra aplicacion
        for($i = 0; $i < 10; $i++) {
            User::create([
                'name'=> $faker->name,
                'lastName'=> $faker->lastName,
                'idCard'=> $faker->uuid,
                'email'=> $faker->email,
                'locate'=> $faker->address,
                'phone'=> $faker->phoneNumber,
                'userType'=> $faker->name,
                'registrationDate'=>$faker->dateTime,
                'password'=> $password,
             ]);
        }


    }
}

