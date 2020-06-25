@extends('layouts.header_top')

@section('title', $title)

@section('content')
<section class="content">
    <div class="container">
        <div id="cl1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#cl1" data-slide-to="0" class="active"></li>
                <li data-target="#cl1" data-slide-to="1"></li>
                <li data-target="#cl1" data-slide-to="2"></li>
                <li data-target="#cl1" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('logo/show1.png')}}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('logo/show2.png')}}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('logo/show3.png')}}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('logo/show4.png')}}" class="d-block w-100">
                </div>
            </div>
            <a class="carousel-control-prev" href="#cl1" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#cl1" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <div id="search">
        <div class="search_key">
            <h2>アニメから検索</h2>
            <form method="post" action="{{ route('maps.anime_index') }}" class="search_form search_container">
                @csrf
                <select name="anime" class="search_anime_select">
                    @foreach($animes as $anime)
                    <option value="{{ $anime->id }}">{{ $anime->anime_name }}</option>
                    @endforeach
                </select>
                <input type="submit" name="submit" value="検索">
            </form>
        </div>
        <div class="search_key">
            <h2>地域から検索</h2>
            <form method="POST" action="{{ route('maps.place_index') }}" class="search_container" name="cnvForm">
                @csrf
                <input class="search_area_text" type="text" onKeyUp="checkNum()" name="area" placeholder="東京都">
                <input type="submit" name="submit" value="検索">
            </form>
        </div>
        <div>
            <img id="top_image_usagi4" src="web_image/usagi4.jpg">
        </div>
    </div>
    <h2 class="beginner_link"><a href="{{ url('/guide') }}">はじめての方はこちら</a></h2>
    <div class="top_text">
        <h2>
            <img class="kaeru" src="web_image/kaeru.png">
            聖地巡礼のマナー
            <img src="web_image/usagi.png">
        </h2>
        <div class="manner">
            <h3 class="top_h3">★聖地は二次元ではなく現実です</h3>
            <p>聖地は歴史的に重要な建物から個人宅まで様々な場所があります。建物の破壊行為やゴミのポイ捨てなどはNGです！</p>
            <p>また聖地のほとんどは、聖地巡礼の為に用意された場所ではありません。そこで働く人、住んでいる人がいることを十分理解し、</p>
            <p>現地の方々に不信感を与えないようにしていきましょう。</p>
        </div>
        <div class="manner">
            <h3 class="top_h3">★写真撮影について</h3>
            <p>SNS等で聖地の写真をたくさん見かけるようになりましたが、写真撮影NGの場所も少なくありません。</p>
            <p>特に公共施設や個人宅などの写真や位置情報の取扱いには十分注意してください。</p>
        </div>
        <div class="manner">
            <h3 class="top_h3">★街やアニメに感謝の気持ちを忘れずに</h3>
            <p>確かに観光や協賛商店等では、アニメの舞台に取り上げられることで経済が活性化するのは事実ですが、</p>
            <p>迎え入れる土地の人々もおもてなしをしてくれている対等な関係であることを忘れてはいけません。</p>
        </div>
        <img src="web_image/kaeru1.png">
    </div>
</section>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('JS/main_js.js') }}"></script>
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<script>
    function checkNum(){
    	var txt = document.cnvForm.area.value;
    	var result = "";
    	for (i=0; i<txt.length; i++){
        	if (txt.match(/[<>]/)===null){
        		result =  txt;
        	}else{
        	    result = "";
            }
        }
    	document.cnvForm.area.value = result;
    }
</script>
@endsection