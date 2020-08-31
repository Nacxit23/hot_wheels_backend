<?php

namespace App\GraphQL\Queries\Sell;

use App\Models\sells;

class sellQuery
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_)
    {
        $sells = sells::where("active", 1)->orderBy('datetime', 'desc')->get();

        return $sells;
    }
}
