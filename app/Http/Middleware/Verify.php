<?php

namespace App\Http\Middleware;

use Closure;
use GraphQL\Error\UserError;

class Verify
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

        if ($user->verification !== true) {

            throw new UserError("La cuenta no ha sido verificada a un.");
        }

        return $next($request);
    }
}
