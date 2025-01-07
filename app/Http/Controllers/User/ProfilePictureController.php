<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\PictureController;
use App\Models\Picture;
use App\Models\ProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePictureController extends PictureController
{
    public function store(Request $request, string $requestName){
        $accountId = Auth::id();

        $this->directory .= $accountId . "/pfp/";
        $this->type = 'profile_picture';

        PictureController::store($request, $requestName);

        //return view here...
    }

    protected function onSaveToAssociativeTable(Picture $picture){
        $accountId = Auth::id();
        $profilePicture = new ProfilePicture();
        
        $profilePicture['account_id'] = $accountId;
        $profilePicture['picture_id'] = $picture->id;

        $profilePicture->save();
    }

    /**
     * Retrieves all the profile pictures
     * @param id The account id that is associated with the picture.
     */
    public static function getPictures($id) : array{
        echo $id;
        $profilePictures = ProfilePicture::where('account_id', $id)->get();

        $pictures = [];

        foreach($profilePictures as $profilePicture){
            $pictures[] = Picture::where('picture_id', $profilePicture->picture_id)->get();
        }

        var_dump($pictures[0]);

        return $pictures;
    }
}
