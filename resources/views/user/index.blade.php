@extends('layout.master')

@section('content')
@section('title', 'User Profile')

<h1>{{Auth::user()->username}}</h1>
<p>{{Auth::user()->email}}</p>
<p>{{Auth::user()->handle}}</p>
<p>{{Auth::user()->id}}</p>
<p>{{Auth::user()->firstname}} {{Auth::user()->middle_name}}, {{Auth::user()->lastname}}</p>
<p>{{Auth::user()->descriptionh}}</p>
<p>{{Auth::user()->birthdate}}</p>
<p>{{Auth::user()->age}}</p>
<br>
<button class="small-button">Edit</button>
<button class="small-button">Log out</button>

@stop