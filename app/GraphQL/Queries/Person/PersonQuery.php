<?php

namespace App\GraphQL\Queries\Person;

use App\Models\persons;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class PersonQuery
{
    public function __invoke()
    {
        return persons::all();
    }
}
