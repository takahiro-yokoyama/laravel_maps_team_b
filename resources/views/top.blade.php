@extends('layouts.not_logged_in')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<section class="content">
            <!--ここに追加-->
            <div id="search">
                <div class="search_key">
                    <h2>アニメから検索</h2>
                    <form method="post" action="{{ route('maps.anime_index') }}" class="search_container">
                        @csrf
                        <select name="anime">
                            @foreach($animes as $anime)
                            <option value="{{ $anime->id }}">{{ $anime->anime_name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="submit" value="検索">
                    </form>
                </div>
                <div class="search_key">
                    <h2>地域から検索</h2>
                    <form method="POST" action="{{ route('maps.place_index') }}" class="search_container">
                        @csrf
                        <input type="text" name="area" placeholder="地名を入力してください">
                        <input type="submit" name="submit" value="検索">
                    </form>
                </div>
            </div>
            <h2 class="beginner_link"><a href="{{ url('/guide') }}">はじめての方へ</a></h2>
            <h2>聖地巡礼のマナー</h2>
            <div class="manner">
                <h3>聖地は二次元ではなく現実です</h3>
                <p>聖地は歴史的に重要な建物から個人宅まで様々な場所があります。建物の破壊行為やゴミのポイ捨てなどはNGです！</p>
                <p>また聖地のほとんどは、聖地巡礼の為に用意された場所ではありません。そこで働く人、住んでいる人がいることを十分理解し、現地の方々に不信感を与えないようにしていきましょう。</p>
            </div>
            <div class="manner">
                <h3>写真撮影について</h3>
                <p>SNS等で聖地の写真をたくさん見かけるようになりましたが、写真撮影NGの場所も少なくありません。</p>
                <p>特に公共施設や個人宅などの写真や位置情報の取扱いには十分注意してください。</p>
            </div>
            <div class="manner">
                <h3>街やアニメに感謝の気持ちを忘れずに</h3>
                <p>確かに観光や協賛商店等では、アニメの舞台に取り上げられることで経済が活性化するのは事実ですが、迎え入れる土地の人々もおもてなしをしてくれている対等な関係であることを忘れてはいけません。</p>
            </div>
            
        </section>

@endsection