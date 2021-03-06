<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Andrew Ananda',
            'email'=>'admin@gmail.com',
            'gender'=> 'm',
            'id_number' => '370098212',
            'phone'=> '254723546707',
            'password'=>Hash::make('secret')
        ]);
    }
}
