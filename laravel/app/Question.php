<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $guarded = [];

    // question has many answers 
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function getFormattedText()
    {
        return '<p>'.$this->text.'</p>';
    }
}
