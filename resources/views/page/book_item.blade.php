<div ng-controller="bookItemController">

  {{--编辑器--}}
  <div ng-if="bookItem.show_hideThing" class="book_list_mask">

    <div class="col-md-6 col-md-offset-3 container commit_add">
      <div class="col-md-12">
        <text-angular ng-model="bookItem.book_content" ></text-angular>
      </div>

      <div class="col-md-4 col-md-offset-1 commit_add_button">
        <button class="btn btn-lg btn-block btn-info" ng-click="bookItem.commit_add(id)">提交</button>
      </div>
      <div class="col-md-4 col-md-offset-2 commit_add_button">
        <button class="btn btn-lg btn-block btn-default" ng-click="close_mask()">取消</button>
      </div>
    </div>

  </div>
{{--显示图片文职--}}
<div class="clearfix book_list"  >
  <div class="book_list_left">
    <div class="user-info">
      <img ng-src="[: bookItem.book_item.thumb :]" alt="">
      <div style="text-align: center;width: 150px;color: #fff;line-height: 20px;text-overflow:ellipsis;white-space:nowrap;overflow: hidden">[: bookItem.book_item.user.nickname :]</div>
    </div>
  </div>
  <div class="book_list_right">
    <div class="title" ng-bind="bookItem.book_item.title">

    </div>

    <div class="content">

      <div class="time">
        <i style="color: #F6697A" class="glyphicon glyphicon-time"></i>
        <span ng-bind="bookItem.book_item.created_at"></span>
      </div>

      <div class="content_image">

        <div  style="text-indent:2em;word-wrap:break-word;word-break:break-all;" class="book-list-item-content" ng-bind-html="bookItem.book_item.content"></div>
        <div ng-repeat="item in bookItem.book_list track by $index">
          <img  data-role="lightbox"
                data-source="[: item :]"
                ng-src="[: item :]"
                data-group="group-[: id :]"
                data-id="[: id :] - [: $index :]"
                data-caption="littleSea">
        </div>
      </div>

      <div class="hide_thing" ng-if="!bookItem.showHide">
        @if(is_logged_in())
          <p style="cursor: pointer" ng-click="add_commit()">回复获取隐藏东西</p>
        @else
          <p style="cursor: pointer" ng-click="place_load()">回复获取隐藏东西</p>
        @endif
      </div>

      <div class="hide_thing" ng-if="bookItem.showHide">
        asdsadsadsadsadsa
      </div>
    </div>
  </div>
</div>

  {{--用户评论--}}
  <div ng-repeat="commit_item in bookItem.book_commit track by $index">
    <div class="clearfix book_list book_commit"  >
      <div class="book_list_left">
        <div class="user-info">
          <img ng-src="[: commit_item.user.avatar :]" alt="">
          <div style="text-align: center;width: 150px;color: #fff;line-height: 20px;text-overflow:ellipsis;white-space:nowrap;overflow: hidden">[: commit_item.user.nickname :]</div>

        </div>
      </div>
      <div class="book_list_right">

        <div class="content">

          <div class="time">
            <i style="color: #F6697A" class="glyphicon glyphicon-time"></i>
            <span>[: commit_item.created_at :]</span>
          </div>

          <div class="content_image">
            <div ng-bind-html="commit_item.content" style="text-indent:2em;word-wrap:break-word;word-break:break-all;">
            </div>
            <span class="content_commit" ng-bind="bookItem.book_commit.length - $index"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<script ng-controller="bookItemController">

//  setTimeout(function(){
//    var book_content = $('.book-list-item-content').text();
//    console.log(book_content);
//    $('.book-list-item-content').html(book_content);
//  },500)




</script>