<?php

namespace App\GraphQL\Queries\Budding;
use App\Models\buddings;

class buddingQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return buddings::all();
    }
}
