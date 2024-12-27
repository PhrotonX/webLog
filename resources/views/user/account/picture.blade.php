@extends('layout.master.dialog')
@section('dialog-id', 'profile-picture-selector')

@section('dialog-title')
    <p>Select Profile Picture</p>
@endsection

@section('dialog-content')
    @if(Auth::user()->profile_picture_id)
        
    @else
        <p>No profile picture found</p>
    @endif

    <p>Profile Pictures:</p>
    <p class="sample"></p>

    <p>Upload</p>
    <form
        method="post"
        action="image/store/edit-profile-picture"
        id="edit-profile-picture-form"
        name="edit-profile-picture-form"
        enctype="multipart/form-data">
        @csrf
        @method("POST")
        <input type="file" id="edit-profile-picture" name="edit-profile-picture"/>
        <input type="submit" id="edit-profile-picture-submit" name="editprofile-picture-submit"/>
    </form>
    
    
@endsection

@section('dialog-buttons')
    <button class="acrylic child small-button" onclick="toggleDialog('profile-picture-selector')">Cancel</button>
@endsection