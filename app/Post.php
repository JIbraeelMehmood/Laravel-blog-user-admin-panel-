<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

//public $timestamps=false;
use  SoftDeletes;
protected $fillable = [
    'title', 'category','body','user_id',
];
protected $dates = ['deleted_at'];

    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function allRelatedratings(){
        return $this->belongsToMany(Rating::class)->withPivot('rating');
    }
}
