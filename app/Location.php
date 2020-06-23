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
    
    public function spot(){
        return $this->belongsTo('App\Spot');
    }
}
