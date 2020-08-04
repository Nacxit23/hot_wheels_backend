<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class RolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
                'name' => 'administration',
            ]
        );
        DB::table('rols')->insert([
                'name' => 'seller',
            ]
        );
        DB::table('rols')->insert([
                'name' => 'consumer',
            ]
        );
    }
}
