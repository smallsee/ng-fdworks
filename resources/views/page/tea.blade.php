<div ng-controller="TeaController">
<div class="xiaohai-container" style="background-color: #efefef;margin-top: 10px;">

<div id="rule-tea">
  <div class="left"></div>
  <ul>
    <li><a href="#">全部</a></li>
    <li><a href="#">交流</a></li>
    <li><a href="#">动画资讯</a></li>
    <li><a href="#">其他资讯</a></li>
    <li><a href="#">茶会事务</a></li>
  </ul>

  <div class="all_rule">
    <h2>论坛bug反馈&建议(仮)</h2>
    <p>如图说明：</p>
    <p>第一 本帖回复需与论坛bug，系统错误，建议有关，无关内容会被删帖，请勿在此水帖；</p>
    <p></p>
    <p></p>
  </div>
</div>
<div class="tea-tool" ng-repeat="tea_item in Tea.tea_data track by $index">
      <div class="left">
        <div class="title">
          <p class="bottom-boder"><a href="#">茶会资讯</a></p>
          <p>POSTED BY</p>
          <p class="bottom-boder"><a href="#">Tea</a></p>
          <p>POSTED IN</p>
          <p class="bottom-boder" ng-bind="tea_item.created_at"></p>
          <p>COMMENTS</p>
          <p class="bottom-boder">[: tea_item.commit.length :]次評價</p>
        </div>
      </div>
      <div class="right">
        <div class="content">
          <h2 ng-bind="tea_item.title"></h2>
          <div style="overflow: hidden">
            <a ui-sref="tea/item({id:tea_item.id})">
              <img  class="tea-thumb" ng-src="[: tea_item.thumb :]" alt="" width="100%">
            </a>
          </div>
          <p ng-bind-html="tea_item.content"></p>
        </div>
        <div class="last">
          <span>最新評論</span>
          <ul>
            <li ng-repeat="tea_commit_item in Tea.tea_data[$index].commit track by $index">
              <img  ng-src="[: tea_commit_item.user.avatar :]" alt="1" />
              <p style="overflow:hidden;text-overflow:ellipsis; -o-text-overflow:ellipsis;white-space:nowrap;" ng-bind-html="tea_commit_item.content"></p>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
</div>




</div>
</div>