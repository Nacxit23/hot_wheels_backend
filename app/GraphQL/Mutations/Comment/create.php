<?php

namespace App\GraphQL\Mutations\Comment;

use App\Models\comments;
use App\Models\sells;
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

        $userId = $context->user()->id;


        $globalId = new GlobalId();

        $sell = sells::find($globalId->decodeID($input["sellId"]));
        logger($userId);

        throw_unless(
            $sell,
            UserError::class,
            "La venta no funciona"
        );

        return comments::create([
            'users_id' => $userId,
            'sells_id' => $sell->id,
            'comment' => $input["comment"]
        ]);
    }
}
