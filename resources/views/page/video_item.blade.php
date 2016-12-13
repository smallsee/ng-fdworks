<div class="xiaohai-container" style="display: flex;flex-direction: column" ng-controller="videoItemController">

  <div style="font-size: 15px;display: flex;flex-direction: row;justify-content: space-between;margin-top: 10px;margin-bottom: 20px;">
    <div>
      <span>视频 ></span>
      <span ng-bind="videoItem.video_item.title"></span>
    </div>
    <div style="border-radius: 10px;padding: 0 5px 0 5px;font-size: 22px;height: 30px;line-height: 30px;background-color: black;color: #fff;"><span style="margin-right: 5px;" class="fa fa-lightbulb-o"></span>关灯</div>
  </div>

  <div style="width: 100%;height:675px;background-color: #e5e5e5;display: flex;flex-direction: row;justify-content: center">
    <video controls="controls" src="[: videoItem.video_item.video_url :]"  class="content_video" style="height: 100%;">
    </video>
  </div>

  <div  style="display: flex;flex-direction: row;justify-content: space-between;margin-top: 20px;">
    <div>
      <span>上一集 ></span>
      <span>没有开发 </span>
    </div>

    <div>
      <span>下一集 ></span>
      <span>没有开发 </span>
    </div>
  </div>


  <div class="video-commit-tool" style="display: flex;flex-direction: row;justify-content: space-between;margin-top: 10px;">
    <div class="video-commit-box" style="width: 900px;">
      <div class="clearfix" style="margin-bottom: 5px;width:100%;">
        <span style="float:left;border:1px solid black;width: 60px;height: 30px;line-height: 30px;text-align: center;display: block;margin-right: 5px; ">1</span>

      </div>

      <div style="width:100%;display: flex;flex-direction: row;justify-content: space-between">
        <img ng-src="[: videoItem.video_item.thumb :]" alt="" width="170px" height="100%">
        <div style="width:700px;word-wrap:break-word; word-break:break-all;">

          <div style="font-size: 15px;">
            <span style="color:#fff;border-radius: 5px;background-color: #f68;padding-left: 10px;padding-right: 10px;">标题</span>
            <span style="color: #f68" ng-bind="videoItem.video_item.title"></span>
          </div>

          <div style="font-size: 15px;">
            <span style="color:#fff;border-radius: 5px;background-color: #888;padding-left: 10px;padding-right: 10px;">简介</span>
            <span ng-bind-html="videoItem.video_item.content"></span>
          </div>

          <div style="font-size: 15px;display: flex;flex-direction: row;justify-content: space-between">


            <div>
              <span style="color:#fff;border-radius: 5px;background-color: #888;padding-left: 10px;padding-right: 10px;">观看人数</span>
              <span ng-bind="videoItem.video_item.see"></span>
            </div>

            <div>
              <span style="color:#fff;border-radius: 5px;background-color: #888;padding-left: 10px;padding-right: 10px;">更新时间</span>
              <span ng-bind="videoItem.video_item.created_at"></span>
            </div>

          </div>
        </div>
      </div>

      <div style="margin-top: 20px;">
        <span>上传作者</span>
        <span style="color: #ff6688" ng-bind="videoItem.video_item.user.nickname"></span>

      </div>


      <div class="video-commit">
        <div class="hr"></div>

        <div class="video-add-commit">
          <div style="width: 100%;height: 100px;border: 1px solid pink;padding: 10px; ;">

            <textarea ng-model="videoItem.video_content" cols="105" rows="3" style="outline:none;border: 0;resize:none;">畅言下发表感受吧</textarea>
          </div>

          <div style="width: 100%;margin-top: 10px"  class="clearfix">
            @if(is_logged_in())
              <div ng-click="videoItem.commit_add(id)" style="cursor: pointer;float: right;width: 102px;height: 30px;background: url('{{asset("/img/post-btn.png")}}')"></div>
            @else
              <div ng-click="place_load()" style="cursor: pointer;float: right;width: 102px;height: 30px;background: url('{{asset("/img/post-btn.png")}}')"></div>
            @endif


          </div>
          <div class="hr"></div>
        </div>


        <div style="display: flex;flex-direction: row;justify-content: space-between;margin-bottom: 10px;color:#f68">
          <div style="height: 30px;width: 60px;text-align: center;border: 1px solid pink;border-bottom: 0;line-height: 30px;">评论</div>
          <div style="width: 100%;display:flex;flex-direction: row;justify-content: flex-end;border-bottom: 1px solid pink">
            <span ng-bind="videoItem.video_commit.length"></span>
            <span>人参与,</span>
            <span ng-bind="videoItem.video_commit.length"></span>
            <span >人评论</span>
          </div>
        </div>


      <div ng-if="!videoItem.has_commit">
        暂时没有人评论
      </div>

      <div class="video-commit-box" ng-if="videoItem.has_commit">
        <div ng-repeat="commit_item in videoItem.video_commit track by $index" class="video-commit-item">
          <div style="display: flex;flex-direction: row;">
            <img ng-src="[: commit_item.user.avatar :]" alt="" width="50" height="50px">
            <div style="font-size: 15px;margin-left: 10px;">
              <h4  style="line-height: 20px;color: #ff6688" ng-bind="commit_item.user.nickname"></h4>
              <span ng-bind="commit_item.content"></span>

              <div style="display: flex;flex-direction: row">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
          <div class="hr"></div>
        </div>

        </div>
      </div>

    </div>
    <div class="hot-video" style="width: 250px;">


      <div style="display:flex;flex-direction: row;border-bottom: 1px solid black">
        <div style="height: 30px;line-height: 30px;width: 125px;">
          <span class="glyphicon glyphicon-fire" style="color: red"></span>
          <span>热播视频</span>
        </div>
        <div style="margin-right: 10px;border-bottom: 4px solid #e5e5e5">月</div>
        <div>年</div>
      </div>

      <div style="width: 100%;display: flex;flex-direction: row ;margin-top: 5px;margin-bottom: 5px;font-size: 14px;">
        <img ui-sref="video/item({id:videoItem.video_hot_data.video_hot_big[0].id})" ng-src="[: videoItem.video_hot_data.video_hot_big[0].thumb :]" alt="" width="110" height="100%">
        <div style="margin-left: 5px;">

          <div ui-sref="video/item({id:videoItem.video_hot_data.video_hot_big[0].id})">
            <span style="border-radius: 10px;background: pink;padding-left: 10px;padding-right: 10px;color: #fff">1</span>
            <span ng-bind="videoItem.video_hot_data.video_hot_big[0].title"></span>
          </div>

          <div>
            <span>标签</span>
            <span ng-bind="videoItem.video_hot_data.video_hot_big[0].tag"></span>
          </div>
        </div>

      </div>

      <div ng-repeat="video_item_small in videoItem.video_hot_data.video_hot_small track by $index" style="margin-bottom: 5px;font-size: 14px;">
        <span style="border-radius: 10px;background: pink;padding-left: 10px;padding-right: 10px;color: #fff" ng-bind="$index+2">   </span>
        <span ui-sref="video/item({id:video_item_small.id})" ng-bind="video_item_small.title"></span>
      </div>



    </div>
  </div>
</div>