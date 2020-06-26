<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    //書き込み処理
    public function store(Request $request){

        // // Messageモデルを利用して空のMessageオブジェクトを作成
        // $question = new Question;

        // // フォームから送られた値でカラムを設定
        // $question->content = $request->content;
        // $question->name = $request->name;
        // $question->company = $request->company;
        // $question->mail = $request->mail;
        // $question->phone = $request->phone;

        // // messagesテーブルにINSERT
        // $question->save();
        
        // validateメソッドでバリデーション
        $request->validate([
            'content' => ['required', 'min:30', 'max:1000'],
            'name' => ['required', 'min:2', 'max:20'],
            'company' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email', 'min:2', 'max:50'],
            'phone' => ['required', 'numeric', 'min:0'],
        ]);
        
        $question = Question::create(
          $request->only([
            'content',
            'name',
            'company',
            'email',
            'phone'
          ])
        );
        
        \Session::flash('success', 'お問い合わせを受け付けました。ありがとうございました。');
        
        // $question = Question::create([
        //   'content' => $request->content,
        //   'name' => $request->name,
        //   'company' => $request->company,
        //   'mail' => $request->mail,
        //   'phone' => $request->phone,
        // ]);
        
        // 問い合わせページにリダイレクト
        return redirect('/contact');
    }
}
