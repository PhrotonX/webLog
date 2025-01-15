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

    <p>Profile Pictures:</p>
    <div id="profile-picture-selection-table">
        <p>Account {{$id}}</p>
        @if($account_pictures != null)
            <p>{{sizeof($account_pictures)}} profile pictures found!</p>
            <div class="dynamic-table">
                @foreach($account_pictures as $picture)
                    <div class="dynamic-table-cell">
                        <div class="profile-picture-table-item">
                            <img
                                class="profile-picture-large"
                                src="{{asset($picture->picture_path)}}"
                                alt="{{asset($picture->alt_text)}}"
                                onclick="editStringField('edit-profile-picture-id', {{$picture->picture_id}})"
                            />

                            {{-- @if ($picture->alt_text != "")
                                <p class="alt-text">{{$picture->alt_text}}</p>    
                            @else
                                <p class="alt-text">Profile Picture</p>
                            @endif --}}
                            
                        </div>
                    </div>
                @endforeach
            </div>
            <table>
                
            </table>
            
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