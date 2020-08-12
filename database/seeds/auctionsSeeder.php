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
            'category' => 'Toys collection',
            'description' => 'The cars is in good stated',
            'name' => 'Plymouth Fury',
            'url' => 'https://www.google.com/search?q=plymouth+fury+1961&rlz=1C1CHBD_esNI897NI897&sxsrf=ALeKk01ce1oCqfd5K21wGEnIbwBs94XZpQ:1594787635093&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjB6-zzts7qAhUOU98KHUKmDckQ_AUoAXoECAsQAw&biw=1707&bih=850&dpr=2.25',
        ]);
        $auctions->users()->attach(User::all());
    }
}
