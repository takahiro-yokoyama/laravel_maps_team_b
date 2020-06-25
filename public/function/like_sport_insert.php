<?php

$select_result = 'false';

$data=[];
$user_id='';
$spot_id='';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $user_id = $_GET['user_id'];
    $spot_id = $_GET['spot_id'];
}
// $time = get_time();
// $sql="INSERT INTO like_spot_table(user_id,spot_id,created_date,updated_date)
//       VALUES({$user_id},{$spot_id},'{$time}','{$time}')";
// $result = db_insert($sql);
$like_spot = new App\LikeSpot();
$like_spot->user_id = \Auth::user()->id;
$like_spot->spot_id = $spot_id;

if($result){
    $select_result = 'true';
    exit($select_result);
}else{
    $select_result = 'error:'.$sql;
    exit($select_result);
}