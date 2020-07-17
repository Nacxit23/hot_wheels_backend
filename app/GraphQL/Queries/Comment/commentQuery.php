<?php

namespace App\GraphQL\Queries\Comment;
use App\Models\comments;

class commentQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return comments::all();
    }
}
