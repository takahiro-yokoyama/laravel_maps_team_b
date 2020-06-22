<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Location;

class AnimeController extends Controller
{
    public function index(){
        $animes = Anime::get();
        return view('top', [
            'title' => 'トップページ',
            'animes' => $animes,
        ]);
    }
}
