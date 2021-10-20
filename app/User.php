<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


#use Illuminate\Database\Eloquent\Model;
#use Hypefactors\Laravel\Follow\Traits\CanFollow;
#use Hypefactors\Laravel\Follow\Contracts\CanFollowContract;
#class User extends Model implements CanFollowContract
#{
    #use CanFollow;
#}


class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','role','status','google_id','mobile','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }

    #public function ratings()
    #{
        #return $this->hasMany(Rating::class);
    #}


}
