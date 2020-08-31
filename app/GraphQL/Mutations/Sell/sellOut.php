<?php

namespace App\GraphQL\Mutations\Sell;

use App\Models\sells;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class sellOut
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args['id'];

        $sells = sells::all();

        $globalId = new GlobalId();

        $sell = $sells->find($globalId->decodeID($id));

        throw_unless(
            $sell,
            UserError::class,
            "El producto no existe"
        );

        $sell->update([
            "active" => 0
        ]);

        return $sell;
    }
}
