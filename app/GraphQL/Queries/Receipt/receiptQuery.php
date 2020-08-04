<?php

namespace App\GraphQL\Queries\Receipt;

use App\Models\receipts;

class receiptQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        receipts::all();
    }
}
