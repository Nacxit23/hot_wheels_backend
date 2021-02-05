<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\auction;

class auctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auctions = auction::create(['first_dateTime' => '2016-10-06 07:24:25',
            'last_dateTime' => '2016-10-06 20:00:00',
            'product_id' => 1,
            'type_pay_id' => 3,
            'description' => 'The cars is in good stated',
            'user_id' => 3
        ]);
    }
}
