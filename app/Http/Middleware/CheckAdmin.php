<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $role = strtolower(trim(auth()->user()->role));

        if ($role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
