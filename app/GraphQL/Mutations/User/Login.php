<?php

namespace App\GraphQL\Mutations\User;

use App\Models\User;
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

        $imput = $args["input"];

        $user = User::where("nameUser", $imput["nameUser"])->first();
        logger($user);

        throw_unless(
            $user->verification,
            UserError::class,
            'El usuario no ha sido verificado.'
        );

        throw_unless(
            $athetication,
            UserError::class,
            'La contraseña y el nombre de usuario no pertenece a ningún usuario.'
        );

        $user = Auth::guard("web")->user();

        return ['token' => $user->api_token];
    }
}
