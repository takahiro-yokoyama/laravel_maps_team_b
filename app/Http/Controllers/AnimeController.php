<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Services\FunctionService;
use Illuminate\Support\Facades\DB;


class AnimeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
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
        $data = DB::table('spots')
                    ->join('locations','spots.location_id','=','locations.id')
                    ->select('spots.spot_name','locations.address','locations.lat',
                             'locations.lng','spots.spot_content','spots.spot_image','spots.id')
                    ->get();
        $spots_json = $service->getSpotsJson($data);
        $user_id = \Auth::user()->id;
        return view('anime_search_index',[
            'title' => 'アニメ検索結果',
            'anime' => $anime,
            'spots' => $spots,
            'spots_json' => $spots_json,
            'user_id' => $user_id
        ]);
    }
    

}
