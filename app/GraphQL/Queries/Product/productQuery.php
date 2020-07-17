<?php

namespace App\GraphQL\Queries\Product;

use App\Models\products;

class productQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return products::all();
    }
}
