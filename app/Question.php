<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // 配列で設定できるプロパティを記述
    public $fillable = ['content', 'name', 'company', 'email', 'phone'];
}
