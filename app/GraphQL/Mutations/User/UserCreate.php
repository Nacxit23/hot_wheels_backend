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

        $rolId = $allrols->find('id', $decodeId->decodeID($input["rol"]));
        throw_unless(
            $rolId,
            UserError::class,
            "El rol solicitado no existe"
        );

        do {
            $token = Str::random(80);

        } while (User::where('token', $token)->exists());

        $date = date("Y-m-d");
        $user = User::create([
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
            'phone_number' => $input['phoneNumber'],
            'address' => $input['address'],
        ]);
        logger($rolId);
        $user->rols()->attach($rolId);

        return $user;
    }
}
