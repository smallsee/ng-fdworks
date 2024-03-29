;(function(){


  'use strict';
  angular.module('bookAdd',[])
    .service('BookAddService',[
      '$http',
      '$state',
      'toastr',
      function($http,$state,toastr){
        var me = this;

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
        me.getToken = function(){
          $http.post('api/get/token',{type:'fd-book'})
            .then(function(r){
              if (r.data.status){
                me.qiniuToken = r.data.data.data;
              }else{
                toastr.error('获取签名失败!', {
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
        BookAddService.book_data = {};
        BookAddService.book_data.thumb = 'avatar.jpg';

        $scope.tag = {};

        $scope.book_lists = [];
        $scope.book_lists_upload = [];
        $scope.book_lists_upload_ok = [];
        $scope.hasImage = false;
        $scope.image_done = false;
        BookAddService.getToken();

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
          angular.forEach($scope.book_lists_upload, function(file,index) {

            var randNumber = 'xiaohaiVideo' + Math.random() * 10000;
            var upload = Upload.upload({
              url:'http://upload.qiniu.com/',
              data: {'file':file,'token':BookAddService.qiniuToken,"key":randNumber},
              method:'POST'
            })
            upload.xhr(function(xhr){
              xhr.upload.addEventListener('progress',function(e){
                $scope.progressBar = Math.floor(e.loaded/e.total* 100);
                $('.bookUpload-progress').eq(index).css({
                  width:$scope.progressBar+'%'
                });
                if ($scope.progressBar == 100){

                  $scope.book_lists_upload_ok.push('http://ohadc19qz.bkt.clouddn.com/'+randNumber);
                  toastr.success('上传成功!', {
                    closeButton: true
                  });
                }
              })
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