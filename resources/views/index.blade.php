@extends('layout.master')

@section('title', 'Home')

@section('content')
<!-- <section class="acrylic shadow parent" id="content"> -->
@if(Auth::check())
    {{-- <h1>Welcome, User {{$userData->username}} {{Auth::id()}} !</h1> --}}
    <h1>User is not null</h1>
    {{-- <p>User ID: {{Auth::user()->id}}</p> --}}
    {{-- <p>User ID: {{$userData->username}}</p> --}}
    <p>Username: {{Auth::user()->username}}</p>
    {{-- <p>Handle: {{Auth:user()->handle}}</p> --}}
    {{-- <p>email: {{Auth::user()->email}}</p> --}}
@else
    <h1>Error: User is null</h1>
@endif


@if(isset($userData))
    <h1>UserData is not null</h1>    
    <h1>Welcome, User {{$userData->username}} {{Auth::id()}} !</h1>
@elseif(isset($error))
    <h1>UserData is null</h1>
@endif

<p></p>
<button class="large-button" onclick="navigate(' {{route('post.create', 'PostController')}} ')">Create a Blog</button>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>

<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>

<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p>
<p>Sample Text</p><p>Sample Text</p>
<p>Sample Text</p>

<br>

@stop