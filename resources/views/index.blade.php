<!doctype html>
<html lang="zh" ng-app="fdword" user-id="{{session('user_id')}}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('/node_modules/normalize-css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/ng-dialog/css/ngDialog.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/ng-dialog/css/ngDialog-theme-default.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/angular-toastr/dist/angular-toastr.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/nprogress/nprogress.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/bootstrap/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/bootstrap/dist/css/bootstrap-theme.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/textangular/dist/textAngular.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/node_modules/nivo-slider.css') }}">
  <link rel="stylesheet" href="{{asset('/css/iconfont.css')}}">
  <link rel="stylesheet" href="{{asset('/css/common.css')}}">
  <link rel="stylesheet" href="{{asset('/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/base.css')}}">
  <link rel="stylesheet" href="{{asset('/css/book.css')}}">
  <link rel="stylesheet" href="{{asset('/css/book_list.css')}}">
  <link rel="stylesheet" href="{{asset('/css/home.css')}}">

  <script src="{{asset('/node_modules/jquery/dist/jquery.js')}}"></script>
  <script src="{{asset('/node_modules/angular/angular.js')}}"></script>
  <script src="{{asset('/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
  <script src="{{asset('/node_modules/angular-ui-router/release/angular-ui-router.js')}}"></script>
  <script src="{{asset('/node_modules/ng-dialog/js/ngDialog.js')}}"></script>
  <script src="{{asset('/node_modules/angular-toastr/dist/angular-toastr.js')}}"></script>
  <script src="{{asset('/node_modules/nprogress/nprogress.js')}}"></script>
  <script src="{{asset('/node_modules/ng-file-upload/dist/ng-file-upload-shim.js')}}"></script>
  <script src="{{asset('/node_modules/ng-file-upload/dist/ng-file-upload.js')}}"></script>
  <script src="{{asset('/node_modules/textangular/dist/textAngular-rangy.min.js')}}"></script>
  <script src="{{asset('/node_modules/textangular/dist/textAngular-sanitize.min.js')}}"></script>
  <script src="{{asset('/node_modules/textangular/dist/textAngular.min.js')}}"></script>
  <script src="{{asset('/node_modules/picture.js') }}"></script>
  <script src="{{ asset('/node_modules/jquery.nivo.slider.pack.js') }}"></script>
  <script src="{{ asset('/node_modules/radialIndicator.js') }}"></script>
  <script src="{{ asset('/node_modules/scrollViewByXiaohai.js') }}"></script>

  <script src="{{asset('/js/base.js')}}"></script>
  <script src="{{asset('/js/user.js')}}"></script>
  <script src="{{asset('/js/video.js')}}"></script>
  <script src="{{asset('/js/home.js')}}"></script>
  <script src="{{asset('/js/book.js')}}"></script>
  <script src="{{asset('/js/book_add.js')}}"></script>
  <script src="{{asset('/js/book_item.js')}}"></script>
  <script src="{{asset('/js/video_add.js')}}"></script>




</head>
<body>


{{--登录--}}
{{--<div class="login-mask">--}}
  {{--<div class="login-box">--}}
    {{--<div class="login-box-head">--}}
      {{--<div class="login-text">登录</div>--}}
      {{--<div class="login-close">X</div>--}}
    {{--</div>--}}

    {{--<div class="login-box-body">--}}
      {{--<div class="left-body">--}}
        {{--<form name="login_form" ng-submit="User.login()">--}}
          {{--<div class="input-group">--}}
            {{--<label class="iconfont icon-user"></label>--}}
            {{--<input name="username" type="text" ng-model="User.login_data.username" required>--}}
          {{--</div>--}}

          {{--<div class="input-group">--}}
            {{--<label class="iconfont icon-key1" ></label>--}}
            {{--<input name="password" type="password" ng-model="User.login_data.password" required>--}}
          {{--</div>--}}

          {{--<div ng-if="User.login_failed" class="input-err-set">--}}
            {{--用户名或密码有误--}}
          {{--</div>--}}
          {{--<div class="input-group">--}}
            {{--<button type="submit" class="primary"--}}
                    {{--ng-disabled="login_form.username.$error.required ||--}}
                      {{--login_form.password.$error.required"--}}
            {{-->登录</button>--}}
          {{--</div>--}}
        {{--</form>--}}
      {{--</div>--}}
      {{--<div class="right-body"></div>--}}
    {{--</div>--}}
  {{--</div>--}}
{{--</div>--}}
{{--头部--}}
<header class="header animated bounce">
  <div class="xiaohai-container clearfix">
    <div class="fl">
      <div ui-sref="home" class="header-item brand">F.D.Words</div>
      <a ui-sref="home" class="header-item">音乐模式</a>
      <a ui-sref="home" class="header-item">微博</a>
    </div>
    <div class="fr">
      @if(is_logged_in())
        <a ui-sref="login" class="header-item" >{{session('username')}}</a>
        <a href="{{url('/api/logout')}}" class="header-item">登出</a>
      @else
        <a ui-sref="login" class="header-item">登录</a>
        <a ui-sref="signup" class="header-item">注册</a>
      @endif
    </div>
  </div>
</header>
{{--旗帜--}}
<div class="banner"></div>
{{--导航--}}

<div class="nav">
  <div class="xiaohai-container clearfix">
    <div class="fl">

      <a ui-sref="home" class="navbar-item">首页</a>
      <a ui-sref="video" class="navbar-item">视频</a>
      <a ui-sref="book" class="navbar-item">本子</a>
      <a ui-sref="home" class="navbar-item">微博</a>
      <a ui-sref="home" class="navbar-item">论坛</a>
      <a ui-sref="home" class="navbar-item">成员</a>
      <div class="navbar-item-cur">
        <div class="navbar-item-cur-tag"></div>
      </div>
    </div>

  </div>
</div>



  <div class="page" ng-controller="CommonController">
    <div ui-view></div>
  </div>
</body>
<script>

  var nav_item =$('.navbar-item');
  var nav_item_cur =$('.navbar-item-cur');

  for(var i=0;i<nav_item.length-1;i++){
    nav_item.on('mouseover',function(){
      nav_item_cur.css({
        'left':$(this).index()* (nav_item.outerWidth() +10 )
      })
    })
  }

  var lightbox = new LightBox({
    speed:300,
    maxWidth:'auto',
    maxHeight:'auto',
    maskOpacity:0.5,
    scalePic:1
  });


</script>

</html>