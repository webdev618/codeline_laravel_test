<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'release_date',
        'rating',
        'ticket_price',
        'country',
        'genre',
        'photo',
        'url',
        'description'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'film_id');
    }
}
