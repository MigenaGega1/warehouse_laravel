<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'first_name' => 'Migena',
            'last_name' => 'Gega',
            'email' => 'migena.gega@gmail.com',
            'password'=>Hash::make('admin123'),
            // 'password_confirmation'=>Hash::make('admin123'),
            'role'=>'admin',


        ]);
        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'John.smith@gmail.com',
            'password'=>Hash::make('operator123'),
            // 'password_confirmation'=>Hash::make('operator'),
            'role'=>'operator',


        ]);
    }
}
