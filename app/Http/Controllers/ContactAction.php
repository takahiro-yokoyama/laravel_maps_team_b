<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactAction extends Controller
{
    function __invoke(){
        return view('question',[
            'title' => 'お問い合わせ'
        ]);
    }
}
