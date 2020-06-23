@extends('layouts.not_logged_in')

@section('content')
<h1>アニメ名検索結果画面</h1>
<div id="map_page_map_box"></div>
@if($spots !== [])
<h3 id="map_h3">{{ $anime->anime_name . "の聖地リスト" }}</h3>
<div class="list_scroll">
    <table class="map_page_table">
        @foreach($spots as $spot)
        <tr>
            <td>
                <form method="post" action="">
                    @csrf
                    @method('pacth')
                    <input type="hidden" name="anime_id" value="{{ $anime->id }}"/>
                    <div style="float:right;margin-right:100px;margin-top:20px">
                        <button type ="submit" name="like_spot_id" value="{{ $spot->id }}" >お気に入り登録</button>
                        <img class="map_page_map_btn" data-spotid="{{ $spot->id }}" src="{{ asset('web_image/map_page_map.png') }}"></img>
                    </div>
                    <div style="margin-left:20px">
                        <h2>#{{ $spot->location_id }}&nbsp;&nbsp;{{ $spot->spot_name }}</h2>
                    </div>
                    <h3 style="margin-left:50px"><strong>{{ $spot->spot_content }}</strong></h3>
                    <div style="display:flex">
                        <div style="margin-left:100px;margin-right:80px;text-align: center">
                            <p><strong>アニメ中の画面</strong></p>
                            <p>&nbsp;</p>
                            <img class="map_page_img" src="{{ $spot->spot_image }}"></img>
                        </div>
                        <div style="text-align: center">
                            <p><strong>現地の画面</strong></p>
                            <p>{{ $spot->business_name }}</p>
                            <img class="map_page_img" src="{{ $spot->business_image }}"></img>
                        </div>
                    </div>
                    <div style="margin-left:20px">
                        <p><strong>営業時間：</strong>{{ $spot->business_time }}</p>
                        <p><strong>価格：</strong>{{ $spot->price }}</p>
                        <p><strong>営業内容：</strong>{{ $spot->business_content }}</p>
                    </div>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
<div class="return_div"><a class="return_link" href="/top">トップ画面に戻る</a></div>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('JS/main_js.js') }}"></script>
<script>
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    var map_spot;
    var map;
    var markers = [];
    var i = 0;
    function initMap(){
        map_spot = JSON.parse('<?php print $spots_json; ?>');
        console.log(map_spot[0]);
        var map_box = document.getElementById('map_page_map_box');
        var mapCenter = {
          lat: parseFloat(map_spot[0]['lat']),
          lng: parseFloat(map_spot[0]['lng'])
        };
        
        map = new google.maps.Map(
          map_box,
          {
            center: mapCenter,
            zoom: 12,
            disableDefaultUI: true,
            zoomControl: true,
            clickableIcons: false,
          }
        );
        
        if(map_spot.length>0){
            addMaker();
        }
        markers_monitor();
        spot_name_monitor();
        list_map_monitor();
    }
      
    function addMaker(){
        map_spot.forEach(function(value){
            var lat = parseFloat(value['lat']);
            var lng = parseFloat(value['lng']);
            var marker = new google.maps.Marker({
                map: map,
                position: {lat:lat,lng:lng},
                label: map_spot[i]['id'].toString()
            });
            markers.push(marker);
            i++;
        });
    }
    
    function markers_monitor(){
        markers.forEach(function(marker){
            marker.addListener('click',function(){
                var contentString = marker_content_creat(marker['label']);
                var infowindow = new google.maps.InfoWindow({content: contentString});
                infowindow.open(map, marker); 
            });
        });
    }
    
    function marker_content_creat(id){
        id = parseInt(map_spot[i]['id']);
        var marker_num;
        for (var i = 0; i < map_spot.length; i++) {
            if(map_spot[i]['id'] == id){
                marker_num = i;
                break;
            }
        }
        var spot_content = map_spot[marker_num]['spot_content'];
        if(spot_content.length >20){
            spot_content = spot_content.slice(0,10);
        }
        var contentString = '<h1>'+map_spot[marker_num]['spot_name']+'</h1>'+
                            '<p><strong>'+map_spot[marker_num]['anime_name']+'</strong></p>'+
                            '<div class="marker_content_img_div"><img class="marker_content_img"src="'+map_spot[marker_num]['spot_image']+'"></img></div>'+
                            '<p>'+spot_content+'...</p>'+
                            '<p><a href="?spot_id='+map_spot[marker_num]['id']+'">詳細へ</a></p>';
        return contentString
    }
    
    function list_map_monitor(){
        var map_page_map_btns = Array.from(document.getElementsByClassName('map_page_map_btn'));
        map_page_map_btns.forEach(function(map_page_map_btn){
            map_page_map_btn.addEventListener('click',function(){
                console.log("click");
                var spot_id = map_page_map_btn.dataset.spotid;
                spot_id = parseInt(spot_id);
                var marker_num;
                for (var i = 0; i < map_spot.length; i++) {
                    if(map_spot[i]['id'] == spot_id){
                        marker_num = i;
                        break;
                    }
                }
                var lat = parseFloat(map_spot[marker_num]['lat']);
                var lng = parseFloat(map_spot[marker_num]['lng']);
                var latLng = new google.maps.LatLng(lat,lng);
                map.setZoom(16);
                map.panTo(latLng);
            });
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('api.api_key')}}&libraries=places&callback=initMap"></script>

@endsection