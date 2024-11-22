<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateLogin
{
    /**
     * Handle an incoming login request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validatedData = $request->validate([
            'login-email' => ['required', 'email', 'unique:accounts'],
            'login-password' => ['required', 'password'], 
        ]);
        return $next($request);
    }
}
