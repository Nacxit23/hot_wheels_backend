<?php

namespace App\Http\Middleware;

use Closure;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    protected $administrator;

    public function handle($request, Closure $next)
    {
        $user = $request->user();

        $rol = $user->rols->first()->pivot->rols_id;
        $administrator = 1;

        if (!$user || $rol !== $administrator ) {
            throw new UserError("El usuario no tiene autorizacion para realizar esto.");
        }

        return $next($request);
    }
}
