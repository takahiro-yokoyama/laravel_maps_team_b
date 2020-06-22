<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideAction extends Controller
{
     function __invoke(){
        $title = '初めての方へ';
        return view('guide',[
            'title' => $title,
        ]);
     }
}
