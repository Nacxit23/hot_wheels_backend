<?php

namespace App\GraphQL\Mutations\Comment;

use App\Models\comments;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class update
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context )
    {

        $input = $args['input'];

        $globalId = new GlobalId();

        $comment = comments::find($globalId->decodeID($input["commentID"]));

        throw_unless(
            $comment,
            UserError::class,
            "El commentario no existe"
        );

        date_default_timezone_set("America/Managua");
        $newData = date('Y-m-d H:i:s');

        throw_unless(
            $comment->users_id === $context->user()->id,
            UserError::class,
            "Usted no tiene permitido actualizar este commentario"
        );

        $newComment = $comment->update([
            'comment' => $input["comment"],
            'commentTime' => $newData,
            'state' => "Editado"
        ]);

        return $newComment;
    }
}
