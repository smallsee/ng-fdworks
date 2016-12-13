<div ng-controller="videoController">

  <div id="video-hot">
    <div id="video-hot-scrollView" style="float: left">
      <ul>
        <li><a href="#"><img src="{{asset('/img/1.jpg')}}" width="100%" height="100%"></a></li>
        <li><a href="#"><img src="{{asset('/img/2.jpg')}}" width="100%" height="100%"></a></li>
        <li><a href="#"><img src="{{asset('/img/3.jpg')}}" width="100%" height="100%"></a></li>
        <li><a href="#"><img src="{{asset('/img/4.jpg')}}" width="100%" height="100%"></a></li>
        <li><a href="#"><img src="{{asset('/img/5.jpg')}}" width="100%" height="100%"></a></li>
      </ul>
    </div>

    <div id="video-hot-items">

      <div ng-repeat="video_item in video.video_data.video_hot track by $index">
        <a ui-sref="video/item({id:video_item.id})">
          <div class="video-hot-item">
            <div class="video-hot-item-mask"></div>
            <div style="height: 15px;line-height: 15px;font-size: 14px;" class="video-hot-item-title" ng-bind="video_item.title"></div>
            <div class="video-hot-item-icon glyphicon glyphicon-play-circle"></div>
            <img ng-src="[: video_item.thumb :]" alt="" width="100%" height="100%">
          </div>
        </a>
      </div>

    </div>


  </div>


  <div class="shouldSeeVideo" >
    <div class="left">

      <div class="top">
        <a href="#">
          <i class="glyphicon glyphicon-music"></i>
          <span style="font-size: 16px">推荐视频</span>
          <span style="font-size: 14px">more</span>
        </a>
        <span style="margin-left: 10px;font-size: 12px;color: black">点击音乐播放按钮会有惊喜，雅蠛蝶~,san</span>
      </div>

      <div class="bottom">

        <div ng-repeat="video_item_luoli in video.video_data_luoli.video_type track by $index" class="bottom-item">
          <div class="img">
            <a ui-sref="video/item({id:video_item_luoli.id})">
              <img ng-src="[: video_item_luoli.thumb :]" alt="">
            </a>

          </div>
          <div class="item-bottom">
            <p ng-bind="video_item_luoli.title"></p>
            <div class="item-bottom-user" style="font-size: 14px;">
              <img ng-src="[: video_item_luoli.user.avatar :]" alt="">
              <div class="">10</div>
              <div class=" fa fa-comment "></div>
              <div class="" ng-bind="video_item_luoli.see"></div>
              <div class="glyphicon glyphicon-eye-open"></div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <div class="right">
      <div class="top">推荐(=·ω·=)~</div>

      <div class="bottom">

      <div class="bottom-item-box" ng-repeat="video_item_luoli_small in video.video_data_luoli.video_type_small track by $index">
        <div class="bottom-item clearfix">
          <div class="img">
            <img ng-src="[: video_item_luoli_small.thumb :]" alt="" width="82" height="52" ui-sref="video/item({id:video_item_luoli_small.id})">
            <span ng-bind="$index+1"></span>
          </div>
          <div class="right">
            <p ng-bind="video_item_luoli_small.title" ui-sref="video/item({id:video_item_luoli_small.id})"></p>
            <div ng-bind="video_item_luoli_small.see"></div>
          </div>
        </div>
        <div class="hr"></div>
      </div>



      </div>
    </div>
  </div>

</div>
  <script>
    $("#video-hot-scrollView").ScrollXiaohai({
      name : {
        ul : ".video-hot-scrollView-ul", //放置图片层的ul的class名字
        li : ".video-hot-scrollView-li", //放置图片的li的class名字
        active : ".active", //高亮的class样式名字
        activeColor : "rgba(241,99,137,1)" //高亮时的背景颜色 主要用于icon
      },
      icon :{
        iconUl : ".video-hot-scrollView-iconUl", //放置icon层的class样式名字 可以自由更改
        iconLi : ".video-hot-scrollView-iconLi",//放置icon的class样式名字 可以自由更改
        height:30,//放置icon层的高度
        ulColor: "rgba(0,0,0,0.5)",//放置icon层的背景颜色
        liColor: '#ccc',//icon的背景颜色
        top:0, // 水平 ? bottom 0 : top:0
        left:0,// 水平 ? left 0 : right:0
        iconWidth:10, //icon宽度
        iconHeight:10, // icon高度
        Radius:true, //icon是否圆角
        position:'end', //icon在遮罩层的位置有 start end middle
        marginRight:10 //个个icon之间的距离
      },
      btn:{
        boxPrev : '.video-hot-scrollView-boxPrev', //放置按钮层的class样式名字 可以自由更改
        boxNext : '.video-hot-scrollView-boxNext', //放置按钮层的class样式名字 可以自由更改
        prev : '.video-hot-scrollView-prev', //按钮的class样式名字 可以自由更改  =>按钮的图片建议自己 填写上去
        next : '.video-hot-scrollView-next', //按钮的class样式名字 可以自由更改
        width: 100, //  水平 ? 安置按钮层的宽度 : 安置按钮层的高度
        spanHeight:50,//按钮高度
        spanWidth:50, //按钮宽度
        left: 0,    //放置按钮层 左右靠边距离
        color: "rgba(0,0,0,0)",    //放置按钮的层颜色
        btnColor: "rgba(0,0,0,0.5)", //按钮的背景颜色
        show:false  //是否移动到放置按钮的层颜色处才显示

      },
      width:450,        //幻灯片宽度
      height:260,  //   幻灯片高度
      index : 0,		//页面开始的索引
      duration : 5000,		//自动播放时间
      easing : 500,     //切换速度
      autoPlay : true, //是否自动播放
      btnIcon:true,    //是否有按钮
      pageIcon : true,		//是否进行分页
      horizontal : "horizontal",//是什么播放模式		//滑动方向vertical,horizontal

    });
  </script>