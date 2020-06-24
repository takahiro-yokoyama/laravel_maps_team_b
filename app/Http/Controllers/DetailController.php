<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

//クラスのインポート
use App\Anime;
use App\Spot;
use App\Location;
use App\Comment;
use App\User;

use App\Services\FunctionService;
use Illuminate\Support\Facades\DB;


class DetailController extends Controller
{

    //投稿詳細
    public function detail(FunctionService $service, $id)
    {
        $spots = Spot::where('id', $id)->get();
        $comments = Comment::where('spot_id', $id)->get();
        $datas = DB::table('spots')
                ->join('locations','spots.location_id','=','locations.id')
                ->select('locations.lat','locations.lng')
                ->where('spots.id', $id)
                ->get();
        $username='';
        if(isset(\Auth::user()->name)){
            $username=\Auth::user()->name;
        }
        $spots_json = $service->getSpotsJson($datas);
        return view('spot_detail', [
          'title' => 'スポット詳細',
          'spots' => $spots,
          'comments' => $comments,
          'spots_json' => $spots_json,
          'user_name'=>$username,
        ]);
    }
    
    //コメントクリエイト
    public function store(CommentRequest $request) {
        Comment::create([
            'comment' => $request->comment,
            'spot_id' => $request->spot_id,
            'user_id' => \Auth::user()->id,
        ]);
        \Session::flash('success', 'コメントを追加しました');
        return redirect('/detail/' . $request->spot_id);
    }
}
