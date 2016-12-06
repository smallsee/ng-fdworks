<!DOCTYPE html>
<html lang="en" ng-app="xiaohai">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="/node_modules/ng-dialog/css/ngDialog.css">
  <link rel="stylesheet" href="/node_modules/ng-dialog/css/ngDialog-theme-default.css">
</head>


<div ng-controller="MyCtrl">
  <!--<textarea keditor ng-model="info.content" data-config="config" cols="30" rows="10" required></textarea>-->
<!--<p><span style="color: red">ng-model:</span></p>-->
  <!--<text-angular ng-model="htmlVariable"></text-angular>-->
  <div class="ueditor" ng-model="content" config="config"></div>
</div>



<script src="/node_modules/angular/angular.js"></script>
<script src="/node_modules/restangular/dist/restangular.js"></script>
<script src="/node_modules/ng-dialog/js/ngDialog.js"></script>
<script src="/node_modules/ng-file-upload/dist/ng-file-upload-shim.js"></script>
<script src="/node_modules/ng-file-upload/dist/ng-file-upload.js"></script>
<script src='/node_modules/utf8-php/ueditor.config.js'></script>
<script src='/node_modules/utf8-php/ueditor.all.js'></script>
<script src='/node_modules/angular-ueditor/dist/angular-ueditor.js'></script>



<script>
  angular.module('xiaohai', ['ngDialog','ngFileUpload','ng.ueditor'])
          .controller('MyCtrl',[
            '$scope',
            'ngDialog',
            'Upload',
            function($scope,ngDialog,Upload){
              $scope.name = 'xiaohai';


              $scope.config = {

              }


//              $scope.upload = function (file) {

                //转化为base64
//                Upload.base64DataUrl(file).then(function(urls){
//                  console.log(urls)
//                })

                //是否转化为base64
//                Upload.dataUrl(file, true).then(function(url){console.log(url)});

                //获取图片宽高
//                Upload.imageDimensions(file).then(function(dimensions){console.log(dimensions.width, dimensions.height,dimensions);})

                /* Resizes an image. Returns a promise */
// options: width, height, quality, type, ratio, centerCrop, resizeIf, restoreExif
//resizeIf(width, height) returns boolean. See ngf-resize directive for more details of options.
//                Upload.resize(file, options).then(function(resizedFile){console.log(resizedFile)});


//                console.log(file);
//                Upload.upload({
//                  url: '/api/upload/image',
//                  data: {file: file, 'username': $scope.username}
//                }).then(function (resp) {
//
//                }, function (resp) {
//
//                }, function (evt) {
//
//                }).finally(function(){
//                  console.log('s');
//                })
//              };

            }
          ])
</script>

</body>
</html>