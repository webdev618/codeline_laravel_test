<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'film_id',
        'name',
        'comment'
    ];

    public function film()
    {
        return $this->belongsTo('App\Film');
    }
}
