@extends('layouts.not_logged_in')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<section class="content">
            <!--ここに追加-->
            <div id="search">
                <div class="search_key">
                    <h2>アニメから検索</h2>
                    <form method="get" action="{{ url('/maps/anime') }}" class="search_container">
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
                    <form method="POST" action="" class="search_container">
                        <select name="prefecture_name">
                            <option value="" selected>都道府県</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        <input type="submit" name="submit" value="検索"/>
                    </form>
                    <form method="POST" action="" class="search_container">
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