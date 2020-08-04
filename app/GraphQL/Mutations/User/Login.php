<?php

namespace App\GraphQL\Mutations\User;

use GraphQL\Error\UserError;
use Illuminate\Support\Facades\Auth;

class Login
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $athetication = Auth::guard("web")->attempt($args["input"]);
        throw_unless(
            $athetication,
            UserError::class,
            'La contraseña y el nombre de usuario no pertenece a ningún usuario.'
        );

        $user = Auth::guard("web")->user();

        return ['token' => $user->api_token];
    }
}
