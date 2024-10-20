<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = "accounts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'handle',
        'password_hash',
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'gender',
        'description',
        'country',
        'type',
    ];

    /*protected $guarded = [
        
    ];*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    protected $primaryKey = 'account_id';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        'password_hash' => 'hashed',
    ];

    public function post(){
        return $this->hasOne('App\Models\Post');
    }

    public function getAge(){
        $timezone = "Asia/Manila";

        $currentDate = new \DateTime($timezone);
        $dateToCompare = new \DateTime($this->birthdate, new \DateTimeZone($timezone));
        $result = $currentDate->diff($dateToCompare, $timezone);
        $age = $result->y;

        return $age;
    }

    public function getAuthPassword(){
        return $this->password_hash;
    }

    /*
    public function setPasswordAttribute($password){
        $this->attributes['password_hash'] = $bcrypt($password);
    }*/
}
