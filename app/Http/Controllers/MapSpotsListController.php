<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapSpotsListController extends Controller
{
    public function __construct(){
        define('API_KEY', getenv('API_KEY'));
    }


    public function index(){
        $data = DB::table('spots')
                    ->join('animes','spots.anime_id','=','animes.id')
                    ->join('locations','spots.location_id','=','locations.id')
                    ->select('animes.anime_name','spots.spot_name','locations.address','locations.lat',
                             'locations.lng','spots.spot_content','spots.spot_image','spots.id')
                    ->get();
        $spots_data_json = json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $spots_data_json = str_replace('\n','',$spots_data_json); 
        return view('map_spotsList',[
            'spots' => $data,
            'spots_data_json' => $spots_data_json,
            'title' => '聖地一覧',
            ]);
    }
}