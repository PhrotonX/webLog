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

    protected function onSaveToAssociativeTable(Picture $picture){
        //Obtain the accoutn ID.
        $accountId = Auth::id();

        //Create a ProfilePicture object.
        $profilePicture = new ProfilePicture();

        //Set the profile picture foreign ID with the same ID as the picture.
        $profilePicture['picture_id'] = $picture->picture_id;

        //Shrink the profile picture before saving.
        $profilePicture = $this->onShrinkPicture($picture, $profilePicture);

        $profilePicture->save();

        dump($profilePicture->toArray());

        //Create an associative entity named AccountProfilePicture.
        $accountProfilePicture = new AccountProfilePicture();

        //Set the data into the associative entity.
        $accountProfilePicture['account_id'] = $accountId;
        $accountProfilePicture['pfp_id'] = $profilePicture->pfp_id;

        $accountProfilePicture->save();
    }

    /**
     * Shrinks photos witht the following sizes:
     * Large: 360x360
     * Medium: 160x160
     * Small: 90x90
     * Extra Small: 32x32
     * 
     * The resulting images will be saved on the same folder where the original images were stored
     * with the size of images appended on the end of file name.
     * 
     * Supported file extensions are JPG, JPEG, JPE, JFIF, PNG, and GIF.
     * 
     * @param picture The picture entity. Is required to retrieve the filepath of the original image.
     * @param profilePicture The profile picture entity. Is required to save the filepath of the
     * shrunken image.
     * 
     * @return ProfilePicture An updated profile picture.
     */
    public function onShrinkPicture(Picture $picture, ProfilePicture &$profilePicture) : ProfilePicture{
        //Retrieve the file extension for checking.
        $extension = $picture->getFileExtension($picture->picture_path, false);

        $image = null;
        static $SIZES = ['_l', '_m', '_s', '_xs'];
        $size_count = count($SIZES);

        //An annonymous function that esize and save the images.
        $resize = function() use ($size_count, $SIZES, &$extension, &$image, &$picture, &$profilePicture){
            $resizedImage = null;

            for($i = 0; $i < $size_count; $i++){
                //Resize the image.
                $resizedImage[$i] = imagescale($image, 720 / (2 * ($i + 1)), 720 / (2 * ($i + 1)));

                //Make a new filepath with the size of image appended on the end of the file name.
                $newFilePath = $picture->removeFileExtension($picture->picture_path) . $SIZES[$i] . '.' . $extension;

                //Save the image.
                imagejpeg($resizedImage[$i], $newFilePath);

                //Save the filepath of shrunken images to database.
                switch($SIZES[$i]){
                    case '_l':
                        $profilePicture->pfp_large = $newFilePath;
                        break;
                    case '_m':
                        $profilePicture->pfp_medium = $newFilePath;
                        break;
                    case '_s':
                        $profilePicture->pfp_small = $newFilePath;
                        break;
                    case '_xs':
                        $profilePicture->pfp_xs = $newFilePath;
                        break;
                }
            }
        };

        // Checks if the file type is compatible for image resizing and then invokes the annoymous
        // function resize().
        switch($extension){
            case ProfilePicture::$EXTENSION_JPG;
            case ProfilePicture::$EXTENSION_JPEG;
            case ProfilePicture::$EXTENSION_JPEG;
            case ProfilePicture::$EXTENSION_JFIF;
                $image = imagecreatefromjpeg($picture->picture_path);
                $resize();
                break;
            case ProfilePicture::$EXTENSION_PNG:
                $image = imagecreatefrompng($picture->picture_path);
                $resize();
                break;
            case ProfilePicture::$EXTENSION_GIF:
                $image = imagecreatefromgif($picture->picture_path);
                $resize();
                break;
            default:
                echo "File extension " . $extension . " is not supported. JPG, PNG, and GIF are only supported.";
                return null;
                break;
        }

        //dd($profilePicture->toArray());
        
        //Return the updated profile picture.
        return $profilePicture;
    }
    
    public function store(Request $request, string $requestName){
        $accountId = Auth::id();

        $this->directory .= $accountId . "/pfp/";
        $this->type = 'profile_picture';

        PictureController::store($request, $requestName);

        //return view here...
    }
}
