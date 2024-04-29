<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleBasedAccessMiddleware
    {

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user) {
            return redirect('/login');
        }

        if (!in_array($user->role, $roles)) {
            abort(404, 'Not found');
        }

        return $next($request);
    }
}
