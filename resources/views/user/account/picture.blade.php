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

    <script>
        fetch('http://127.0.0.1:3000/api/user/image/list')
            .then(response => response.json())
            .then(data => {
                document.getElementById('sample').innerHTML = "sample";
                
            })
            .catch(error => console.error('Error fetching users:', error));
    </script>

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