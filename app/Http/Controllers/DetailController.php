<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//クラスのインポート
use App\Anime;
use App\Spot;
use App\Location;
use App\Comment;
use App\User;

class DetailController extends Controller
{
    //スポット詳細
    
    //投稿詳細
    public function detail($id)
    {
        $spots = Spot::where('id', $id)->get();
        foreach($spots as $for_table) { }
        $animes = Anime::where('id', $for_table->anime_id)->get();
        $locations = Location::where('id', $for_table->location_id)->get();
        $comments = Comment::where('spot_id', $id)->get();
        foreach($comments as $for_user) { }
        $users = User::where('id', $for_user->user_id)->get();
        return view('spot_detail', [
          'title' => 'スポット詳細',
          'spots' => $spots,
          'animes' => $animes,
          'locations' => $locations,
          'comments' => $comments,
          'users' => $users,
        ]);
    }
    
    // //コメント投稿
    // public function spots(Request $request) {
    //     // Commentモデルを利用して空のCommentオブジェクトを作成
    //     $new_comment = new Comment;
        
    //     // フォームから送られた値でcommentとspot_idを設定
    //     $new_comment->comment = $request->comment;
    //     $new_comment->id = $request->spot_id;
        
    //     // テーブルにINSERT
    //     $new_comment->save();

    //     // メッセージ一覧ページにリダイレクト
    //     return redirect('/detail');
    // }
}
