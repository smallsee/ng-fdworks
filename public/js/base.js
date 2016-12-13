;(function(){
  'use strict';

  window.his = {
    id:parseInt($('html').attr('user-id'))
  };

  angular.module('fdword',[
    'ui.router',
    'ngDialog',
    'toastr',
    'ngFileUpload',
    'textAngular',
    'user',
    'video',
    'videoAdd',
    'videoItem',
    'home',
    'book',
    'bookAdd',
    'bookItem',
    'tea',
    'teaAdd',
    'teaItem',
  ])
    .config(['$interpolateProvider','$stateProvider','$urlRouterProvider',
      function($interpolateProvider,$stateProvider,$urlRouterProvider){
        $interpolateProvider.startSymbol('[:');
        $interpolateProvider.endSymbol(':]');

        $urlRouterProvider.otherwise('/home');

        $stateProvider
          .state('home',{
            url:'/home',
            templateUrl:'tpl/page/home', //若在当前页面找不到home.tpl 就会到服务端去找


          })
          .state('login',{
            url:'/login',
            templateUrl:'tpl/page/login'
          })

          .state('signup',{
            url:'/signup',
            templateUrl:'tpl/page/signup'
          })
          .state('video',{
            url:'/video',
            templateUrl:'tpl/page/video'
          })

          .state('video/add',{
            url:'/video/add/:id',
            templateUrl:'tpl/page/video/add'
          })

          .state('video/item',{
            url:'/video/item/:id',
            templateUrl:'tpl/page/video/item'
          })

          .state('book',{
            url:'/book',
            templateUrl:'tpl/page/book'
          })

          .state('book/add',{
            url:'/book/add/:id',
            templateUrl:'tpl/page/book/add'
          })
          .state('book/item',{
            url:'/book/item/:id',
            templateUrl:'tpl/page/book/item'
          })
          .state('tea',{
            url:'/tea',
            templateUrl:'tpl/page/tea'
          })
          .state('tea/add',{
            url:'/tea/add/:id',
            templateUrl:'tpl/page/tea/add'
          })
          .state('tea/item',{
            url:'/tea/item/:id',
            templateUrl:'tpl/page/tea/item'
          })
          .state('user',{
            url:'/user/:id',
            templateUrl:'tpl/page/user'
          })



      }])
    .controller('CommonController',[
      '$scope',
      '$location',
      'toastr',
      function($scope,$location,toastr){

        $scope.show_add_data = false;
        $scope.place_load = function(){
          toastr.error('请用户登录在执行此操作。', {
            closeButton: true
          });
        };
        $scope.show_add_data = function(){
          console.log('1')
          $scope.show_add_data = true;
        }




        $scope.$watch(function(){
          return $location.url();
        },function(n,o){
          var   url_str_ten = n.substr(0, 8);
          var  url_exists_video = url_str_ten.indexOf('/video');
          var  url_exists_home = url_str_ten.indexOf('/home');
          var  url_exists_book = url_str_ten.indexOf('/book');
          var  url_exists_tea = url_str_ten.indexOf('/tea');
          var nav_item_cur_page = 0;

          if (url_exists_home == 0){
            nav_item_cur_page = 0;
          }
          if (url_exists_book == 0){
            nav_item_cur_page = 2;
          }
          if (url_exists_video == 0){
            nav_item_cur_page = 3;
          }
          if (url_exists_tea == 0){
            nav_item_cur_page = 1;
          }

          nav_item_cur.css({
            'left':nav_item_cur_page * (nav_item.outerWidth() +10 )
          });

          nav_item.on('mouseout',function(){
            nav_item_cur.css({
              'left':nav_item_cur_page * (nav_item.outerWidth() +10 )
            })
          })

        },true);
      }
    ])






})();