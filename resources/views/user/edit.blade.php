@if (Auth::check())

    @extends('user.form_master')
@else
    <h1>Not logged in!</h1>
    <button onclick="navigate('{{route('user.login')}}')">Log in</button>
@endif

