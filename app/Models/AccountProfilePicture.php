<?php

namespace App\Models;

use App\Models\Account;
use App\Models\ProfilePicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This model refers to the author of a profile picture.
 */
class AccountProfilePicture extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "account_profile_picture";

    /**
     * Access a User model through an ID.
     * $account_pfp->account;
     */
    public function account(){
        return this->belongsTo(User::class);
    }

    /**
     * Access a ProfilePicture model through an ID.
     * 
     * Usage: $account_pfp->picture;
     */
    public function profilePicture(){
        return $this->belongsTo(ProfilePicture::class);
    }
}
