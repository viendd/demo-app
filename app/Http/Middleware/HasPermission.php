<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class HasPermission extends Middleware
{
    public function handle($request, Closure $next, $permission)
    {
        $user = auth()->user();

        if ($user->hasPermissionTo($permission)){
            return $next($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
            'code' => 401
        ], 401)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
