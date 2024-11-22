<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateSignup
{
    /**
     * Handle an incoming signup request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validatedData = $request->validate([
            'signup-email' => ['required', 'email', 'unique:accounts'],
            'signup-password' => ['required', 'password'],
            'signup-handle' => ['required', 'unique:accounts'],
            'signup-firstname' => ['nullable'],
            'signup-middlename' => ['nullable'],
            'signup-lastname' => ['nullable'],
            'signup-country' => ['required'],
            'signup-birthyear' => ['required', 'numeric'],
            'signup-birthmonth' => ['required', 'numeric'],
            'signup-birthday' => ['required', 'numeric'],
            'singup-gender' => ['required']
        ]);

        return $next($request);
    }
}
