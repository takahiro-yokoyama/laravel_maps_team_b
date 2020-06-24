<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!--This request has been blocked; the content must be served over HTTPS.このエラーをため-->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/styles_yokoyama.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/styles_togei.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/styles_ishizaka.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/styles_fuxiang.css') }}">

<!--bootstrap4の読み込み-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    @yield('header')
    
    @foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach
    
    @if(\Session::has('success'))
    <div class="success">
        {{ \Session::get('success') }}
    </div>
    @endif
    
    @yield('content')
    
<footer>
    <section class="foot_all">
        <p style="text-align:center"><a class="foot_link" href="{{ url('contact') }}">お問い合わせ</a></p>
        <p class="footer_img"><img src="{{ asset('logo/team_logo.png') }}"></img></p>
        <p style="text-align:center;color:black;font-size:10px"><small>Copyright &copy; B-Team All Rights Reserved.</small></p>
    </section>
</footer>
</body>
</html>