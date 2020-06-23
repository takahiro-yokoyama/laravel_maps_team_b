@extends('layouts.not_logged_in')

@section('content')
<div class="login mx-auto text my-5 row">
<h1>ログイン</h1>
<form method="POST" action="{{ route('login') }}" class="form-group">
  @csrf
  <div class="col">
      <label>
        メールアドレス:
        <input id="email" type="email" name="email" class="form-control">
      </label>
  </div>

  <div class="col">
      <label>
        パスワード:
        <input id="password" type="password" name="password" class="form-control">
      </label>
  </div>
  <input type="submit" value="ログイン" class="btn-dark btn-lg btn-block">
</form>
<a href="{{ route('register') }}" class="btn-outline-secondary btn btn-block" role="button">ユーザーの新規作成</a>
</div>
@endsection
