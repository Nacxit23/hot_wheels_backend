<?php

namespace App\GraphQL\Queries\Auction;

use App\Models\auction;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class findAuction
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $name = $args["name"];

        $auction = auction::join('products', 'auctions.product_id', '=', 'products.id')
            ->where('products.name', 'LIKE', "%$name%")
            ->where('auctions.active', 1)->get();

        if ($auction->isEmpty()) {

            throw new UserError("No se encontro ninguna concidencia");
        } else {

            return $auction;
        }
    }
}
