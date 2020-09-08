<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user =  App\User::create([

        'name' => 'Kidus Admin',
        'email' => 'kidus@admin.com',
        'password'=> bcrypt('password'),
        'department'=>'IT',
        'admin' => 1 

         ]);

        $super_user =  App\User::create([

            'name' => 'Kidus Super',
            'email' => 'kidus@super.com',
            'password'=> bcrypt('password'),
            'department'=>'',
            'admin' => 2 

        ]);

    }
}
