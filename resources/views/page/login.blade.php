<div class="login container" ng-controller="LoginController">
  <div class="card">
    <h1>登录</h1>
    <form  class="form-horizontal" role="form" name="login_form" ng-submit="User.login()">


      <div class="form-group  has-feedback  col-md-12 "
           ng-class="login_form.username.$touched ? login_form.username.$invalid   ? 'has-error' : 'has-success' : 'has-warning'"
      >
        <label class="control-label col-md-2" for="inputSuccess3">账号:</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="inputSuccess3"
                 name="username"
                 ng-model="User.login_data.username"
                 placeholder="账号"
                 required
          >
          <span class="glyphicon  form-control-feedback "
                ng-class="login_form.username.$touched ? login_form.username.$invalid  ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
          ></span>

        </div>
        <div ng-if="login_form.username.$touched" class="col-md-4">
          <div style="line-height: 0px;" ng-if="login_form.username.$error.required" class="alert alert-danger" role="alert">账号为必填项</div>
        </div>

      </div>



      <div class="form-group  has-feedback  col-md-12 "
           ng-class="login_form.password.$touched ? login_form.password.$invalid   ? 'has-error' : 'has-success' : 'has-warning'"
      >
        <label class="control-label col-md-2" for="inputSuccess3">密码:</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="inputSuccess3"
                 name="password"
                 ng-model="User.login_data.password"
                 placeholder="密码"
                 required
          >
          <span class="glyphicon  form-control-feedback "
                ng-class="login_form.password.$touched ? login_form.password.$invalid  ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
          ></span>

        </div>
        <div ng-if="login_form.password.$touched" class="col-md-4">
          <div style="line-height: 0px;" ng-if="login_form.password.$error.required" class="alert alert-danger" role="alert">密码为必填项</div>
        </div>

      </div>


      <button class="btn btn-lg btn-block" type="submit"
              ng-disabled="login_form.$invalid"
              ng-class="login_form.$invalid  ? 'btn-default' : 'btn-info' "

      >登录</button>


    </form>
  </div>
</div>