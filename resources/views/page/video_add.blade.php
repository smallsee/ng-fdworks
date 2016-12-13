<div  ng-controller="VideoAddController">




      <form name="videoAdd_form" style="margin-top: 20px;" class="form-horizontal" role="form">



        <div class="form-group  has-feedback  col-md-12 "
             ng-class="videoAdd_form.title.$touched ? videoAdd_form.title.$invalid   ? 'has-error' : 'has-success' : 'has-warning'"
        >
          <label class="control-label col-md-2" for="inputSuccess3">标题:</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputSuccess3"
                   name="title"
                   ng-minlength="4"
                   ng-maxlength="24"
                   ng-model="Video.video_data.title"
                   placeholder="标题"
                   required
            >
            <span class="glyphicon  form-control-feedback "
                  ng-class="videoAdd_form.title.$touched ? videoAdd_form.title.$invalid  ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
            ></span>
          </div>
          <div ng-if="videoAdd_form.title.$touched" class="col-md-4">
            <div style="line-height: 0px;" ng-if="videoAdd_form.title.$error.required" class="alert alert-danger" role="alert">标题为必填项</div>
            <div style="line-height: 0px;" ng-if="videoAdd_form.title.$error.minlength ||
          videoAdd_form.title.$error.maxlength" class="alert alert-danger" role="alert">标题长度需在4至24位之间</div>
          </div>
        </div>


        <div class="form-group  has-feedback  col-md-12 "
             ng-class="Video.image_ok ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">用户头像:</label>
          <div class="col-md-6">
            <img width="140px" height="140px" class="img-thumbnail"
                 ngf-select="upload($file)" ngf-drop="upload($file)" ng-src="[: Video.video_data.thumb :]"
            >
          </div>
        </div>

        <div class="form-group  has-feedback  col-md-12 "
             ng-class="has_tag ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">标签:</label>
          <div class="col-md-8">
            <div class="checkbox">
              <label class="col-md-1">
                <input type="checkbox" ng-true-value="true" ng-false-value="false" ng-model="tag.renqi" />人妻
              </label>
              <label class="col-md-1">
                <input type="checkbox" ng-true-value="true" ng-false-value="false" ng-model="tag.luoli" />萝莉
              </label>
              <label class="col-md-1">
                <input type="checkbox" ng-true-value="true" ng-false-value="false" ng-model="tag.zhifu" />制服
              </label>
              <label class="col-md-1">
                <input type="checkbox" ng-true-value="true" ng-false-value="false" ng-model="tag.chinv" />痴女
              </label>
              <label class="col-md-1">
                <input type="checkbox" ng-true-value="true" ng-false-value="false" ng-model="tag.chushou" />触手
              </label>
            </div>
          </div>
        </div>


        <div class="form-group  has-feedback  col-md-12 "
             ng-class="Video.image_ok ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">用户头像:</label>
          <div class="col-md-6">
            <img width="140px" height="140px" class="img-thumbnail"
                 ngf-select="uploadVideo($file)" ngf-drop="uploadVideo($file)" ng-src="avatar.jpg"
            >
            <div class="progress">
              <div class="videoUpload-progress progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
              </div>
              <div>[: progressBar :]</div>
            </div>
          </div>
        </div>



        <div class="form-group  has-feedback  col-md-12 "
             ng-class="Video.video_data.content.length>0 ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">内容:</label>
          <div class="col-md-6">
            <text-angular ng-model="Video.video_data.content" ></text-angular>
          </div>
        </div>




        <button class="btn btn-lg btn-block col-md-8 "
                ng-disabled="videoAdd_form.$invalid || !has_tag  || !has_video || !Video.video_data.content.length>0 "
                ng-click="Video.add()"
                ng-class="videoAdd_form.$invalid || !has_tag || !has_video  || !Video.video_data.content.length>0  ? 'btn-default' : 'btn-info' "

        >提交</button>

        {{--<progress id="progress" value="0" max="100"></progress>--}}
        {{--<input type="file" id="xiaohai_video" onchange="angular.element(this).scope().video_upload(this.files)">--}}


        {{--<textarea  id="video_content" ng-click="uploadVideo()"></textarea>--}}

        {{--<textarea ng-model="Video.video_data.content" required></textarea>--}}

      </form>


</div>



<script type="text/javascript">


</script>