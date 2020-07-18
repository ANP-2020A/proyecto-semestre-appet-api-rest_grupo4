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
            'nombre'=> 'Administrador',
            'apellido'=> 'Admin',
            'cedula'=> '12345ABCDE',
            'email'=> 'admin@prueba.com',
            'direccion'=> 'Quito El valle',
            'telefono'=> '0983194547',
            'tipo_usuario'=> 'Cliente',
            'fecha_registro'=> '2020.07.18',
            'password'=> $password,
         ]);

        // Generar algunos usuarios para nuestra aplicacion
        for($i = 0; $i < 10; $i++) {
            User::create([
                'nombre'=> $faker->name,
                'apellido'=> $faker->lastName,
                'cedula'=> $faker->uuid,
                'email'=> $faker->email,
                'direccion'=> $faker->address,
                'telefono'=> $faker->phoneNumber,
                'tipo_usuario'=> $faker->name,
                'fecha_registro'=>$faker->dateTime,
                'password'=> $password,
             ]);
        }


    }
}

