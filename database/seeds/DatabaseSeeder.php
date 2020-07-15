<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PersonsSeeder::class);
        $this->call(RolsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductsCategorieSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(TypePaySeeder::class);
        $this->calL(SellsSeeder::class);
        $this->calL(CommentsSeeder::class);
        $this->calL(auctionsSeeder::class);
//        $this->calL(BuddingsSeeder::class);
    }
}
