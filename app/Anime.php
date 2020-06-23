<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    public function spots(){
        return $this->hasmany('App\Spot');
    }
}
