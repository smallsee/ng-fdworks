;(function(){



  'use strict';
  angular.module('teaAdd',[])

    .service('TeaAddService',[
      '$state',
      '$http',
      'toastr',
      function($state,$http,toastr){

          var me = this;
          me.tea_data = {};


        me.add = function(){
          $http.post('api/tea/add',me.tea_data)
            .then(function(r){
              if (r.data.status){
                $state.go('tea');
                toastr.success('添加成功!', {
                  closeButton: true
                });
              }else{
                toastr.error('添加失败:' + r.data.msg, {
                  closeButton: true
                });
              }
            })
        }

        me.getToken = function(){
          $http.post('api/get/token',{type:'fd-tea'})
            .then(function(r){
              if (r.data.status){
                me.qiniuToken = r.data.data.data;
              }else{
                toastr.error('获取签名失败!', {
                  closeButton: true
                });
              }

            })
        }



      }
    ])
    .controller('TeaAddController',[
      '$scope',
      'TeaAddService',
      'Upload',
      'toastr',
      function($scope,TeaAddService,Upload,toastr){
        $scope.Tea = TeaAddService;
        TeaAddService.tea_data = {};
        $scope.tag = {};
        TeaAddService.tea_data.thumb = 'avatar.jpg';
        TeaAddService.getToken();


        $scope.upload = function (file) {
          Upload.dataUrl(file, true).then(function(url){  TeaAddService.tea_data.thumb=url; TeaAddService.image_ok = true;});
        }


        $scope.tea_lists = [];
        $scope.tea_lists_upload = [];
        $scope.tea_lists_upload_ok = [];
        $scope.hasImage = false;
        $scope.image_done = false;


        $scope.uploadFiles = function(files,errFiles){
          angular.forEach(files, function(file) {
            $scope.tea_lists_upload.push(file);
            Upload.dataUrl(file, true).then(function(url){  $scope.tea_lists.push(url);});
          })
          $scope.hasImage = true;
        }
        $scope.image_remove = function(index){
          var arr=$.grep($scope.tea_lists,function(n,i){
            return n!=$scope.tea_lists[index]
          });
          var arr_upload=$.grep($scope.tea_lists_upload,function(n,i){
            return n!=$scope.tea_lists_upload[index]
          });

          $scope.tea_lists = arr;
          $scope.tea_lists_upload = arr_upload;
          console.log($scope.tea_lists_upload)

        }
        $scope.img_upload = function(){
          if ( $scope.tea_lists_upload.length < 1){
            toastr.error('上传不能为空!', {
              closeButton: true
            });
          }
          angular.forEach($scope.tea_lists_upload, function(file,index) {

            var randNumber = 'xiaohaiVideo' + Math.random() * 10000;
            var upload = Upload.upload({
              url:'http://upload.qiniu.com/',
              data: {'file':file,'token':TeaAddService.qiniuToken,"key":randNumber},
              method:'POST'
            })
            upload.xhr(function(xhr){
              xhr.upload.addEventListener('progress',function(e){
                $scope.progressBar = Math.floor(e.loaded/e.total* 100);
                $('.bookUpload-progress').eq(index).css({
                  width:$scope.progressBar+'%'
                });
                if ($scope.progressBar == 100){

                  $scope.tea_lists_upload_ok.push('http://oi2tibqwd.bkt.clouddn.com/'+randNumber);
                  toastr.success('上传成功!', {
                    closeButton: true
                  });
                }
              })
            }).finally(function(){

              TeaAddService.tea_data.tea_lists = angular.toJson($scope.tea_lists_upload_ok);
              console.log(TeaAddService.tea_data.tea_lists);
              $scope.image_done = true;
            })


          })

        }

        $scope.$watch(function(){
          return $scope.tag ;
        },function(n,o){
          var tags = '';
          angular.forEach($scope.tag,function(v,k){
            if (v)
              tags +=k+',';
          });
          TeaAddService.tea_data.tag = tags.substring(0,tags.length-1);

          if (TeaAddService.tea_data.tag.length>1){
            $scope.has_tag = true;
          }else{
            $scope.has_tag = false;
          }
          console.log(TeaAddService.tea_data)
        },true);


      }
    ]);

})();