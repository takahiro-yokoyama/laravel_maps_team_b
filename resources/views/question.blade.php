@extends('layouts.header')

@section('content')
<div class="contact mx-auto">
<h1>お問い合わせ</h1>
<p>お気軽にお問い合わせください</p>

<form action="" method="post" class="form-group">
    @csrf
    @method('patch')
    <h2>お問い合わせ内容</h2>
    <textarea name="content" cols="50" rows="5" class="form-control"></textarea>
    <h2>お客様情報</h2>
    <div class="form-row">
        <div class="col-6">
            <label>
                姓
                <input type="text" name="last" class="form-control form-inline"/>
            </label>
        </div>
        <div class="col-6">
            <label>
                名
                <input type="text" name="first" class="form-control"/>
            </label>
        </div>
    </div>
    <div>
        <label>
            会社名
            <input type="text" name="company" class="form-control" size="50"/>
        </label>
    </div>
    <div>
        <label>
            メールアドレス
            <input type="mail" name="mail" class="form-control" size="50"/>
        </label>
    </div>
    <div>
        <label>
            お電話番号
            <input type="text" name="phone" class="form-control" size="50"/>
        </label>
    </div>
    <input type="submit" value="送信" class="w-100">
</form>
</div>
@endsection