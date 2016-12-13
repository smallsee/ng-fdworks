<div  ng-controller="TeaAddController">




      <form name="teaAdd_form" style="margin-top: 20px;" class="form-horizontal" role="form">



        <div class="form-group  has-feedback  col-md-12 "
             ng-class="teaAdd_form.title.$touched ? teaAdd_form.title.$invalid   ? 'has-error' : 'has-success' : 'has-warning'"
        >
          <label class="control-label col-md-2" for="inputSuccess3">标题:</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputSuccess3"
                   name="title"
                   ng-minlength="4"
                   ng-maxlength="24"
                   ng-model="Tea.tea_data.title"
                   placeholder="标题"
                   required
            >
            <span class="glyphicon  form-control-feedback "
                  ng-class="teaAdd_form.title.$touched ? teaAdd_form.title.$invalid  ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
            ></span>
          </div>
          <div ng-if="teaAdd_form.title.$touched" class="col-md-4">
            <div style="line-height: 0px;" ng-if="teaAdd_form.title.$error.required" class="alert alert-danger" role="alert">标题为必填项</div>
            <div style="line-height: 0px;" ng-if="teaAdd_form.title.$error.minlength ||
          teaAdd_form.title.$error.maxlength" class="alert alert-danger" role="alert">标题长度需在4至24位之间</div>
          </div>
        </div>


        <div class="form-group  has-feedback  col-md-12 "
             ng-class="Tea.image_ok ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">用户头像:</label>
          <div class="col-md-6">
            <img width="140px" height="140px" class="img-thumbnail"
                 ngf-select="upload($file)" ngf-drop="upload($file)" ng-src="[: Tea.tea_data.thumb :]"
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
             ng-class="Tea.tea_data.content.length>0 ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">资源图片:</label>
          <div class="col-md-6" >

            <div class="col-md-12" style="border-radius: 5px;border: 2px solid #ccc;min-height: 100px;text-align: center;"
                 ng-if="!hasImage"
                 ngf-select="uploadFiles($files, $invalidFiles)" ngf-drop="uploadFiles($files, $invalidFiles)"
                 multiple
            >
              <p style="line-height: 100px;">点击添加图片</p>

            </div>

            <div class="col-md-12 clearfix" style="border-radius: 5px;border: 2px solid #ccc;min-height: 100px;text-align: center;line-height: 100px;"
                 ng-if="hasImage"
            >

              <div class="clearfix" style="float:left;width:172px;border: 1px solid #ddd; padding: 4px;margin-top: 5px;margin-right: 10px;"
                   ng-repeat="tea_item in tea_lists track by $index"
              >
                <img  width="160px"
                      ng-src="[: tea_item :]"
                      data-role="lightbox"
                      data-source="[: tea_item :]"
                      data-group="group-5"
                      data-id="[: $index :]"
                      data-caption="littleSea">
                <div style="display: flex;flex-direction: row;justify-content: space-around;margin-top: 10px;">
                  <span onclick="$(this).parent().prev().click()" class="glyphicon glyphicon-zoom-in"></span>
                  <span class="glyphicon glyphicon-pencil"></span>
                  <span ng-click="image_remove($index)" class="glyphicon glyphicon-trash"></span>
                </div>
                <div class="progress" style="margin-bottom: 0;height: 10px;margin-top: 5px;">
                  <div class="bookUpload-progress progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  </div>
                </div>
              </div>


            </div>
          </div>
          <div class="col-md-4" ng-if="hasImage">
            <button type="button" class="btn btn-info"
                    ngf-select="uploadFiles($files, $invalidFiles)" ngf-drop="uploadFiles($files, $invalidFiles)"
                    multiple
                    ng-disabled="image_done"
            >继续添加</button>
            <button  ng-disabled="image_done"   type="button" class="btn btn-primary" ng-click="img_upload()">上传</button>
          </div>
        </div>



        <div class="form-group  has-feedback  col-md-12 "
             ng-class="Tea.tea_data.content.length>0 ? 'has-success' : 'has-warning' "
        >
          <label class="control-label col-md-2" for="inputSuccess3">内容:</label>
          <div class="col-md-6">
            <text-angular ng-model="Tea.tea_data.content" ></text-angular>
          </div>
        </div>




        <button class="btn btn-lg btn-block col-md-8 "
                ng-disabled="teaAdd_form.$invalid || !has_tag   || !Tea.tea_data.content.length>0 "
                ng-click="Tea.add()"
                ng-class="teaAdd_form.$invalid || !has_tag   || !Tea.tea_data.content.length>0  ? 'btn-default' : 'btn-info' "

        >提交</button>

      </form>


</div>



<script type="text/javascript">


</script>