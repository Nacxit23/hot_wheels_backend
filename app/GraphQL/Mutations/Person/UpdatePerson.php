<?php

namespace App\GraphQL\Mutations\Person;

use App\Models\persons;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class UpdatePerson
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $input = $args['input'];

        $globalID = new GlobalId();
        $persons = persons::all();
        $person = $persons->find($globalID->decodeID($input['id']));

        throw_unless(
            $person,
            UserError::class,
            'La persona buscada no existe'
        );

        return $person->update([
            'genre' => $input['genre'],
            'date_birth' => $input['dateBirth'],
            'city' => $input['city'],
            'first_name' => $input['firstName'],
            'identification' => $input['identification'],
            'last_name' => $input['lastName'],
        ]);
    }
}
