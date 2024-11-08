@extends('layout.master.dialog')
@section('dialog-id', 'profile-picture-selector')

@section('dialog-title')
    <p>Select Profile Picture</p>
@endsection

@section('dialog-content')
    @if(Auth::user()->profile_picture_id)
        <p>Profile Pictures:</p>
    @else
        <p>No profile picture found</p>
    @endif
    
@endsection

@section('dialog-buttons')
    <button>Cancel</button>
@endsection