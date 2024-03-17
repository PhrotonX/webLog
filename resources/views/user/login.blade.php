@extends('layout.master')

@section('title', 'Login')

@section('content')
<h1>Log In or Sign Up</h1>

@if ($status == "none")
    <p>Already had an account? Login.</p>
@elseif ($status == "error")
    <div class="acrylic shadow parent">
        <blockquote>
            <p>Invalid email or password!</p>
        </blockquote>
    </div>    

@elseif ($status == "null")
    <div class="acrylic shadow parent">
        <blockquote>
            <p>null</p>
        </blockquote>
    </div>    
@endif

{{-- Update this to use it's own non-resource controller. --}}
<form action="{{route('user.login_config')}}" method="post" name="login-form" autocomplete="on">
    @csrf
    @method('POST')
    <table class="form-table">
        <colgroup>
            <col class="form-table-label"/>
            <col class="form-table-field"/>
        </colgroup>
        <tr>
            <td>
                <label for="login-email">Email: </label>
            </td>
            <td>
                <input class="input-text" type="email" id="login-email" name="login-email"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="login-password">Password: </label>
            </td>
            <td>
                <input class="input-text" type="password" id="login-password" name="login-password"/>
            </td>
        </tr>
        <tr>
            <td>
                <input class="small-button" type="submit">
                <input class="small-button" type="reset">
            </td>
            
        </tr>
    </table>
</form>

<p>Don't have an account? <a href="{{route('user.create')}}">Sign Up.</a></p>


@stop