<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LikeSpot;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $data = DB::table('like_spots')
                ->join('spots','like_spots.spot_id','=','spots.id')
                ->join('animes','spots.anime_id','=','animes.id')
                ->join('locations','spots.location_id','=','locations.id')
                ->where('user_id','=',\Auth::user()->id)
                ->select('like_spots.id','spots.spot_name','spots.spot_image','spots.spot_content',
                         'animes.anime_name','locations.address','locations.lat',
                         'locations.lng')
                ->get();
        $like_data_json = json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $like_data_json = str_replace('\n','',$like_data_json); 
        $labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return view('like',[
            'like_data'=>$data,
            'like_data_json'=>$like_data_json,
            'labels'=>$labels,
            'title' => 'ルート探索'
            ]);
    }

    public function destroy($id)
    {
        $like_spot = LikeSpot::find($id);
        $like_spot->delete();
        return redirect('/like');
    }
    
    public function findAnddelete(Request $requset){
        $id = $requset->spot_id;
        $like_spots = \Auth::user()->likeSpots;
        foreach($like_spots as $like_spot){
            if($like_spot->spot_id == $id){
                $like_spot->delete();
            };
        }
        exit('true');
    }
}
