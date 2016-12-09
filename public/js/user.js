;(function(){
  'use strict';
  angular.module('user',[])

    .service('UserService',[
      '$state',
      '$http',
      'toastr',
      function($state,$http,toastr){
        var me = this;
        me.signup_data = {};
        me.login_data = {};
        me.data = {};
        me.signup_data.avatar = 'avatar.jpg';

        me.sendSms = function(){
          console.log('s');
        };

        me.read = function(param){
          return $http.post('api/user/read',param)
            .then(function(r){
              if (r.data.status){
                me.current_user = r.data.data;
                me.data[param.id] = r.data.data;


              }else{
                if (r.data.msg == 'login required')
                  $state.go('login');
              }

            })
        };

        me.signup = function(){
          $http.post('api/signup',me.signup_data)
            .then(function(r){

              if (r.data.status){
                me.signup_data = {};
                toastr.success('注册成功!', {
                  closeButton: true
                });
                $state.go('login');
              }

            },function(e){

            })
        };

        me.login = function(){
          $http.post('api/login',me.login_data)
            .then(function(r){

              if (r.data.status){
                location.href = '/';
              }
              else{
                toastr.error(r.data.msg, {
                  closeButton: true
                });
                me.login_failed = true;
              }

            },function(e){

            })
        };

        me.validateCode_exists = function(){
          $http.post('api/validateCode/exists',
            {validateCode:me.signup_data.validateCode})
            .then(function(data){

              if (data.data.status)
                me.signup_validateCode_right = false;
              else
                me.signup_validateCode_right = true;

            },function(e){

              console.log('e',e);
            })
        };
        me.username_exists = function(){
          $http.post('api/user/exists',
            {username:me.signup_data.username})
            .then(function(data){

              if (data.data.length > 0)
                me.signup_username_exists = true;
              else
                me.signup_username_exists = false;

            },function(e){

              console.log('e',e);
            })
        }
      }
    ])
    .controller('SignupController',[
      '$scope',
      'UserService',
      'Upload',
      function($scope,UserService,Upload){
        $scope.User = UserService;
        $scope.phone_or_email = 1 ;
        $scope.more_data  = false;

        $scope.show_data = function(){
          $scope.more_data = !$scope.more_data;
        }

       $scope.upload = function (file) {

         Upload.dataUrl(file, true).then(function(url){UserService.signup_data.avatar=url; });

       }


        $scope.$watch(function(){
          return UserService.signup_data;
        },function(n,o){
          if (n.username != o.username)
            UserService.username_exists();
          if (n.validateCode != o.validateCode)
            UserService.validateCode_exists();
        },true);
      }
    ])

    .controller('LoginController',[
      '$scope',
      'UserService',
      function($scope,UserService){
        $scope.User = UserService;
      }
    ])


})();