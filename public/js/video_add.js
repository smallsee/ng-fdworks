;(function(){



  'use strict';
  angular.module('videoAdd',[])

    .service('VideoAddService',[
      '$state',
      '$http',
      'toastr',
      function($state,$http,toastr){

          var me = this;
          me.video_data = {};
          me.video_data.thumb = 'avatar.png';

        me.add = function(){
          $http.post('api/video/add',me.video_data)
            .then(function(r){
              if (r.data.status){
                $state.go('video');
                toastr.success('添加成功!', {
                  closeButton: true
                });
              }else{
                toastr.error('添加失败!'+r.data.msg, {
                  closeButton: true
                });
              }



            })
        }
        me.getToken = function(){
          $http.post('api/get/token',{type:'fd-video'})
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
    .controller('VideoAddController',[
      '$scope',
      'VideoAddService',
      'Upload',
      'toastr',
      function($scope,VideoAddService,Upload,toastr){
        $scope.Video = VideoAddService;
        $scope.tag = {};
        $scope.progressBar = 0;
        VideoAddService.getToken();
        $scope.has_video = false;



        $scope.upload = function (file) {
          Upload.dataUrl(file, true).then(function(url){  VideoAddService.video_data.thumb=url; VideoAddService.image_ok = true;});
        }

        $scope.uploadVideo = function (file) {
          var randNumber = 'xiaohaiVideo' + Math.random() * 10000;
          var upload = Upload.upload({
            url:'http://upload.qiniu.com/',
            data: {'file':file,'token':VideoAddService.qiniuToken,"key":randNumber},
            method:'POST'
          })
          upload.xhr(function(xhr){
            xhr.upload.addEventListener('progress',function(e){
              $scope.progressBar = Math.floor(e.loaded/e.total* 100);
              $('.videoUpload-progress').css({
                width:$scope.progressBar+'%'
              });
              if ($scope.progressBar == 100){
                VideoAddService.video_data.video_url = "http://ohae2zc8b.bkt.clouddn.com/" + randNumber;
                $scope.has_video = true;
                toastr.success('上传成功!', {
                  closeButton: true
                });
              }
            })
          });
        }


        $scope.$watch(function(){
          return $scope.tag ;
        },function(n,o){
          var tags = '';
          angular.forEach($scope.tag,function(v,k){
            if (v)
              tags +=k+',';
          });
          VideoAddService.video_data.tag = tags.substring(0,tags.length-1);

          if (VideoAddService.video_data.tag.length>1){
            $scope.has_tag = true;
          }else{
            $scope.has_tag = false;
          }
          console.log(VideoAddService.video_data)
        },true);


      }
    ]);

})();