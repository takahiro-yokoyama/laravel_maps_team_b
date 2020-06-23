<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Spot;

class Anime extends Model
{
    public $fillable = ['id'];
    
    public function spots(){
        return $this -> hasMany('App\Spot');
    }
}
