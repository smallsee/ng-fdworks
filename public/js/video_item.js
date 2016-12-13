;(function(){


  'use strict';
  angular.module('videoItem',[])
    .service('VideoItemService',[
      '$http',
      'toastr',
      '$state',
      function($http,toastr,$state){
        var me = this;
        me.video_item = [];

        me.reset_state = function(params){
          me.video_item = [];
          me.video_commit = [];
          me.video_hot_data = [];
          me.video_content = '';
          me.show_hideThing = false;
        };

        me.get = function(params){
          $http.post('api/video/read',params)
            .then(function(r){

              if (r.data.status){
                me.video_item = r.data.data;
              }
            })

          $http.post('data/video/timedata')
            .then(function(r){
              if (r.data.status){
                me.video_hot_data = r.data.data;
              }

            })

        };
        me.getCommit = function(params){
          $http.post('api/comment/read',{video_id : params.id})
            .then(function(r){
              if (r.data.status){
                me.video_commit = r.data.data.data;
                me.has_commit = true;

              }
            })
        }
        me.commit_add = function(params){
          if (me.video_content.length < 10){
            toastr.error('请填写超过10个字符的文字: ', {
              closeButton: true
            });
          }else{


            $http.post('api/many/commit',{video_id:params})
              .then(function(r){
                if(r.data.status){

                  $http.post('api/comment/add',{video_id : params,content:me.video_content})
                    .then(function(r){
                      if (r.data.status){
                        me.video_content = '';
                        me.book_commit = [];
                        me.getCommit({id:params});
                        toastr.success('添加成功: ', {
                          closeButton: true
                        });

                      } else{
                        toastr.error('添加错误: ' + r.data.msg, {
                          closeButton: true
                        });
                      }
                    })

                }else{
                  toastr.error('错误: ' + r.data.msg, {
                    closeButton: true
                  });
                }
              })


          }
        }
      }
    ])
    .controller('videoItemController',[
      '$scope',
      'toastr',
      '$stateParams',
      'VideoItemService',
      function($scope,toastr,$stateParams,VideoItemService){
        $scope.videoItem = VideoItemService
        VideoItemService.reset_state($stateParams);
        VideoItemService.get($stateParams);
        VideoItemService.getCommit($stateParams);
        $scope.id = $stateParams.id;


      }
    ])


})();