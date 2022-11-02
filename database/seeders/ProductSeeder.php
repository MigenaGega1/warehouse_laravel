<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            'name' => 'pc',
            'price' => 1000,
            'stock' => 100,
            'created_at'=>Carbon::now()->toDateTimeString(),



        ]);
        DB::table('products')->insert([
            'name' => 'computer',
            'price' => 2000,
            'stock' => 50,
            'created_at'=>Carbon::now()->toDateTimeString(),


        ]);
    }
}
