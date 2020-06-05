<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $guarded =[];
    public function commented()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsto('App\User');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment','commented')->latest;
    }

}
