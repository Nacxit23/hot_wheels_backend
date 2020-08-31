<?php

namespace App\GraphQL\Queries\Product;

use App\Models\products;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class productQuery
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $id = $context->user()->id;

        $products = products::all();

        $userProduct = $products->where('user_id', $id)->where('active', 1);

        throw_if(
            $userProduct->isEmpty(),
            UserError::class,
            "No tiene producto registrados"
        );

        return $userProduct;
    }
}
