<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;


class ProductsCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_categories')->insert([
            'name' => 'Juguetes de coleecion',
            'description' => 'Carros valiosos y antiguedad en categoria coleccionista'
        ]);
    }
}
