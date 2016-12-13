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
  <link rel="stylesheet" href="{{asset('/css/video.css')}}">
  <link rel="stylesheet" href="{{asset('/css/tea.css')}}">

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
  <script src="{{asset('/js/video_item.js')}}"></script>
  <script src="{{asset('/js/tea.js')}}"></script>
  <script src="{{asset('/js/tea_add.js')}}"></script>
  <script src="{{asset('/js/tea_item.js')}}"></script>




</head>
<body>


<header class="header animated bounce">
  <div class="xiaohai-container clearfix">
    <div class="fl">
      <div ui-sref="home" class="header-item brand">F.D.Words</div>
      <a ui-sref="home" class="header-item">音乐模式</a>
      <a ui-sref="home" class="header-item">微博</a>
    </div>
    <div class="fr">
      @if(is_logged_in())
        <a ui-sref="user({id:{{session('user_id')}} })"><img src="{{session('user_avatar')}}" alt="" width="40" height="40" style="border-radius: 50%;"></a>
        <a ui-sref="user({id:{{session('user_id')}} })"  class="header-item" >{{session('username')}}</a>
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

<div class="nav" >
  <div class="xiaohai-container clearfix">
    <div class="fl">

      <a ui-sref="home" class="navbar-item">首页</a>
      <a ui-sref="tea" class="navbar-item">茶会</a>
      <a ui-sref="book" class="navbar-item">本子</a>
      <a ui-sref="video" class="navbar-item">视频</a>
      <a ui-sref="home" class="navbar-item">论坛</a>
      <a ui-sref="home" class="navbar-item">成员</a>
      <div class="navbar-item-cur">
        <div class="navbar-item-cur-tag"></div>
      </div>
    </div>
    @if(is_logged_in())
      <div class="fr" style="height: 40px;position: relative;width: 80px;text-align: center;" onclick="$('.add_data').show()">
        <span  style="line-height: 40px;cursor: pointer;color: #f55d5d;font-size: 18px;" class="glyphicon glyphicon-plus-sign"></span>
      </div>
    @endif
  </div>
</div>

{{--添加新帖子--}}
<div  class="add_data " >
  <div style="width: 100%;height: 100%;position: relative">
    <div class="add_data_container clearfix" style="position: absolute;top: 180px;left: 156px;width: 511px;height: 160px;">

      <div  ui-sref="book/add" class="add_data_item" style="width: 104px;float: left;cursor: pointer">
        <h3 style="line-height: 50px;text-align: center">图片</h3>
        <div class="add_data_image" style="width: 104px;height:145px;background: url('{{asset("/img/characters.png")}}') 3% 0% no-repeat "></div>
      </div>


      <div  ui-sref="tea/add" class="add_data_item" style="width: 104px;float: left;cursor: pointer">
        <h3 style="line-height: 50px;text-align: center">茶会</h3>
        <div class="add_data_image" style="width: 104px;height:145px;background: url('{{asset("/img/characters.png")}}') 29% 0% no-repeat "></div>
      </div>

      <div  ui-sref="video/add" class="add_data_item" style="width: 88px;float: left;cursor: pointer">
        <h3 style="line-height: 50px;text-align: center">视频</h3>
        <div class="add_data_image" style="width: 104px;height:145px;background: url('{{asset("/img/characters.png")}}') 49% 0% no-repeat "></div>
      </div>

      <div  ui-sref="book/add" class="add_data_item" style="width: 104px;float: left;cursor: pointer">
        <h3 style="line-height: 50px;text-align: center">资源</h3>
        <div class="add_data_image" style="width: 104px;height:145px;background: url('{{asset("/img/characters.png")}}') 73% 0% no-repeat "></div>
      </div>

      <div  ui-sref="book/add" class="add_data_item" style="width: 104px;float: left;cursor: pointer">
        <h3 style="line-height: 50px;text-align: center">成员</h3>
        <div class="add_data_image" style="width: 104px;height:145px;background: url('{{asset("/img/characters.png")}}') 99% 0% no-repeat "></div>
      </div>

    </div>
    <div onclick="$('.add_data').hide()" class="add_data_close" style="cursor: pointer;width: 20px;height: 20px;position: absolute;top: 0;right: 0">X</div>
  </div>
</div>




  <div class="page" ng-controller="CommonController">
    <div ui-view></div>
  </div>


<footer style="width: 100%;height: 100px;margin-top: 10px;">
  <div class="footer-middle" style="width: 1200px;height: 100%;margin: 0 auto; border-top: 1px solid #e8e1e1;margin-top: 10px;">
    <div>Copyright © 2011 - 2016 FD Professional Version by </div>
  </div>
</footer>
</body>
<script>

  var nav_item =$('.navbar-item');
  var nav_item_cur =$('.navbar-item-cur');

  var add_data_item = $('.add_data_item');

  add_data_item.each(function(index,value){
    $(value).hover(function(){
      add_data_item.children('.add_data_image').removeClass('animated bounce');
      $(value).children('.add_data_image').addClass('animated bounce');

    },function(){
      add_data_item.children('.add_data_image').removeClass('animated bounce');
    })
    $(value).click(function(){
      $('.add_data').hide()
    })
  })

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