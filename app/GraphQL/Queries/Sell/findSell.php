<?php

namespace App\GraphQL\Queries\Sell;

use App\Models\sells;
use App\Models\User;
use GraphQL\Error\UserError;

class findSell
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $name = $args['name'];

        $sells = sells::join('products', 'sells.product_id', '=', 'products.id')
            ->where('products.name', 'LIKE', "%$name%")
            ->where('sells.active', 1)->get();

        if ($sells->isEmpty()) {

            throw new UserError("No se encontro ninguna concidencia");
        } else {

            return $sells;
        }
    }
}
