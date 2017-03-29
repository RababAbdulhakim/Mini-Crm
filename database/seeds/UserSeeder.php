<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
                'role_id' => 1,
                
            ]
        );
                 $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++) {
        App\User::create([
            'name' => $faker->name,
            'role_id' => $faker->numberBetween(2,2),
            'email' => $faker->unique()->email,
            'password' => bcrypt('secret'),

        ]);
    }
    }
}
