<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('action_types')->insert([
                'type' => 'call',
                
            ]
        );
           DB::table('action_types')->insert([
                'type' => 'follow up',
                
            ]
        );
            DB::table('action_types')->insert([
                'type' => 'visit',
                
            ]
        );
    }
}
