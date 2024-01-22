<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The explicit name of table associated with the model.
     * 
     * @var string
     */
    protected $table = 'posts';

    /**
     * The explicit name of primary key associated with the model.
     * 
     * @var string
     */
    protected $primaryKey = 'post_id';

    /**
     * The explicit boolean of setting auto-increment to the primary key associated with the model.
     * 
     * @var bool
     */
    //public $incrementing = true;

    /**
     * The explicit/overriden value for datatype of primary key associated with the model.
     * 
     * @var string
     */
    //protected $keyType = 'BIGINT(20) UNSIGNED NOT NULL';
}
