@extends('layouts.header')

@section('title', $title)

@section('content')
<div class="contact mx-auto">
<h1>お問い合わせフォーム</h1>
<p>聖地の掲載・修正、アプリに関するご意見、ご要望など、お気軽にお問い合わせください。</p>

<form action="{{ url('/contact')}}" method="post" class="form-group">
    @csrf
    <!--@method('patch')-->
    <h2>お問い合わせ内容</h2>
    <textarea name="content" cols="50" rows="5"  placeholder="お問い合わせ内容は30文字以上1000文字以下で入力してください" class="form-control"></textarea>
    <h2>お客様情報</h2>
    
    <div>
        <label class="question_form">
            氏名
            <input type="text" name="name" class="form-control"  placeholder="大川 慧(20文字以下で入力してください)" size="50"/>
        </label>
    </div>
    <div>
        <label class="question_form">
            会社名
            <input type="text" name="company" class="form-control" placeholder="株式会社 〇〇(20文字以下で入力してください)" size="50"/>
        </label>
    </div>
    <div>
        <label class="question_form">
            メールアドレス
            <input type="mail" name="email" class="form-control"  placeholder="akira-okawa@ex.jp" size="50"/>
        </label>
    </div>
    <div>
        <label class="question_form">
            お電話番号(ハイフンなし)
            <input type="text" name="phone" class="form-control" placeholder="01234567890" size="50"/>
        </label>
    </div>
    <input type="submit" value="送信" class="w-100">
</form>
</div>
@endsection