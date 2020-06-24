<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Anime;
use App\Spot;

class Spot extends Model
{
    public function anime(){
        return $this->belongsTo('App\Anime');
    }
    
    public function location(){
        return $this->belongsTo('App\Location');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
