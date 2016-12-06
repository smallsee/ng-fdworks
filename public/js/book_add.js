;(function(){


  'use strict';
  angular.module('bookAdd',[])
    .service('BookAddService',[
      '$http',
      '$state',
      function($http,$state){
        var me = this;
        me.book_data = {};
        me.book_data.thumb = 'avatar.png';
        me.lists = [];
        me.has_lists = false;

        me.add = function(){
          $http.post('api/book/add',me.book_data)
            .then(function(r){
              $state.go('book');
            })
        }
      }
    ])
    .controller('BookAddController',[
      '$scope',
      'BookAddService',
      function($scope,BookAddService){
        $scope.Book = BookAddService;
        $scope.tag = {};

        $scope.$watch(function(){
          return $scope.tag ;
        },function(n,o){

          var tags = '';
          angular.forEach($scope.tag,function(v,k){
            if (v)
              tags +=k+',';
          });
          BookAddService.book_data.tag = tags.substring(0,tags.length-1);
          if (BookAddService.book_data.tag.length>1){
            $scope.has_tag = true;
          }
          console.log(BookAddService.book_data)
        },true);
      }
    ])

})();