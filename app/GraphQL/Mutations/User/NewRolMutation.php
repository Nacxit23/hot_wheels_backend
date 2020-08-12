<?php

namespace App\GraphQL\Mutations\User;

use App\Models\rols;
use App\Models\User;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class NewRolMutation
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $input = $args['input'];

        $users = User::all();
        $decodeId = new GlobalId();
        $user = $users->find($decodeId->decodeID(($input['id'])));

        throw_unless(
            $user,
            UserError::class,
            'El usuario no funciona.'
        );

        $rol = $user->rols()->find($decodeId->decodeID($input["rol"]));
        $admin = $user->rols()->where("id", $decodeId->decodeID($input["rol"]));


        throw_if(
            $rol,
            UserError::class,
            'El usuario ya tiene este rol.'
        );

        $adminVerification = 1;
        throw_if(
            $admin === $adminVerification,
            UserError::class,
            'El usuario no puede ser admin.'
        );

        $rols = rols::all();
        $rolId = $rols->find('id', $decodeId->decodeID($input["rol"]));
        $user->rols()->attach($rolId);

        return $user;
    }
}
