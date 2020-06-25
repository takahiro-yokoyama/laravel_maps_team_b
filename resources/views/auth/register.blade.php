@extends('layouts.header')

@section('title', '会員登録')

@section('content')
<div class="login mx-auto my-5 row">
<h1>会員登録</h1>
    <form method="POST" action="{{ route('register') }}" class="form-group">
      @csrf
      <div class="col">
        <label>
          ユーザー名:
          <input type="text" name="name" class="form-control">
        </label>
      </div>
    
      <div class="col">
        <label>
          メールアドレス:
          <input type="email" name="email" class="form-control">
        </label>
      </div>
    
      <div class="col">
        <label>
          パスワード:
          <input type="password" name="password" class="form-control">
        </label>
      </div>
    
      <div class="col">
        <label>
          パスワード（確認用）:
          <input type="password" name="password_confirmation" class="form-control">
        </label>
      </div>
      <div>
        <input type="submit" value="登録" class="btn-dark btn-lg btn-block">
      </div>
    </form>
</div>
@endsection