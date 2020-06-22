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
            <a class="header_link" href="{{ route('register') }}">
                ユーザー登録
            </a>
        </li>
        <li class="header_menu">
            <a class="header_link" href="{{ route('login') }}">
                ログイン
            </a>
        </li>
    </ul>
</header>
@endsection