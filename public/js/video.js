;(function(){


  'use strict';
  angular.module('video',[])
    .service('VideoService',[
      '$http',
      'toastr',
      '$state',
      function($http,toastr,$state){

        var me = this;

        me.reset_state = function(){
          me.video_data = [];
          me.video_data_luoli = [];
        };
        me.get = function(){
          $http.post('data/video/data')
            .then(function(r){
              if (r.data.status){
                me.video_data = r.data.data;
              }
            })

          $http.post('data/video/typedata',{'tag':'luoli'})
            .then(function(r){
              if (r.data.status){
                me.video_data_luoli = r.data.data.data
              }
            })
        }


      }
    ])
    .controller('videoController',[
      '$scope',
      'toastr',
      'VideoService',
      function($scope,toastr,VideoService){
        $scope.video = VideoService;
        VideoService.get();


      }
    ])


})();