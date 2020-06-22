@extends('layouts.not_logged_in')

@section('content')
<h1>ログイン</h1>
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div>
      <label>
        メールアドレス:
        <input id="email" type="email" name="email">
      </label>
  </div>

  <div>
      <label>
        パスワード:
        <input id="password" type="password" name="password" >
      </label>
  </div>
  <input type="submit" value="ログイン">
</form>
<a href="{{ route('register') }}">ユーザーの新規作成</a>
@endsection
