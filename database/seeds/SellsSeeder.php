<?php

use Illuminate\Database\Seeder;

class SellsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\sells::class,10)->create();
    }
}
