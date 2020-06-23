<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Anime;
use App\Spot;

class Location extends Model
{
    public function anime(){
        return $this->belongsTo('App\Anime');
    }
    
    public function Spot(){
        return $this->belongsTo('App\Spot');
    }
}
