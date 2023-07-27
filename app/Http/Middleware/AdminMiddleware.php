<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request);
        }
        abort(403, 'Anda Bukan Admin');

        // return back()->with('error', 'maaf, anda bukan admin');
    }
}
