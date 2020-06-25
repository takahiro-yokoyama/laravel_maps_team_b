@extends('layouts.header')
@section('title', $title)

@section('content')
<section class="content">
　　<div id="map_page_map_box"></div>
<?php   if($spots !== []){ ?>
    <h3 id="map_h3"><?php print $anime->anime_name . "聖地リスト" ;?></h3>
    <div class="mark_text">
        <img src="../logo/like_icon_noselected.png" style="width:30px;height:30px">
        <span>・・・お気に入り登録してルート探索ができます！</span>
    </div>
    <div class="mark_text">
        <img src="../logo/map_page_map.png" style="width:30px;height:30px">
        <span>・・・スポットをマップの中心にズームします！</span>
    </div>
    <div class="list_scroll map_page_list">
        <table class="map_page_table">
            <?php foreach($spots as $spot){ ?>
            <tr>
                <td>
                    <div style="float:right;margin-right:100px;margin-top:20px">
                        <img style="width:50px;height:50px" class="list_like_icon" data-like_spot_id="<?php print $spot->id; ?>"
                        <?php if($user_name==''){print 'data-toggle="modal" data-target="#like_topic_popup"';}?>
                        <?php if(in_array($spot->id,$u_l_data)){ ?>
                            <?php print 'data-like_status="true" src="../logo/like_icon_selected.png" data-toggle="modal" data-target="#seleced_topic_popup"'?>
                        <?php }else{ ?>
                            <?php print "data-like_status='false' src='../logo/like_icon_noselected.png'" ?>
                        <?php } ?>>
                        </img>
                        <img class="map_page_map_btn" data-spotid="<?php print $spot->id; ?>" src="../logo/map_page_map.png"></img>
                    </div>
                    <div style="margin-left:20px">
                        <h2>#<?php print $spot->location_id ;?>&nbsp;&nbsp;<?php print $spot->spot_name; ?></h2>
                    </div>
                    <h3 style="margin-left:50px"><strong>&nbsp;<?php print $spot->spot_content ; ?></strong></h3>
                    <div style="display:flex">
                        <div style="margin-left:100px;margin-right:80px;text-align: center">
                            <p><strong>アニメ中の画面</strong></p>
                            <p>&nbsp;</p>
                            <img class="map_page_img" src="../upload_image/<?php print $spot->spot_image; ?>"></img>
                        </div>
                        <div style="text-align: center">
                            <p><strong>現地の画面</strong></p>
                            <p><?php print $spot->business_name; ?></p>
                            <img class="map_page_img" src="../upload_image/<?php print $spot->business_image; ?>"></img>
                        </div>
                    </div>
                    <div style="margin-left:20px">
                        <p><strong>営業時間：</strong><?php print $spot->business_time; ?></p>
                        <p><strong>価格：</strong><?php print $spot->price; ?></p>
                        <p><strong>営業内容：</strong><?php print $spot->business_content; ?></p>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
<?php       } ?>
    <div class="return_div"><a class="return_link" href="/top">検索画面に戻る</a></div>
</section>
<div class="modal fade" id="like_topic_popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class=“modal-title”>ログインください</h3>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                気になるにいれるはログインが必要です。
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">確認</button>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    var map_spot;
    var map;
    var markers = [];
    var user_like_sport;
    var user_id;
    var like_sport_insert_result = false;
    function initMap(){
        user_id = '<?php print $user_id;?>';
        map_spot = JSON.parse('<?php echo $spots_json; ?>');
        console.log(map_spot[0]);
        user_like_sport = JSON.parse('<?php echo $user_like_spot_data_json; ?>');
        console.log("user_like_",user_like_sport);
        
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
        list_map_monitor();
        like_icon_monitor();
    }
      
    function addMaker(){
        // console.log(like_spot);
        var i = 0;
        map_spot.forEach(function(value){
            var lat = parseFloat(value['lat']);
            var lng = parseFloat(value['lng']);
            // console.log(map_spot[i]['id']);
            var marker = new google.maps.Marker({
                map: map,
                position: {lat:lat,lng:lng},
                label: ''+map_spot[i]['id']
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
    
    function marker_content_creat(spot_id){
        spot_id = parseInt(spot_id);
        var marker_num;
        for (var i = 0; i < map_spot.length; i++) {
            if(map_spot[i]['id'] == spot_id){
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
                            '<div class="marker_content_img_div"><img class="marker_content_img"src="../upload_image/'+map_spot[marker_num]['spot_image']+'"></img></div>'+
                            '<p>'+spot_content+'...</p>'+
                            '<p><a href="../detail/'+map_spot[marker_num]['id']+'">詳細へ</a></p>';
        return contentString
    }
    function list_map_monitor(){
        //spotid
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
    function like_icon_monitor(){
        var like_icons = Array.from(document.getElementsByClassName('list_like_icon'));
        like_icons.forEach(function(like_icon){
            like_icon.addEventListener('click',function(){
                if(user_id == ''){
                }else{
                    if(like_icon.dataset.like_status =='true'){
                        like_sport_delete(like_icon.dataset.like_spot_id);
                        like_icon.setAttribute('data-like_status','false');
                        like_icon.src = '../logo/like_icon_noselected.png';
                    }
                    else if(like_icon.dataset.like_status =='false'){
                        console.log('add_like');
                        like_icon.setAttribute('data-like_status','true');
                        like_sport_insert(like_icon.dataset.like_spot_id);
                        like_icon.src = '../logo/like_icon_selected.png';
                        
                    }
                }
            });
        });
    }
    function like_sport_insert(spot_id){
        $.ajax({
                type:"get",
                url:'/maps/likeinsert/'+spot_id,
                data:{ 
                        spot_id:spot_id
                     },
                success:function(result){
                    console.log(result);
                    if(result == 'true'){
                        like_sport_insert_result = true;
                    }else{
                        alert('お気に入り失敗'+result);
                    }
                }
        });
    }
    function like_sport_delete(spot_id){
        $.ajax({
                type:"post",
                url:"{{route('like.startdelete')}}",
                data:{ 
                        'spot_id':spot_id,
                        '_token':'{{csrf_token()}}'
                     },
                success:function(result){
                    if(result == 'true'){
                        like_sport_insert_result = true;
                    }else{
                        alert('Delete失敗'+result);
                    }
                },
                error:function(result){
                    console.log(result);
                }
        });
    }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('api.api_key')}}&libraries=places&callback=initMap"></script>
@endsection