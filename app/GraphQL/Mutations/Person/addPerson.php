<?php

namespace App\GraphQL\Mutations\Person;

use App\Models\persons;
use Illuminate\Support\Str;

class addPerson
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $input = $args['input'];

        return persons::create([
            'genre' => $input['genre'],
            'date_birth' => $input['dateBirth'],
            'city' => $input['city'],
            'first_name' => $input['firstName'],
            'identification' => $input['identification'],
            'last_name'=> $input['lastName']
        ]);
    }
}
