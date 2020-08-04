<?php

namespace App\GraphQL\Queries\User;
use App\Models\User;

class UserQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return User::all();
    }
}
