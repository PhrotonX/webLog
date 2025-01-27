<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\PictureController;
use App\Models\Picture;
use App\Models\ProfilePicture;
use App\Models\AccountProfilePicture;
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
        //Obtain the accoutn ID.
        $accountId = Auth::id();

        //Create a ProfilePicture object.
        $profilePicture = new ProfilePicture();

        //Set the profile picture foreign ID with the same ID as the picture.
        $profilePicture['picture_id'] = $picture->picture_id;

        //Make compressed pictures.
        //onCompressPicture($profilePicture);

        $profilePicture->save();

        //Create an associative entity named AccountProfilePicture.
        $accountProfilePicture = new AccountProfilePicture();

        //Set the data into the associative entity.
        $accountProfilePicture['account_id'] = $accountId;
        $accountProfilePicture['pfp_id'] = $profilePicture->pfp_id;
        
        
        $accountProfilePicture->save();
    }
    
    /*
    protected function onCompressPicture(ProfilePicture $picture){
        //@TODO: Implement this feature.
    }*/

    /**
     * Retrieves all the profile pictures
     * @param id The account id that is associated with the picture.
     */
    public static function getPictures($id) : array{
        $accountProfilePictures = AccountProfilePicture::where('account_id', $id)->get();

        $pictures = [];

        foreach($accountProfilePictures as $accountProfilePicture){
            $pictures[] = ProfilePicture::where('pfp_id', $accountProfilePicture->pfp_id)->first();
        }

        return $pictures;
    }
}
