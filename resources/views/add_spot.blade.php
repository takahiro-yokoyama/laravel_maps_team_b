@extends('layouts.header')

@section('content')
<section class="content">
    <h1 id="add_h1">{{ $title }}</h1>
    <form action="/add_spot" method="post" id="add_form">
        @csrf
        <p><span class="add_spot_key">位置情報</span></p>
        <label class="add_label"><span class="add_spot_red">*</span>住所　<input class="add_place" type="text" name="address" value="{{ $address }}"></label><br>
        <label class="add_label"><span class="add_spot_red">*</span>緯度　<input class="add_place" type="text" name="lat" value="{{ $lat }}"></label><br>
        <label class="add_label"><span class="add_spot_red">*</span>経度　<input class="add_place" type="text" name="lng" value="{{ $lng }}"></label>
        <br>
        <br>
        <p><span class="add_spot_key">アニメ情報を入力してください</span></p>
        <label class="add_label_spot"><span class="add_spot_red">*</span>アニメの名前　<input class="add_input" type="text" name="anime_name" placeholder="君の名は"></label><br>
        <label class="add_label_spot"><span class="add_spot_red">*</span>聖地の名前　　<input class="add_input" type="text" name="spot_name" placeholder="四ツ谷駅"></label><br>
        <label class="add_label_spot"><span class="add_spot_red">*</span>聖地の説明　　<input class="add_input" type="text" name="spot_content" placeholder="瀧と奥寺先輩の待ち合わせスポット"></label><br>
        <br>
        <input class="add_button" type="submit" name="submit" value="送信">
    </form>

@endsection