<?php

namespace App\GraphQL\Mutations\User;

use App\Models\rols;
use App\Models\User;
use GraphQL\Error\UserError;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class UserCreate
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $input = $args['input'];

        $allrols = rols::all();
        $decodeId = new GlobalId();

        $rol = $allrols->find('id', $decodeId->decodeID($input["rol"]));
        throw_unless(
            $rol,
            UserError::class,
            "El rol solicitado no existe"
        );

        do {
            $token = Str::random(80);

        } while (User::where('token', $token)->exists());

        $date = date("Y-m-d");

        return User::create([
            'nameUser' => $input['nameUser'],
            'email' => $input['email'],
            'token' => $token,
            'genre' => $input['genre'],
            'date_birth' => $date,
            'city' => $input['city'],
            'first_name' => $input['firstName'],
            'identification' => $input['identification'],
            'last_name' => $input['lastName'],
            'password' => bcrypt($input['password']),
            'rol' => $rol
        ]);
    }
}
