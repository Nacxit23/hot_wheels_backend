<?php

namespace App\GraphQL\Mutations\Auction;

use App\Models\auction;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Throwable;

class create
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $input = $args['input'];
        $globalId = new GlobalId();

        $user = $context->user();

        $products = $user->products;

        try {
            $getProduct = $globalId->decodeID($input["productId"]);

        } catch (Throwable $e) {
            throw new UserError("El producto ingresado es erronio");
        }

        $product = $products->where("id", $getProduct)->first();

        throw_unless(
            $product === null,
            UserError::class,
            "Producto no admitido"
        );

        throw_unless(
            $product->active,
            UserError::class,
            "El producto el producto esta en venta o en subasta"
        );

        $product->active = false;
        $product->save();

        try {
            $getpayId = $globalId->decodeID($input["typeId"]);

        } catch (Throwable $e) {
            throw new UserError("El tipo de pago ingresado es erronio");
        }

        date_default_timezone_set("America/Managua");
        $date = date('Y-m-d H:i:s');

        $auctions_state = "ACTIVE 🤙🏻";

        $auction = auction::create([
            "first_dateTime" => $date,
            "auctions_state" => $auctions_state,
            "product_id" => $product->id,
            "type_pay_id" => $getpayId,
            "description" => $input["description"],
            "detail" => $input["detail"],
            'user_id' => $user->id,
        ]);
        return $auction;
    }
}
