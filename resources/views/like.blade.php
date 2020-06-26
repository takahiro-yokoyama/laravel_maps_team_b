@extends('layouts.header')
@section('title', $title)
@section('content')
<section class="content">
    <div class="like_table_content">
        <table class="table table-hover like_table_head">
            <thead>
            <tr>
                <th class="like_table_head_i">番号</th>
                <th class="like_table_head_ii">アニメ</th>
                <th class="like_table_head_iii">スポット名</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
        <table class="table table-hover" >
            <?php if(count($like_data)==0){ ?>
            <p>まだマーカー登録がされていないな！</p>
            <?php }else{ $i=0;?>
            <?php foreach($like_data as $value){ ?>
            <tr class="like_table_tr">
                <td class="like_table_td"><p class="table_letter"><?php print $labels[$i];?></p></td>
                <td class="like_table_td"><?php print $value->anime_name;?></td>
                <td class="like_table_td"><?php print $value->spot_name;?></td>
                <td class="like_table_td">
                    <form method="post" action="{{ route('like.destroy',$value->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除">
                        <a href="#" class="up" data-num="<?php print $value->id;?>"><img src="logo/up.png"></img></a> 
                        <a href="#" class="down" data-num="<?php print $value->id;?>"><img src="logo/down.png"></img></a>
                    </form>
                </td>
            </tr>
            <?php $i++; }}?>
        </table>
    </div>
    <div id='create_route'><img class="route_img"src="logo/creat_rout.png"></img></div>
    <div id="like_spot_map_box"></div>
    <div id="route_text_content">
        <table class="like_route_">
            <?php $i = 0;foreach($like_data as $data){ ?>
            <div class="route_conten">
                <tr>
                    <th>
                        <div class="like_route_icon">
                            <p><?php print $labels[$i];?></p>
                        </div>
                    </th>
                    <th></th>
                    <th>
                        <p id="spot_name_<?php print $i; ?>"><?php print $data->spot_name;?></p>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <?php if($i< (sizeof($like_data)-1)){ ?>
                        <div class="like_page_circle"></div>
                        <div class="like_page_circle"></div>
                        <div class="like_page_circle"></div>
                        <div class="like_page_circle"></div>
                        <?php } ?>
                    </td>
                    <td class="like_space"></td>
                    <td>
                        <p class="font-italic" id="address_<?php print $i; ?>"><?php print $data->address;?></p>
                    </td>
                    <td class="like_space"></td>
                    <td>
                        <img id="image_<?php print $i; ?>"class="like_sport_img"src="upload_image/<?php print $data->spot_image ?>"></img>
                    </td>
                    <td class="like_space"></td>
                    <td>
                        <p class="font-weight-bold"id="table_name_<?php print $i; ?>"><?php print $data->anime_name;?></p>
                        <p id="spot_content_<?php print $i; ?>"><?php print $data->spot_content;?></p>
                    </td>
                </tr>
            </div>
            <?php $i++;} ?>
        </table>
    </div>
    <a class="like_print" href="javascript:window.print();"><img class="print_img"src="logo/print.png">ロート保存印刷こちら！</img></a>
</section>
<!--initMap is not fanction 解決策-->
<!--<script src="custom-js-google-map.js"></script> -->
<script>
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var like_spot;
    var directionsService;
    var directionsDisplay;
    var routeflag = false;
    //ルート生成したら、like_spot内容なくなった。原因まだ不明
    // のでここでbackup
    var like_spot_backup;
    var map;
    var markers = [];
    function initMap(){
        like_spot = JSON.parse('<?php echo $like_data_json; ?>');
        // console.log(like_spot);
        var map_box = document.getElementById('like_spot_map_box');
        var mapCenter = {
          lat: parseFloat(like_spot[0]['lat']),
          lng: parseFloat(like_spot[0]['lng'])
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
        
        if(like_spot.length>0){
            addMaker();
        }
        addTableMonitor()
        document.getElementById('create_route').addEventListener('click',routeCreate,false);
    }
    function addTableMonitor(){
        var ups = Array.from(document.getElementsByClassName('up'));
        ups.forEach(function(up){
          up.addEventListener('click',function(){
              var $tr = $(this).parents("tr"); 
              if ($tr.index() != 0) { 
                $tr.fadeOut().fadeIn(); 
                $tr.prev().before($tr);
                /**/
                like_spot.forEach(function(item,index){
                    if(item['id']==up.dataset.num){
                        tableLetterChange();
                        upGo(index);
                        clearMarkers();
                        roteClear();
                        addMaker();
                    }
                });
              }
              console.log('like_spot=',like_spot);
          });
        });
        
        var downs = Array.from(document.getElementsByClassName('down'));
        var len = downs.length;
        downs.forEach(function(down){
          down.addEventListener('click',function(){
              var $tr = $(this).parents("tr"); 
              if ($tr.index() != len - 1) { 
                $tr.fadeOut().fadeIn(); 
                $tr.next().after($tr);
                // var $p=$tr.children("p");
                // $p.text(labels[index+1 % labels.length]);
                like_spot.forEach(function(item,index){
                    if(item['id']==down.dataset.num){
                        tableLetterChange();
                        downGo(index);
                        clearMarkers();
                        roteClear();
                        addMaker();
                    }
                });
              }
              console.log('like_spot=',like_spot);
          });
        });
    }
    function addMaker(){
        like_spot_backup=like_spot;
        // console.log(like_spot);
        var labelIndex = 0;
        like_spot.forEach(function(value){
            var lat = parseFloat(value['lat']);
            var lng = parseFloat(value['lng']);
            var marker = new google.maps.Marker({
                map: map,
                position: {lat:lat,lng:lng},
                label: labels[labelIndex++ % labels.length]
            });
            markers.push(marker);
        });
    }
    function roteClear(){
        if(routeflag){
          directionsDisplay.setMap(null);
        }
    }
    
    function routeCreate(){
        clearMarkers();
        roteClear();
        // console.log(like_spot.length);
        // console.log('Before route',like_spot);
        var end = like_spot.pop();
        var wapp = [];
        if(like_spot.length > 1){
            for(var i = 1;i<(like_spot.length);i++){
                var lat = parseFloat(like_spot[i]['lat']);
                var lng = parseFloat(like_spot[i]['lng']);
                var a = {location: new google.maps.LatLng(lat,lng)};
                wapp.push(a);
            }
        }
        // console.log(wapp);
        // console.log(parseFloat(like_spot[0]['lat']));
        // console.log(parseFloat(like_spot[0]['lng']));
        var request = {
            origin: new google.maps.LatLng(parseFloat(like_spot[0]['lat']),parseFloat(like_spot[0]['lng'])), // 出発地
            destination: new google.maps.LatLng(end['lat'],end['lng']), // 目的地
            waypoints: wapp,
            travelMode: google.maps.DirectionsTravelMode.WALKING, // 交通手段(歩行。DRIVINGの場合は車)
        };
        directionsService = new google.maps.DirectionsService(); // ルート検索オブジェクト
        directionsDisplay = new google.maps.DirectionsRenderer({ // ルート描画オブジェクト
            map: map, // 描画先の地図
            preserveViewport: true, // 描画後に中心点をずらさない
        });
        // ルート検索
        directionsService.route(request, function(result, status){
        // OKの場合ルート描画
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
            }
        });
        
        like_spot.push(end);
        // console.log('after route',like_spot);
        routeflag=true;
        //text内容表示
        document.getElementById("route_text_content").style.display="block";//显示
        routeContentWrite();
    }
    
    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
    }
    
    function clearMarkers() {
        setMapOnAll(null);
    }
    function upGo(index){
        if(index!=0){
            like_spot[index]=like_spot.splice(index-1,1,like_spot[index])[0];
        }
    }
    function downGo(index){
        if(index!=like_spot.length-1){
            like_spot[index]=like_spot.splice(index+1,1,like_spot[index])[0];
        }
    }
    function tableLetterChange(){
        var tableLetters = Array.from(document.getElementsByClassName('table_letter'));
        var i=0;
        tableLetters.forEach(function(p){
            p.innerHTML=labels[i++ % labels.length];
        });
    }
    
    function routeContentWrite(){
        var route_contens = Array.from(document.getElementsByClassName('route_conten'));
        console.log(route_contens);
        route_contens.forEach(function(route_conten,index){
            $('#spot_name_'+index).text(like_spot[index]['spot_name']);
            $('#address_'+index).text(like_spot[index]['address']);
            $('#table_name_'+index).text(like_spot[index]['anime_name']);
            $('#spot_content_'+index).text(like_spot[index]['spot_content']);
            $('#image_'+index).attr("src",'upload_image/'+like_spot[index]['spot_image']);
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('api.api_key')}}&callback=initMap"></script>
@endsection