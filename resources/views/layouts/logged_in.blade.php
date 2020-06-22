@extends('layouts.default')

@section('header')
<header>
    <ul class="header_box header_nav">
        <li class="header_menu">
            <a href="">
                <img class="logo" src="{{ asset(web_image/logo.png) }}"></img>
            </a>
        </li>
        <li class="header_menu">
            <a class="header_link" href="{{ route('') }}">
                聖地一覧
            </a>
        </li>
        <li class="header_menu">
            <a class="header_link" href="{{ route('') }}">
                ルート探索
            </a>
        </li>
        <li class="header_menu">
            ユーザー名:{{ Auth::user()->name }}さん
        </li>
        <li class="header_menu">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
</header>
@endsection