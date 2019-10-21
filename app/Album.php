<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    public function music(){
        return $this->hasMany('App\Music');
    }
}
