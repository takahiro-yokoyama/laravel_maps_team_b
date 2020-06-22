@extends('layouts.not_logged_in')

@section('content')
<h1>会員登録</h1>
<div class="container" class="login_body">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div>
        <label>
          ユーザー名:
          <input type="text" name="name">
        </label>
      </div>
    
      <div>
        <label>
          メールアドレス:
          <input type="email" name="email">
        </label>
      </div>
    
      <div>
        <label>
          パスワード:
          <input type="password" name="password">
        </label>
      </div>
    
      <div>
        <label>
          パスワード（確認用）:
          <input type="password" name="password_confirmation" >
        </label>
      </div>
      <div>
        <input type="submit" value="登録">
      </div>
    </form>
</div>
@endsection