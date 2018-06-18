<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 // Models
class Hero extends Model
{
   
    public function image()
    {
        return $this->belongsToMany('App\Image', 'hero_image');
    }
}
