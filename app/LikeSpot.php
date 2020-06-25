<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeSpot extends Model
{
    public $fillable = ['spot_id','user_id'];
}
