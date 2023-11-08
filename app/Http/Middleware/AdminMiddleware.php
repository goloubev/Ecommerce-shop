<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Not admin
        if (auth()->user()->role != User::ROLE_ADMIN) {
            return back()->with('error', 'Access denied');
        }

        return $next($request);
    }
}
