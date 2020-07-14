<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class TypePaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("type_pays")->insert([
             "name" => 'Credit Card'
         ]);
        DB::table("type_pays")->insert([
            "name" => 'Cash'
        ]);
        DB::table("type_pays")->insert([
            "name" => 'Debit Card'
        ]);
    }
}
