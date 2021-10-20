<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    /**
     * Attributes to guard against mass-assignment.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
}