<?php

namespace App\GraphQL\Mutations\User\Verify;

use App\Models\User;
use GraphQL\Error\UserError;

class Verify
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $codeVerfication = $args["codeVerification"];

        throw_unless(
            $codeVerfication,
            UserError::class,
            "Ingrese el codigo de verificacion porfavor"
        );

        $code = User::where('code_verification', $args["codeVerification"])->first();

        if (!$code) {
            throw new UserError("El codio no pertenece a esta cuenta.");
        }

        $code->verification = true;
        $code->code_verification = "";
        $code->save();

        return $code;
    }
}
