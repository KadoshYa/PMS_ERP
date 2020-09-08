<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $it_dept =  App\Department::create([

            'name' => 'IT',
    
             ]);
        $hr_dept =  App\Department::create([

            'name' => 'Human Resource',
        
             ]);
        $fin_dept =  App\Department::create([

                'name' => 'Finance',
        
        ]);

        $market_dept =  App\Department::create([

            'name' => 'Marketing',
    
        ]);
        $cs_dept =  App\Department::create([

            'name' => 'Customer Service',
    
        ]);
    }
}
