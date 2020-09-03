<?php

namespace App\GraphQL\Mutations\Comment;

use App\Models\comments;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class delete
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $globalId = new GlobalId();

        $comment = comments::find($globalId->decodeID($args["id"]));

        throw_unless(
            $comment,
            UserError::class,
            "El commentario no existe"
        );

        throw_unless(
            $comment->users_id === $context->user()->id,
            UserError::class,
            "Usted no tiene permitido actualizar este commentario"
        );

        $comment->update([
            'active' => 0
        ]);

        return $comment;
    }
}
