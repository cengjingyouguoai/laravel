<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>后台 - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="{{ URL::asset('admin/css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">

    <link href="{{ URL::asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/style.css?v=2.2.0') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Blog</h1>

        </div>
        <h3>欢迎登录</h3>

        <form class="m-t" role="form" action="{{ url('admin/login/login_deal') }}" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="用户名" required="">
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="密码" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


           {{-- <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
            </p>--}}

        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ URL::asset('admin/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/bootstrap.min.js?v=3.4.0') }}"></script>


</body>

</html>
