<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')
                ->withErrors('Login terlebih dahulu');
        }

        if ($user->roles != 'ADMIN') {
            return redirect('/forbidden');
        }

        return $next($request);
    }
}
