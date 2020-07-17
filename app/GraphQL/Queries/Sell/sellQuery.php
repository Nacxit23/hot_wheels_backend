<?php

namespace App\GraphQL\Queries\Sell;

use App\Models\sells;

class sellQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return sells::all();
    }
}
