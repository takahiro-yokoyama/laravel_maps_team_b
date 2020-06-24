<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewSpot;
use App\Http\Requests\NewSpotRequest;

class AddSpotController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(Request $request){
        $title = '聖地追加';
        $address = $request->input('new_address');
        $lat = $request->input('new_lat');
        $lng = $request->input('new_lng');
        
        return view('add_spot',[
            'title' => $title,
            'address' => $address,
            'lat' => $lat,
            'lng' => $lng,
        ]);
    }
    
    public function store(NewSpotRequest $request){
        $title = '聖地追加';
        $address = $request->input('address');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        
        NewSpot::create([
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'anime_name' => $request->anime_name,
            'spot_name' =>$request->spot_name,
            'spot_content' =>$request->spot_content,
        ]);
        
        \Session::flash('success', '聖地を追加しました！');
        return redirect('/add_spot');
    }
}
