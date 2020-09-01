<?php

namespace App\GraphQL\Mutations\TypePay;

use App\Models\products;
use App\Models\type_pay;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class updatePay
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $globalId = new GlobalId();

        $types_pay = type_pay::all();
        $type_pay = $types_pay->find($globalId->decodeID($args['id']));

        throw_unless(
            $type_pay,
            UserError::class,
            "El tipo de pago no existe"
        );

        $unable = $type_pay->update([
            'active' => false
        ]);

        return $unable;
    }
}
