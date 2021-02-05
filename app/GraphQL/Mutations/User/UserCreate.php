<?php

namespace App\GraphQL\Mutations\User;

use App\Mail\verificationEmail;
use App\Models\rols;
use App\Models\User;
use GraphQL\Error\UserError;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UserCreate
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
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
        } while (User::where('api_token', $token)->exists());

        $date = date("Y-m-d");

        $input['code_verification'] = str::random(8);

        $user = User::create([
            'nameUser' => $input['nameUser'],
            'email' => $input['email'],
            'api_token' => $token,
            'genre' => $input['genre'],
            'date_birth' => $date,
            'city' => $input['city'],
            'first_name' => $input['firstName'],
            'identification' => $input['identification'],
            'last_name' => $input['lastName'],
            'password' => bcrypt($input['password']),
            'phone_number' => $input['phoneNumber'],
            'address' => $input['address'],
            'code_verification' => $input['code_verification']
        ]);

        $user->rols()->attach($rolId);

        Mail::send('mails.verification', $input, function ($message) use ($input) {
            $message->to($input['email'], $input['nameUser'], $input['code_verification']);
        });

        return $user;
    }
}
