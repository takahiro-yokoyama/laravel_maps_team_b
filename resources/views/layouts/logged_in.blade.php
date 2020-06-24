@extends('layouts.default')

@section('header')
<header>
    <div class="header_box">
        <a href="{{ url('top') }}">
            <img class="logo" src="{{ asset('logo/logo.png') }}"></img>
        </a>
        <div class="header_menu">ユーザー名:{{ Auth::user()->name }}さん</div>
        <div class="header_menu header_spe">
            <form name="logout" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="javascript:logout.submit()" class="header_link">ログアウト</a>
            </form>
        </div>
        <div class="header_menu header_spe"><a class="header_link" href="">ルート探索</a></div>
        <div class="header_menu header_spe"><a class="header_link" href="{{url('/mapSpotsList')}}">聖地一覧</a></div>
    </div>
</header>
@endsection