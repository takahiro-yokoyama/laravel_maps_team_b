<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\LikeSpot;
use App\Services\FunctionService;
use Illuminate\Support\Facades\DB;


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
        $data = DB::table('spots')
                    ->join('locations','spots.location_id','=','locations.id')
                    ->join('animes','spots.anime_id','=','animes.id')
                    ->select('spots.spot_name','locations.address','locations.lat',
                             'locations.lng','spots.spot_content','spots.spot_image','spots.id',
                             'spots.business_name','spots.business_time','spots.price','spots.business_content',
                             'spots.business_image','animes.anime_name')
                    ->where('animes.id','=',$id)
                    ->get();
                    
        $spots_data_json = json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $spots_data_json = str_replace('\n','',$spots_data_json);             
        $user_id = '';
        $user_name = '';
        $u_l_data = [];
        if(isset(\Auth::user()->name)){
            $user_name = \Auth::user()->name;
            $user_id = \Auth::user()->id;
            $like_spots = \Auth::user()->likeSpots;
            $u_l_data = $like_spots->pluck('spot_id');
            $u_l_data=$u_l_data->toArray();
        }
        $user_like_spot_data_json = json_encode($u_l_data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $user_like_spot_data_json = str_replace('\n','',$user_like_spot_data_json); 
        return view('anime_search_index',[
            'anime' => $anime,
            'spots' => $spots,
            'spots_json' => $spots_data_json,
            'user_id' => $user_id,
            'user_name'=>$user_name,
            'u_l_data'=>$u_l_data,
            'user_like_spot_data_json'=>$user_like_spot_data_json,
            'title' => '検索結果'
        ]);
    }
    
    public function placeIndex(Request $request){
        $place = $request->input('area');
        $data = DB::table('spots')
                    ->join('locations','spots.location_id','=','locations.id')
                    ->join('animes','spots.anime_id','=','animes.id')
                    ->select('spots.spot_name','locations.address','locations.lat','spots.location_id',
                             'locations.lng','spots.spot_content','spots.spot_image','spots.id',
                             'spots.business_name','spots.business_time','spots.price','spots.business_content',
                             'spots.business_image','animes.anime_name')
                    ->where('locations.address','like','%'.$place.'%')
                    ->get();
        
        $spots_data_json = json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $spots_data_json = str_replace('\n','',$spots_data_json);             
        $user_id = '';
        $user_name = '';
        $u_l_data = [];
        if(isset(\Auth::user()->name)){
            $user_name = \Auth::user()->name;
            $user_id = \Auth::user()->id;
            $like_spots = \Auth::user()->likeSpots;
            $u_l_data = $like_spots->pluck('spot_id');
            $u_l_data=$u_l_data->toArray();
        }
        $user_like_spot_data_json = json_encode($u_l_data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $user_like_spot_data_json = str_replace('\n','',$user_like_spot_data_json); 
        return view('place_search_index',[
            'place' => $place,
            'spots' => $data,
            'spots_json' => $spots_data_json,
            'user_id' => $user_id,
            'user_name'=>$user_name,
            'u_l_data'=>$u_l_data,
            'user_like_spot_data_json'=>$user_like_spot_data_json,
            'title' => '検索結果'
        ]);
    }
    
    public function likeSpotsselect($id){
        $like_sports = \Auth::user()->likeSpots;
        $data = $like_sports->find($spot_id);
        if(count($data)>0){
            $select_result = true;
            exit($select_result);
        }else{
            exit($select_result);
        }
    }
    public function likeSpotInsert($id){
        // $like_spot = new LikeSpot();
        // $like_spot->user_id = \Auth::user()->id;
        // $like_spot->spot_id = $id;
        likeSpot::create([
            'user_id'=>\Auth::user()->id,
            'spot_id'=>$id,
            ]);
        $select_result = 'true';
        exit($select_result);
    }
}
