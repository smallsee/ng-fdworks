;(function(){


  'use strict';
  angular.module('bookItem',[])
    .service('BookItemService',[
      '$state',
      '$http',
      'toastr',
      function($state,$http,toastr) {

        var me = this;
        me.book_item = [];

        me.reset_state = function(params){
          me.book_item = [];
          me.book_commit = [];
          me.book_content = '';
          me.show_hideThing = false;
        };

        me.get = function(params){
          $http.post('api/book/read',params)
            .then(function(r){
              if (r.data.status){
                me.book_item = r.data.data;
                me.book_list = angular.fromJson(me.book_item.book_lists);
              }
            })
            .finally(function(){

            })
        };
        me.getCommit = function(params){
          $http.post('api/comment/read',{book_id : params.id})
            .then(function(r){
              if (r.data.status){
                me.book_commit = r.data.data.data;
              }
            })
        }
        me.eqSessionId = function(params){
          $http.post('api/eq/sessionid',{book_id : params.id})
            .then(function(r){
                if (r.data.status){
                  me.showHide =true;
                }else{
                  me.showHide =false;
                }
            })
        }
        me.commit_add = function(params){
          if (me.book_content.length < 11){
            toastr.error('请填写超过4个字符的文字: ', {
              closeButton: true
            });
          }else{
            $http.post('api/comment/add',{book_id : params,content:me.book_content})
              .then(function(r){
                if (r.data.status){
                  me.eqSessionId({id:params});
                  me.show_hideThing = false;
                  me.book_commit = [];
                  me.getCommit({id:params})
                  toastr.success('添加成功: ', {
                    closeButton: true
                  });

                } else{
                  toastr.error('添加错误: ' + r.data.msg, {
                    closeButton: true
                  });
                }
              })
          }

        }
      }
    ])
    .controller('bookItemController',[
      '$scope',
      '$stateParams',
      'BookItemService',
      function($scope,$stateParams,BookItemService){
        $scope.bookItem = BookItemService;
        BookItemService.reset_state($stateParams);
        BookItemService.get($stateParams);
        BookItemService.getCommit($stateParams);
        BookItemService.eqSessionId($stateParams);
        $scope.id = $stateParams.id;
        $scope.show_hideThing = false;


        $scope.add_commit = function(){
          BookItemService.show_hideThing = true;
        }
        $scope.close_mask = function(){
          BookItemService.show_hideThing = false;
        }


      }

    ]);



})();


