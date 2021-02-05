<?php

namespace App\GraphQL\Mutations\Sell;

use App\Models\products;
use App\Models\sells;
use App\Models\type_pay;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class createSell
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $input = $args['input'];
        $user = $context->user();

        date_default_timezone_set("America/Managua");

        $date = date('Y-m-d H:i:s');

        $userID = $user->id;

        $globalId = new GlobalId();

        $products = products::all();
        $product = $products->find($globalId->decodeID($input["idProduct"]));

        $product->update([
            'active' => 0
        ]);

        throw_unless(
            $product,
            UserError::class,
            "El producto no existe."
        );

        $payId = $globalId->decodeID($input["idTypePay"]);

        $pay = type_pay::find($payId);

        throw_unless(
            $pay,
            UserError::class,
            "El tipo de pago no existe."
        );

        $sell = sells::create([
            'datetime' => $date,
            'product_id' => $product->id,
            'type_pay_id' => $pay->id,
            'user_id' => $userID,
            'detail' => $input['detail']
        ])->refresh();

        return $sell;
    }
}
