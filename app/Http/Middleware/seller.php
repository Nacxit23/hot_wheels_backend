<?php

namespace App\Http\Middleware;

use Closure;
use GraphQL\Error\UserError;

class seller
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        $rol = $user->rols->first()->pivot->rols_id;
        $seller = 2;

        if (!$user || !$user === $seller) {
            throw new UserError("El usuario no es vendedor.");
        }

        return $next($request);
    }
}
