<?php

namespace App\Models;
use App\Models\File;
use App\Models\FilePicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Picture extends Model
{
    # Traits
    use HasFactory;
    use File;
    use FilePicture;

    public $timestamps = false;

    protected $primaryKey = "picture_id";
    protected $table = "picture";
    protected $keyType = 'int';
}
