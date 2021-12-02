<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Images;

class Plans extends Model
{
    protected $fillable = [
        'images_id',
    ];

    public function images()
    {
        return $this->belongsTo('App\Images');
    }
}
