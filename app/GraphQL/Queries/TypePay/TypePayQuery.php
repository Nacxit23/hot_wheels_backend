<?php

namespace App\GraphQL\Queries\TypePay;

use App\Models\type_pay;

class TypePayQuery
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        return type_pay::all();
    }
}
