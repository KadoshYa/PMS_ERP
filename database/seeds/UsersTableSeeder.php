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
        $user =  App\User::create([

        'name' => 'Kidus Admin',
        'email' => 'kidus@admin.com',
        'password'=> bcrypt('password'),
        'department'=>'IT',
        'admin' => 1 

    ]);

    }
}
