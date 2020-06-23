@extends('layouts.not_logged_in')

@section('title', $title)

@section('content')
<!--<h1>{{ $title }}</h1>-->

<!--<?php-->
<!--$user_name = 'aaa';-->
<!--$user_id = 1;-->
<!--?>-->

<!--<p><?php var_dump($users); ?> </p>-->

<p><?php foreach($spots as $spot) { } ?></p>
<p><?php foreach($animes as $anime) { } ?></p>
<p><?php foreach($locations as $location) { } ?></p>
<p><?php foreach($comments as $comment) { } ?></p>
<p><?php foreach($users as $user) { } ?></p>

<!--<p><?php print($spot->business_name); ?></p>-->

<h2 id="detail_h2"><?php print $spot['anime_name']; ?></h2>
            <h2 id="detail_h2"><?php print $spot['id'] . '：' . $spot['spot_name']; ?></h2>
            <div id="detail_page_map_box"></div>
            <img class="detail_img" src="{{ asset('upload_image/' . $spot->spot_image) }}"></img>
            <table class="detail_table">
                <tr>
                    <th>シーン</th>
                    <td><?php print $spot['spot_content']; ?></td>
                    
                </tr>
                <tr>
                    <th>営業施設</th>
                    <td><?php print $spot['business_name']; ?></td>
                </tr>
                <tr>
                    <th>営業時間</th>
                    <td><?php print $spot['business_time']; ?></td>
                </tr>
                <tr>
                    <th>価格</th>
                    <td><?php print $spot['price'] . '円'; ?></td>
                </tr>
                <tr>
                    <th>営業内容</th>
                    <td><?php print $spot['business_content']; ?></td>
                </tr>
                <tr>
                    <th>施設画像</th>
                    <td><img class="detail_business_img" src="{{ asset('upload_image/' . $spot->business_image) }}"></img></td>
                </tr>
            </table>
            <label class="comment_label">
                <span id="add_comment_btn" class="add_comment_title">口コミを投稿</span>
                <input type="checkbox" name="checkbox" id=comment_checkbox>
                <div id="popup">
                    <label for="comment_checkbox" class="icon-close">×</label>
                    <p>ユーザー名:ユーザーネームを入れるさん</p>
                    <form method="post" action="{{ url('/detail/{id}') }}" name="cnvForm">
                        <label class="comment_form">
                            口コミ内容:<br>
                            <textarea name="comment" rows="3" cols="30" wrap=”hard” onKeyUp="checkNum()" value=""></textarea>
                        </label><br>
                        <input type="hidden" name="spot_id" value="<?php print $spot['id'];?>"/>
                        <input type=submit name="submit" value="投稿する">
                    </form>
                </div>
            </label>
<?php       if(count($comments)>0) { ?>
                <p id="comment_caption">口コミ一覧</p>
                <div class="comment_list_scroll">
                    <table id="comment_table">
                        <tr>
                            <th>ユーザー名</th>
                            <th><div class="comment_detail">口コミ</div></th>
                            <th>投稿日時</th>
                        </tr>
<?php                   foreach($comments as $comment) { ?>
                            <tr>
                                <td><?php print htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><div class="comment_detail"><?php print htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8'); ?></div></td>
                                <td><?php print htmlspecialchars($comment['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
<?php                   } ?>
                    </table>
                </div>
<?php        } ?>
                <div class="return_div"><a  class="return_link" href="main.php">TOPへ戻る</a></div>
@endsection