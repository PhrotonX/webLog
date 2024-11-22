<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ValidateEdit
{
    /**
     * Handle an incoming edit request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $attributes = [
            'edit-username' => 'username',
            'edit-handle' => 'handle',
            'edit-firstname' => 'firstname',
            'edit-middlename' => 'middlename',
            'edit-lastname' => 'lastname',
            'edit-birthyear' => 'birthyear',
            'edit-birthmonth' => 'birthmonth',
            'edit-birthday' => 'birthday',
            'edit-country' => 'country',
            'edit-gender' => 'gender',
        ];

        $validator = Validator::make($request->all(), [
            'email' => ['email', 'unique:accounts'],
            'handle' => ['unique:accounts'],
            'firstname' => ['nullable'],
            'middlename' => ['nullable'],
            'lastname' => ['nullable'],
            'birthyear' => ['numeric'],
            'birthmonth' => ['numeric'],
            'birthday' => ['numeric'],
        ]);

        $validator->setAttributeNames($attributes);
        $validator->validate();

        return $next($request);
    }
}
