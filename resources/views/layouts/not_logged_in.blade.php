@extends('layouts.default')

@section('header')
<header>
    <div class="header_box">
        <a href="">
            <img class="logo" src="{{ asset('logo/logo.png') }}"></img>
        </a>
        <div class="header_menu"><a class="header_link" href="">ログイン</a></div>
        <div class="header_menu header_spe"><a class="header_link" href="">ユーザー登録</a></div>
        <div class="header_menu header_spe"><a class="header_link" href="{{url('/mapSpotsList')}}">聖地一覧</a></div>
    </div>
</header>
@endsection