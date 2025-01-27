<?php

namespace App\Models;

use App\Models\Picture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This model refers to the Picture model of type ProfilePicture.
 */
class ProfilePicture extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "profile_picture";

    protected $primaryKey = 'pfp_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Access the Picture model through a foreign key.
     * 
     * Usage: $pfp->picture;
     */
    public function picture(){
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
