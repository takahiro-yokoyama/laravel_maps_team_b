@extends('layouts.not_logged_in')

@section('title', $title)

@section('content')
<section class="content">
@foreach($spots as $spot)
<h2 id="detail_h2">{{ $spot->anime->anime_name }}</h2>
<h2 id="detail_h2">{{ $spot->spot_name }}</h2>
<div id="detail_page_map_box"></div>
<img class="detail_img" src="{{ asset('upload_image/' . $spot->spot_image) }}"></img>
<table class="detail_table">
    <tr>
        <th>シーン</th>
        <td>{{ $spot->spot_content }}</td>
        
    </tr>
    <tr>
        <th>営業施設</th>
        <td>{{ $spot->business_name }}</td>
    </tr>
    <tr>
        <th>営業時間</th>
        <td>{{ $spot->business_time }}</td>
    </tr>
    <tr>
        <th>価格</th>
        <td>{{ $spot->price }}円</td>
    </tr>
    <tr>
        <th>営業内容</th>
        <td>{{ $spot->business_content }}</td>
    </tr>
    <tr>
        <th>施設画像</th>
        <td><img class="detail_business_img" src="{{ asset('upload_image/' . $spot->business_image) }}"></img></td>
    </tr>
</table>
@endforeach

<label class="comment_label">
<button id="add_comment_btn" class="add_comment_title" data-toggle="modal" data-target="#popup">口コミを投稿</button>
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupLabel">ユーザー名:{{ \Auth::user()->name }}さん</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/detail') }}" name="cnvForm">
            @csrf
            <div class="form-group">
                <label class="col-form-label">口コミ内容:
                    <textarea name="comment" rows="5" cols="30" wrap="hard" onKeyUp="checkNum()" class="form-control"></textarea>
                </label>
             </div>
            <input type="hidden" name="spot_id" value="{{ $spots[0]->id }}"/>
            <input type="submit" value="投稿する" role="button" class="btn-dark">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>
</label>

@if(count($comments)>0)
<p id="comment_caption">口コミ一覧</p>
<div class="comment_list_scroll">
    <table id="comment_table">
        <tr>
            <th>ユーザー名</th>
            <th><div class="comment_detail">口コミ</div></th>
            <th>投稿日時</th>
        </tr>
@foreach($comments as $comment)
            <tr>
                <td>{{ $comment->user->name }}</td>
                <td><div class="comment_detail">{{ $comment->comment }}</div></td>
                <td>{{ $comment->created_at }}</td>
            </tr>
@endforeach
    </table>
</div>
@endif
<div class="return_div"><a  class="return_link" href="{{ url('/top') }}">TOPへ戻る</a></div>
</section>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('JS/main_js.js') }}"></script>
<script>
    var user_name;
    var map_spot;
    function initMap(){
        user_name = '{{ \Auth::user()->name }}';
        map_spot = JSON.parse('<?php print $spots_json; ?>');
        var map_box = document.getElementById('detail_page_map_box');
        console.log(map_spot);
        var mapCenter = {
            lat: parseFloat(map_spot[0]['lat']),
            lng: parseFloat(map_spot[0]['lng'])
        };
        var map = new google.maps.Map(
              map_box,
              {
                center: mapCenter,
                zoom: 16,
                disableDefaultUI: true,
                zoomControl: true,
                clickableIcons: false,
              }
        )
        
        var marker = new google.maps.Marker({
            map: map,
            position: mapCenter,
        });
        
        document.getElementById('add_comment_btn').addEventListener('click',login_judge,false)
    }
    function login_judge(){
        if(user_name==''){
            if (confirm("ログインして下さい！")){
                window.location='/login';
            }else{
                window.location.reload();
            }
        }
    }

    function checkNum(){
    	var txt = document.cnvForm.comment.value;
    	var result = "";
    	for (i=0; i<txt.length; i++){
        	if (txt.match(/[<>]/)===null){
        		result =  txt;
        	}else{
        	    result = "";
            }
        }
    	document.cnvForm.comment.value = result;
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('api.api_key')}}&libraries=places&callback=initMap"></script>

@endsection