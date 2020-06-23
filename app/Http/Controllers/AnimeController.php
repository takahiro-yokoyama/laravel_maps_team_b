<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Location;
use App\Services\FunctionService;
use App\Spot;

class AnimeController extends Controller
{
    public function index(){
        $animes = Anime::get();
        return view('top', [
            'title' => 'トップページ',
            'animes' => $animes,
        ]);
    }
    
    public function animeIndex(FunctionService $service, Request $request){
        $id = $request->input('anime');
        $anime = Anime::find($id);
        $spots = $anime->spots;
        $spots_json = $service->getSpotsJson($spots);
        return view('anime_search_index',[
            'title' => 'アニメ検索結果',
            'anime' => $anime,
            'spots' => $spots,
            'spots_json' => $spots_json,
        ]);
    }
    

}
