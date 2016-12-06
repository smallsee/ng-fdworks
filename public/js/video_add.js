;(function(){



  'use strict';
  angular.module('videoAdd',[])

    .service('VideoAddService',[
      '$state',
      '$http',
      function($state,$http){

          var me = this;
          me.video_data = {};
          me.video_data.thumb = 'avatar.png';

        me.add = function(){
          $http.post('api/video/add',me.video_data)
            .then(function(r){
              if (r.data.status)
                $state.go('video');
              else
                dialog.error(r.data.msg[0]);
            })
        }


      }
    ])
    .controller('VideoAddController',[
      '$scope',
      'VideoAddService',
      function($scope,VideoAddService,FileUploader){
        $scope.Video = VideoAddService;
        $scope.tag = {};


        var randNumber = Math.random() * 10000;
        $scope.video_upload = function(files){
          var Cts = files[0];
          // if (Cts.type.indexOf("video") < 0  ){
          //   dialog.error('最好上传mp4格式的视频')
          //   return
          // }

          var fd = new FormData();
          fd.append("file",Cts);
          fd.append("token","-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2:dvTrSQ1f3lSs8O3eCcJLCHKI1Zw=:eyJzY29wZSI6ImZkLXZpZGVvIiwiZGVhZGxpbmUiOjE0ODA0MzY2Mzd9");
          fd.append("key","xiaohai-video"+randNumber);
          var xhr = new XMLHttpRequest();
          xhr.addEventListener('progress', function(e) {
            var done = e.loaded || e.loaded, total = e.total || e.total;
            console.log('xhr上传进度: ' + (Math.floor(done/total*1000)/10) + '%');
          }, false);
          if ( xhr.upload ) {
            xhr.upload.onprogress = function(e) {
              var done = e.loaded || e.loaded, total = e.total || e.total;
              console.log('xhr.upload上传进度: ' + done + ' / ' + total + ' = ' + (Math.floor(done/total*1000)/10) + '%');
              $('#progress_uploading').html( (Math.floor(done/total*1000)/10) + '%');
              document.getElementById("progress").value = Math.floor(done/total*1000)/10;
              if ((Math.floor(done/total*1000)/10) == 100 ){
                VideoAddService.video_data.video_url = "http://ohae2zc8b.bkt.clouddn.com/xiaohai-video"+randNumber;
              }
            };
          }
          xhr.onreadystatechange = function(e) {
            if ( 4 == this.readyState ) {
              console.log(['xhr upload complete', e]);
            }
          };
          xhr.open('post', 'http://up.qiniu.com?', true);
          xhr.send(fd);
        };

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
          }
        },true);

      }
    ]);

})();