<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPlannings extends Model
{
    protected $fillable = ['plans_id','plans', 'price', 'description', 'users_id', 'images_id'];

    public function images()
    {
        return $this->belongsTo('App\Images');
    }
}
