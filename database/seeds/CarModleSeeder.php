<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_models')->insert([
            'title'=>'Toyota',
            'description'=>'Toyota'
        ]);

        DB::table('hire_durations')->insert([
            'name'=>'1 day',
            'description'=>'1 day'
        ]);
    }
}
