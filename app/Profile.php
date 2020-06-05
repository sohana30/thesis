<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'image',
        'fName',
        'lName',
        'gender',
        'pNumber',
        'email',
        'program',
        'country',
        'about'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
