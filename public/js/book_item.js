;(function(){


  'use strict';
  angular.module('bookItem',[])
    .service('BookItemService',[
      '$state',
      '$http',
      function($state,$http) {

        var me = this;
        me.book_item = [];
        me.reset_state = function(){
          me.book_item = [];
        }
        me.get = function(params){
          $http.post('api/book/read',params)
            .then(function(r){
              if (r.data.status){
                me.book_item = r.data.data;
                me.book_list = angular.fromJson(me.book_item .book_lists);
              }
            })
            .finally(function(){

            })
        }
      }
    ])
    .controller('bookItemController',[
      '$scope',
      '$stateParams',
      'BookItemService',
      function($scope,$stateParams,BookItemService){
        $scope.bookItem = BookItemService;
        BookItemService.get($stateParams);
        $scope.id = $stateParams.id;

        $(function(){
          var lightbox = new LightBox({
            speed:300,
            maxWidth:'auto',
            maxHeight:'auto',
            maskOpacity:0.5,
            scalePic:1
          });
        })
      }

    ]);



})();


