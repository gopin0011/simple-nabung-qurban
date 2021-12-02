<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plans;

class Images extends Model
{
    protected $fillable = ["file_path"];

    public function plans()
    {
        return $this->hasOne('App\Plans', 'images_id');
    }

    public function usersPlaninngs()
    {
        return $this->hasOne('App\UsersPlannings', 'images_id');
    }
}
