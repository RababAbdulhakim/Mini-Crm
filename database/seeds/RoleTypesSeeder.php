<?php

use Illuminate\Database\Seeder;

class RoleTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
           DB::table('role_types')->insert([
                'type' => 'admin',
                
            ]
        );
           DB::table('role_types')->insert([
                'type' => 'employee',
                
            ]
        );
           
        
    }
    }

