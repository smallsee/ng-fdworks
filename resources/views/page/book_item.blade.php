<div class="card clearfix" id="book_list" ng-controller="bookItemController">

  <div class="book_list_left">
    <div class="user-info">
      <img src="avatar.png" alt="">
    </div>
  </div>
  <div class="book_list_right">
    <div class="title" ng-bind="bookItem.book_item.title">

    </div>

    <div class="content">

      <div class="time">
        <i>ss</i>
        <span ng-bind="bookItem.book_item.created_at"></span>
      </div>

      <div class="content_image">

        <img ng-repeat="item in bookItem.book_list track by $index" data-role="lightbox"
             data-source="[: item :]"
             src="[: item :]"
             data-group="group-[: id :]"
             data-id="[: id :] - [: $index :]"
             data-caption="littleSea">

      </div>


    </div>
  </div>

</div>

<script>




</script>