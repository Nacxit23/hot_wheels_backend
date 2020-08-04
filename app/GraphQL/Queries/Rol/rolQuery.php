<?php

namespace App\GraphQL\Queries\Rol;

use App\Models\rols;

class rolQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return rols::all();
    }
}
