<?php

namespace App\GraphQL\Queries\Type_pay;

use App\Models\type_pay;

class type_payQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return type_pay::all();
    }
}
