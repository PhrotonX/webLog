@extends('layout.master')

@section('title', 'Home')

@section('content')
<!-- <section class="acrylic shadow parent" id="content"> -->

<h1>Welcome, User ID {{Auth::id()}} !</h1>
<p>{{Auth::check()}}</p>
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