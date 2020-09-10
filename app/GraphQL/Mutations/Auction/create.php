<?php

namespace App\GraphQL\Mutations\Auction;

use App\Models\auction;
use App\Models\products;
use App\Models\type_pay;
use App\Models\User;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

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

        $products = products::all();
        $product = $products->find($globalId->decodeID($input['productId']));

        $payId = $globalId->decodeID($input["typePayId"]);

        $pay = type_pay::find($payId);

        throw_unless(
            $pay,
            UserError::class,
            "El tipo de pago no existe."
        );

        date_default_timezone_set("America/Managua");
        $date = date('Y-m-d H:i:s');

        $auctions_state = "ACTIVE 🤙🏻";

        $auction = auction::create([
            "first_dateTime" => $date,
            "auctions_state" => $auctions_state,
            "product_id" => $product->id,
            "type_pay_id" => $pay,
            "description" => $input["description"],
            "detail" => $input["detail"]
        ]);

        $auction->users()->attach(User::all());

        return $auction;
    }
}
