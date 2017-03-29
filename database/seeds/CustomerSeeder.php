<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $faker = Faker\Factory::create();

    for($i = 0; $i < 30; $i++) {
        App\Customer::create([
            'name' => $faker->name,
            'email' => $faker->unique()->email,

        ]);
    }
    }
}
