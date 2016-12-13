;(function(){


  'use strict';
  angular.module('tea',[])
    .service('TeaService',[
      '$http',
      'toastr',
      '$state',
      function($http,toastr,$state){

        var me = this;

        me.reset_state = function(){
          me.tea_data = [];
        };
        me.get = function(){
          $http.post('data/tea/data')
            .then(function(r){

               if (r.data.status){
                 me.tea_data = r.data.data.data;
               }

            })

        }


      }
    ])
    .controller('TeaController',[
      '$scope',
      'toastr',
      'TeaService',
      function($scope,toastr,TeaService){
        $scope.Tea = TeaService;
        TeaService.get();


      }
    ])


})();