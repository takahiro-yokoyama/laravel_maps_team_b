<?php
use App\LikeSpot;
$select_result = false;

$data=[];
$user_id='';
$spot_id='';

if ($_SERVER['REQUEST_METHOD']  === 'GET'){
    $user_id = $_GET['user_id'];
    $spot_id = $_GET['spot_id'];
}
// $sql="SELECT * FROM like_spot_table 
//       WHERE user_id = {$user_id} AND spot_id = {$spot_id}";
// $link = get_db_connect();
// $data = get_as_array($link,$sql);
//         //DB Close
// close_db_connect($link);
$like_sports = \Auth::user()->likeSpots;
$data = $like_sports->find($spot_id);


if(count($data)>0){
    $select_result = true;
    exit($select_result);
}else{
    exit($select_result);
}