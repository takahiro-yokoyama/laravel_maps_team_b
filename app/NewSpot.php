<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewSpot extends Model
{
    public $fillable = [
        'address',
        'lat',
        'lng',
        'anime_name',
        'spot_name',
        'spot_content',
    ];
}
