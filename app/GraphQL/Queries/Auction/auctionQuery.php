<?php

namespace App\GraphQL\Queries\Auction;
use App\Models\auction;

class auctionQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return auction::all();
    }
}
