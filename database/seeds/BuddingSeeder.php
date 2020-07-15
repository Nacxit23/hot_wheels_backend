<?php

use Illuminate\Database\Seeder;

class BuddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\buddings::class, 10)->create();
    }
}
