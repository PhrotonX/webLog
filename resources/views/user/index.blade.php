@extends('layout.master')

@section('content')
@section('title', 'User Profile')

@if (Auth::check())
    @isset($status)
        <p>{{$message}}</p>
    @endisset
    @isset($debug)
        <p>{{print_r($debug)}}</p>
    @endisset

    <h1>{{Auth::user()->username}}</h1>

    @if(Auth::user()->getProfilePicture() != null)
        <img
            src="{{asset(Auth::user()->getProfilePicture()->picture_path)}}"
            alt="{{asset(Auth::user()->getProfilePicture()->alt_text)}}"
        />
    @else
        <p>No profile picture set!</p>
    @endif
    
    <p>First Name: {{Auth::user()->firstname}}</p>
    <p>Middle Name: {{Auth::user()->middlename}}</p>
    <p>Last Name: {{Auth::user()->lastname}}</p>
    <p>Email: {{Auth::user()->email}}</p>
    <p>Handle: {{Auth::user()->handle}}</p>
    <p>Account ID: {{Auth::user()->account_id}}</p>
    <p>Description: {{Auth::user()->description}}</p>
    <p>Birthdate: {{Auth::user()->birthdate}}</p>
    <p>Age: {{Auth::user()->getAge()}}</p>
    <p>Gender: {{Auth::user()->gender}}</p>
    <p>Account Type: {{Auth::user()->type}}</p>
    <p>Created at: {{Auth::user()->created_at}}</p>
    <p>Deleted at: {{Auth::user()->deleted_at}}</p>
    <p>Updated at: {{Auth::user()->updated_at}}</p>
    <br>
    <button onclick="navigate('{{route('user.edit')}}')" class="small-button">Edit</button>
    <button onclick="navigate('{{route('user.logout')}}')" class="small-button">Log out</button>

@else
    {{redirect('user.login')}}
@endif


@stop