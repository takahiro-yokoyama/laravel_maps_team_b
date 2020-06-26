<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!--This request has been blocked; the content must be served over HTTPS.このエラーをため-->
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head_add')
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles_yokoyama.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_togei.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_ishizaka.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_fuxiang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!--bootstrap4の読み込み-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    @yield('header')
    
    @foreach($errors->all() as $error)
    <p class="container error">{{ $error }}</p>
    @endforeach
    
    @if(\Session::has('success'))
    <div class="success container">
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