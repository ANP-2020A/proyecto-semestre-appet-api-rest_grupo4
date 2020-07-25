<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the datasbase seed
     *
     * @return void
     */
    public function run()
    {
    //Vaciar la tabla.
    Order::truncate();

    $faker = \Faker\Factory::create();
    // Crear artículos ficticios en la tabla
    for($i = 0; $i < 50; $i++) {
    Order::create([
        'orderDate'=> $faker->dateTime,
        'attentionDate'=> $faker->dateTime,
        'description'=> $faker->text,
        'news'=> $faker->text,

            ]);
        }
    }
}
