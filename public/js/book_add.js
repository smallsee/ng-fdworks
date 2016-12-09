;(function(){


  'use strict';
  angular.module('bookAdd',[])
    .service('BookAddService',[
      '$http',
      '$state',
      'toastr',
      function($http,$state,toastr){
        var me = this;
        me.book_data = {};
        me.book_data.thumb = 'avatar.jpg';
        me.has_lists = false;

        me.add = function(){
          $http.post('api/book/add',me.book_data)
            .then(function(r){
              if (r.data.status){
                toastr.success('上传成功!', {
                  closeButton: true
                });
                $state.go('book');
              }else{
                toastr.error('上传失败: ' + r.data.msg, {
                  closeButton: true
                });
              }
            })
        }
      }
    ])
    .controller('BookAddController',[
      '$scope',
      'BookAddService',
      'Upload',
      'toastr',
      function($scope,BookAddService,Upload,toastr){
        $scope.Book = BookAddService;
        $scope.tag = {};
        $scope.book_lists = [];
        $scope.book_lists_upload = [];
        $scope.book_lists_upload_ok = [];
        $scope.hasImage = false;
        $scope.image_done = false;
        $scope.upload = function (file) {
          Upload.dataUrl(file, true).then(function(url){  BookAddService.book_data.thumb=url; BookAddService.image_ok = true;});
        }

        $scope.uploadFiles = function(files,errFiles){
          angular.forEach(files, function(file) {
            $scope.book_lists_upload.push(file);
            Upload.dataUrl(file, true).then(function(url){  $scope.book_lists.push(url);});
          })
          $scope.hasImage = true;
        }

        $scope.image_remove = function(index){
          var arr=$.grep($scope.book_lists,function(n,i){
            return n!=$scope.book_lists[index]
          });
          var arr_upload=$.grep($scope.book_lists_upload,function(n,i){
            return n!=$scope.book_lists_upload[index]
          });

          $scope.book_lists = arr;
          $scope.book_lists_upload = arr_upload;
          console.log($scope.book_lists_upload)

        }
        $scope.img_upload = function(){
          if ( $scope.book_lists_upload.length < 1){
            toastr.error('上传不能为空!', {
              closeButton: true
            });
          }
          angular.forEach($scope.book_lists_upload, function(file) {
            Upload.upload({
              url: 'api/upload/image',
              data: {file: file}
            }).then(function (resp) {
              console.log(resp);
              if (resp.data.error == 0){
                toastr.success('上传成功!', {
                  closeButton: true
                });
                $scope.book_lists_upload_ok.push(resp.data.url)
              }

            }, function (resp) {

            }, function (evt) {
              var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
              console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            }).finally(function(){

              BookAddService.book_data.book_lists = angular.toJson($scope.book_lists_upload_ok);
              console.log(BookAddService.book_data.book_lists);
              $scope.image_done = true;
            })
          })
        }



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
          }else{
            $scope.has_tag = false;
          }
          console.log(BookAddService.book_data)
        },true);
      }
    ])

})();