@extends('layouts.header')

@section('content')
<div class="guide">
    <br>
    <div>
        <h1 class="guide_h1">初めての方へ</h1>
    </div>
    <img class="guide_img" src="web_image/guide_img1.png"><br>
            
    <h2 class="guide_h2">地図で聖地をすぐに調べられる！<br>
        豊富な詳細情報・多様なアニメ作品<br>
    </h2>
    <ul>
        <div class="guide_detail_contents">
            <h3 class="guide_h3">①豊富な詳細情報</h3>
                調べたいアニメをタッチすれば地図と詳細な情報を見ることが出来る！！<br>
                また地域名でも検索ができるので、出先ですぐに聖地巡礼も可能！！<br>
        </div>
        <div class="guide_anime_contents">
            <h3 class="guide_h3">②多彩なアニメ作品</h3>
                行きたい場所が決まっていなくても、ヘッダーの<br>
                聖地一覧を押せば、全聖地を見ることが出来る！<br>
            </div>
    </ul>
                
    <img class="site_guide_img" src="web_image/img1.JPG"><br>
                
    <img class="guide_img" src="web_image/guide_img2.png"><br>

    <h2 class="guide_h2">会員登録をすれば、さらに便利な機能が！！<br>
        各地にでかける聖地巡礼には最適！！<br>
    </h2>

    <h3 class="guide_h3">③口コミ投稿機能</h3>
        地図上のスポットから詳細画面にアクセスし、一番下の口コミ投稿ボタンをクリックすると、好きな投稿が出来る！<br>
        あなただけの情報をリアルタイムで共有しよう！<br>

    <img class="site_guide_img" src="web_image/img2.JPG"><br>

    <h3 class="guide_h3">④ルート探索機能</h3>
        選んだアニメ作品の聖地リストや地域リストから、スポットを登録し、ヘッダーのルート探索にアクセスすると、<br>
        自分だけの巡礼ルートを作ることが出来る！！<br>
        これまでのアプリではできなかったルート探索が可能！！それぞれの聖地巡礼を楽しもう！<br>

    <img class="site_guide_img" src="web_image/img3.JPG"><br>

    <h3 class="guide_h3">⑤スポット追加</h3>
        ヘッダの聖地一覧の地図をクリックするとスポット追加画面にアクセスできる！！<br>
        追加ボタンを押して詳細を送信すれば自分の見つけた聖地が登録されるかも！！<br>
        自分たちで聖地を作り出していこう！！<br>

    <img class="site_guide_img" src="web_image/img4.JPG"><br>

    <h2 class="guide_h2">会員登録をすれば様々な場所に訪れる聖地巡礼中でも<br>
        多様な媒体からアクセスすることができます！<br>
    </h2>
    <a class="log_border" href="register.php">
        <input class="log" type="submit" value="会員登録はこちら">
    </a>
    <div class="no_login">会員登録しないで利用する方は<a href="search.php">こちら</a></div>
</div>


@endsection