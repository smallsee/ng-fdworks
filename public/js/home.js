;(function(){


  'use strict';
  angular.module('home',[])
    .controller('HomeController',[
      '$scope',
      'ngDialog',
      'toastr',
      function($scope,ngDialog,toastr){

       // toastr.success('What a nice button', 'Button spree', {
       //   closeButton: true
       // });

        // ngDialog.open({
        //   template: '<p>my template</p>',
        //   plain: true
        // });


      }
    ])


})();