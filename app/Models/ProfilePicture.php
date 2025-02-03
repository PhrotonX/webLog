<?php

namespace App\Models;

use App\Models\Picture;
use App\Models\File;
use App\Models\FilePicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This model refers to the Picture model of type ProfilePicture.
 */
class ProfilePicture extends Model
{
    use HasFactory;
    use File;
    use FilePicture;

    public $timestamps = false;

    protected $table = "profile_picture";

    protected $primaryKey = 'pfp_id';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'picture_id',
    //     'pfp_large',
    //     'pfp_medium',
    //     'pfp_small',
    //     'pfp_xs',
    // ];

    /**
     * Casts the fields on the table that is NULL by default.
     */
    protected $casts = [
        'pfp_large' => 'string',
        'pfp_medium' => 'string',
        'pfp_small' => 'string',
        'pfp_xs' => 'string',
    ];

    /**
     * Access the Picture model through a foreign key.
     * 
     * Usage: $pfp->picture;
     */
    public function picture(){
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
