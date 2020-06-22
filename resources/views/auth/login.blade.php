@extends('layouts.not_logged_in')

@section('content')
<h1>ログイン</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label>
        ユーザー名:
        <input id="name" type="name" name="name">
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
@endsection
