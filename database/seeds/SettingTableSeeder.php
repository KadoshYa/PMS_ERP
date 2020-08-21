<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
 
            'site_name'=>"laravel's Blog",
            'address' =>'Russia,Petersburg',
            'contact_number' =>'8 897 6878',
            'contact_email'=>'info@laravel_blog.com',
            

        ]);
    }
}
