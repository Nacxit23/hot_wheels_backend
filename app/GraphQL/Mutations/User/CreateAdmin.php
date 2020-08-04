<?php

namespace App\GraphQL\Mutations\User;

use App\Models\User;
use GraphQL\Error\UserError;
use Monolog\Logger;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class CreateAdmin
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {

        $users = User::all();
        $decodeId = new GlobalId();
        $user = $users->find($decodeId->decodeID(($args['id'])));

        throw_unless(
            $user,
            UserError::class,
            'El usuario no funciona.'
        );

        $rol = $user->rols()->find(1);

        logger($rol);

        throw_unless(
            !$rol,
            UserError::class,
            "El usuario ya tiene ese poder."
        );

        $user->rols()->attach(1);
        return $user;
    }
}
