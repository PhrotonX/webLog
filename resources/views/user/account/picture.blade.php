@extends('layout.master.dialog')
@section('dialog-id', 'profile-picture-selector')

@section('dialog-title')
    <p>Select Profile Picture</p>
@endsection

@section('dialog-content')
    @if(Auth::user()->profile_picture_id)
        
    @else
        <p>No profile picture set.</p>
    @endif

    <script>
        $(document).ready(function(){
            
        });
    </script>

    <p>Profile Pictures:</p>
    <div id="profile-picture-selection-table">
        <p>Account {{$id}}</p>
        @if($account_pictures != null)
            <p>{{sizeof($accoount_pictures)}} profile pictures found!</p>
            @foreach($account_pictures as $picture)
                <p>Picture: {{$picture->picture_path}}</p>
            @endforeach
        @else
            <p>Profile pictures not found!</p>
        @endif
    </div>

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