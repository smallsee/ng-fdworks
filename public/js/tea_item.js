;(function(){


  'use strict';
  angular.module('teaItem',[])
    .service('TeaItemService',[
      '$state',
      '$http',
      'toastr',
      function($state,$http,toastr) {

        var me = this;
        me.tea_item = [];

        me.reset_state = function(params){
          me.tea_item = [];
          me.tea_commit = [];
          me.tea_content = '';
          me.show_hideThing = false;
        };

        me.get = function(params){
          $http.post('api/tea/read',params)
            .then(function(r){

              if (r.data.status){
                me.tea_item = r.data.data;
                me.tea_list = angular.fromJson(me.tea_item.tea_lists);
              }
            })
            .finally(function(){

            })
        };
        me.getCommit = function(params){
          $http.post('api/comment/read',{tea_id : params.id})
            .then(function(r){
              if (r.data.status){
                me.tea_commit = r.data.data.data;
              }
            })
        }
        me.eqSessionId = function(params){
          $http.post('api/eq/sessionid',{tea_id : params.id})
            .then(function(r){
                if (r.data.status){
                  me.showHide =true;
                }else{
                  me.showHide =false;
                }
            })
        }
        me.commit_add = function(params){
          if (me.tea_content.length < 11){
            toastr.error('请填写超过4个字符的文字: ', {
              closeButton: true
            });
          }else{
            $http.post('api/comment/add',{tea_id : params,content:me.tea_content})
              .then(function(r){
                if (r.data.status){
                  me.eqSessionId({id:params});
                  me.show_hideThing = false;
                  me.tea_commit = [];
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
    .controller('teaItemController',[
      '$scope',
      '$stateParams',
      'TeaItemService',
      function($scope,$stateParams,TeaItemService){
        $scope.teaItem = TeaItemService;
        TeaItemService.reset_state($stateParams);
        TeaItemService.get($stateParams);
        TeaItemService.getCommit($stateParams);
        TeaItemService.eqSessionId($stateParams);
        $scope.id = $stateParams.id;
        $scope.show_hideThing = false;


        $scope.add_commit = function(){
          TeaItemService.show_hideThing = true;
        }
        $scope.close_mask = function(){
          TeaItemService.show_hideThing = false;
        }


      }

    ]);



})();


