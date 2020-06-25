<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['user_id', 'spot_id', 'comment'];
    
    public function spot(){
        return $this->belongsTo('App\Spot');
    }
    
    // public function anime(){
    //     return $this->belongsTo('App\Anime');
    // }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
