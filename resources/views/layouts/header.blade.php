@extends('layouts.default')

@section('header')
@if(isset(Auth::user()->name)==false)
<header class="header">
    <div class="header_box">
        <a href="{{ url('/top') }}">
            <img class="logo" src="{{ asset('logo/logo.png') }}"></img>
        </a>
        <div class="header_link">
            <div class="header_menu"><a class="header_link" href="{{ url('/login') }}">ログイン</a></div>
            <div class="header_menu header_spe"><a class="header_link" href="{{url('/register')}}">ユーザー登録</a></div>
            <div class="header_menu header_spe"><a class="header_link" data-toggle="modal" data-target="#login_topic_popup">ルート探索</a></div>
            <div class="header_menu header_spe"><a class="header_link" href="{{ url('/mapSpotsList') }}">聖地一覧</a></div>
            <div class="header_menu header_spe"><a class="header_link" href="{{ url('/top') }}">聖地検索</a></div>
        </div>
        <img id="header_image_usagi10" src="{{ asset('web_image/usagi10.png') }}"></img>
        <div class="header_search">
            <div class="header_search_key">
                <form method="post" action="{{ route('maps.anime_index') }}" class="search_container">
                    @csrf
                    <select name="anime" class="search_anime_select">
                        <option value="">アニメから検索</option>
                        <option value="1">君の名は。</option>
                        <option value="2">けいおん！</option>
                        <option value="3">名探偵コナン</option>
                        <option value="4">こちら葛飾区亀有公園前派出所</option>
                        <option value="5">サザエさん</option>
                        <option value="6">新幹線変形ロボ　シンカリオン</option>
                        <option value="7">天気の子</option>
                        <option value="8">耳をすませば</option>
                        <option value="9">日常</option>
                        <option value="10">火垂るの墓</option>
                        <option value="11">僕だけがいない街</option>
                        <option value="12">時をかける少女</option>
                        <option value="13">ローリング☆ガールズ</option>
                    </select>
                    <input type="submit" name="submit" value="検索">
                </form>
            </div>
            <div class="header_search_key">
                <form method="POST" action="{{ route('maps.place_index') }}" class="search_container">
                    @csrf
                    <input class="" type="text" name="area" placeholder="地域から検索">
                    <input type="submit" name="submit" value="検索">
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="login_topic_popup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class=“modal-title”>ログインください</h3>
                    <button class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ルート検索はログインが必要です。
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">確認</button>
                </div>
            </div>
        </div>
    </div>   
</header>
@else
<header>
    <div class="header_box">
        <a href="{{ url('/top') }}">
            <img class="logo" src="{{ asset('logo/logo.png') }}"></img>
        </a>
        <div class="header_link">
            <div class="header_menu"><p>ユーザー名:{!! Auth::user()->name !!}</p></div>
            <div class="header_menu header_spe">
                <form name="logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="javascript:logout.submit()" class="header_link">ログアウト</a>
                </form>
            </div>
            <div class="header_menu header_spe"><a class="header_link" href="{{route('like.index')}}">ルート探索</a></div>
            <div class="header_menu header_spe"><a class="header_link" href="{{url('/mapSpotsList')}}">聖地一覧</a></div>
            <div class="header_menu header_spe"><a class="header_link" href="{{url('/top')}}">聖地検索</a></div>
        </div>
        <img id="header_image_usagi10" src="{{ asset('web_image/usagi10.png') }}"></img>
        <div class="header_search">
            <div class="header_search_key">
                <form method="post" action="{{ route('maps.anime_index') }}" class="search_container">
                    @csrf
                    <select name="anime" class="search_anime_select">
                        <option value="">アニメから検索</option>
                        <option value="1">君の名は。</option>
                        <option value="2">けいおん！</option>
                        <option value="3">名探偵コナン</option>
                        <option value="4">こちら葛飾区亀有公園前派出所</option>
                        <option value="5">サザエさん</option>
                        <option value="6">新幹線変形ロボ　シンカリオン</option>
                    </select>
                    <input type="submit" name="submit" value="検索">
                </form>
            </div>
            <div class="header_search_key">
                <form method="POST" action="{{ route('maps.place_index') }}" class="search_container">
                    @csrf
                    <input class="" type="text" name="area" placeholder="地域から検索">
                    <input type="submit" name="submit" value="検索">
                </form>
            </div>
        </div>
    </div>
</header>
@endif
@endsection