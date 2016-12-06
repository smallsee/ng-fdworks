<div class="signup container" ng-controller="SignupController">
  <div class="card container">


    <form class="form-horizontal" role="form" name="signup_form">
      {{--注册item--}}
      <div class="form-group  has-feedback  col-md-12 ">
        <label class="control-label col-md-offset-2 col-md-2" for="inputSuccess3">
          <input type="radio" ng-model="phone_or_email" ng-value="1" >邮箱注册
        </label>
        <label class="control-label col-md-2" for="inputSuccess3">
          <input type="radio" ng-model="phone_or_email" ng-value="0">手机注册
        </label>
      </div>

      <div ng-if="phone_or_email==1">
        <div class="form-group  has-feedback  col-md-12 "
          ng-class="signup_form.username.$touched ? signup_form.username.$invalid || User.signup_username_exists  ? 'has-error' : 'has-success' : 'has-warning'"
        >
          <label class="control-label col-md-2" for="inputSuccess3">用户名:</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputSuccess3"
                   name="username"
                    ng-minlength="4"
                    ng-maxlength="24"
                    ng-model="User.signup_data.username"
                    ng-model-options="{debounce:500}"
                    placeholder="填写邮箱"
                    required
            >
            <span class="glyphicon  form-control-feedback "
                  ng-class="signup_form.username.$touched ? signup_form.username.$invalid || User.signup_username_exists ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
            ></span>

          </div>
          <div ng-if="signup_form.username.$touched" class="col-md-4">

            <div style="line-height: 0px;" ng-if="signup_form.username.$error.required" class="alert alert-danger" role="alert">用户名为必填项</div>
            <div style="line-height: 0px;" ng-if="User.signup_username_exists" class="alert alert-danger" role="alert">用户名已存在</div>

            <div style="line-height: 0px;" ng-if="signup_form.username.$error.minlength ||
          signup_form.username.$error.maxlength" class="alert alert-danger" role="alert">用户名长度需在4至24位之间</div>
          </div>
        </div>
      </div>

      <div ng-if="phone_or_email==0">
        <div class="form-group  has-feedback  col-md-12 "
             ng-class="signup_form.username.$touched ? signup_form.username.$invalid || User.signup_username_exists  ? 'has-error' : 'has-success' : 'has-warning'"
        >
          <label class="control-label col-md-2" for="inputSuccess3">用户名:</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputSuccess3"
                   name="username"
                   ng-minlength="4"
                   ng-maxlength="24"
                   ng-model="User.signup_data.username"
                   ng-model-options="{debounce:500}"
                   placeholder="填写手机"
                   required
            >
            <span class="glyphicon  form-control-feedback "
                  ng-class="signup_form.username.$touched ? signup_form.username.$invalid || User.signup_username_exists ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
            ></span>

          </div>
          <div ng-if="signup_form.username.$touched" class="col-md-4">

            <div style="line-height: 0px;" ng-if="signup_form.username.$error.required" class="alert alert-danger" role="alert">用户名为必填项</div>
            <div style="line-height: 0px;" ng-if="User.signup_username_exists" class="alert alert-danger" role="alert">用户名已存在</div>

            <div style="line-height: 0px;" ng-if="signup_form.username.$error.minlength ||
          signup_form.username.$error.maxlength" class="alert alert-danger" role="alert">用户名长度需在4至24位之间</div>
          </div>

        </div>
      </div>

      <div ng-if="phone_or_email==0">
        <div class="form-group  has-feedback  col-md-12 "
             ng-class="signup_form.phone_code.$touched ? signup_form.phone_code.$invalid   ? 'has-error' : 'has-success' : 'has-warning'"
        >
          <label class="control-label col-md-2" for="inputSuccess3">手机验证码:</label>
          <div class="col-md-3">
            <input type="text" class="form-control" id="inputSuccess3"
                   name="phone_code"
                   ng-model="User.signup_data.phone_code"
                   placeholder="手机验证码"
                   required
            >
            <span class="glyphicon  form-control-feedback "
                  ng-class="signup_form.phone_code.$touched ? signup_form.phone_code.$invalid  ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
            ></span>

          </div>
          <div class="col-md-2">
            <button class="btn "
                    ng-disabled="signup_form.username.$error.required" ng-click="User.sendSms()"
                    ng-class="signup_form.username.$error.required ? 'btn-default' : 'btn-info' "

            >发送短信</button>
          </div>
          <div ng-if="signup_form.phone_code.$touched" class="col-md-4">

            <div style="line-height: 0px;" ng-if="signup_form.phone_code.$error.required" class="alert alert-danger" role="alert">手机验证码为必填项</div>

          </div>

        </div>
      </div>

      <div class="form-group  has-feedback  col-md-12 "
           ng-class="signup_form.password.$touched ? signup_form.password.$invalid   ? 'has-error' : 'has-success' : 'has-warning'"
      >
        <label class="control-label col-md-2" for="inputSuccess3">密码:</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="inputSuccess3"
                 name="password"
                 ng-minlength="4"
                 ng-maxlength="24"
                 ng-model="User.signup_data.password"
                 placeholder="密码"
                 required
          >
          <span class="glyphicon  form-control-feedback "
                ng-class="signup_form.password.$touched ? signup_form.password.$invalid  ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
          ></span>

        </div>
        <div ng-if="signup_form.password.$touched" class="col-md-4">

          <div style="line-height: 0px;" ng-if="signup_form.password.$error.required" class="alert alert-danger" role="alert">密码验证码为必填项</div>
          <div style="line-height: 0px;" ng-if="signup_form.password.$error.minlength ||
          signup_form.password.$error.maxlength" class="alert alert-danger" role="alert">密码长度需在4至24位之间</div>

        </div>

      </div>


      <div class="form-group  has-feedback  col-md-12 "
           ng-class="signup_form.validateCode.$touched ? signup_form.validateCode.$invalid || User.signup_validateCode_right  ? 'has-error' : 'has-success' : 'has-warning'"
      >
        <label class="control-label col-md-2" for="inputSuccess3">验证码:</label>
        <div class="col-md-3">
          <input type="text" class="form-control" id="inputSuccess3"
                 name="validateCode"
                 ng-model="User.signup_data.validateCode"
                 ng-model-options="{debounce:500}"
                 placeholder="验证码"
                 required
          >
          <span class="glyphicon  form-control-feedback "
                ng-class="signup_form.validateCode.$touched ? signup_form.validateCode.$invalid || User.signup_validateCode_right ? 'glyphicon-remove' : 'glyphicon-ok' : 'glyphicon-asterisk'"
          ></span>

        </div>

        <div class="col-md-2">
          <img src="{{asset('api/validateCode')}}" alt="1" onclick="$(this).attr('src',$(this).attr('src')+'?'+Math.random())">
        </div>
        <div ng-if="signup_form.validateCode.$touched" class="col-md-4">

          <div style="line-height: 0px;" ng-if="signup_form.validateCode.$error.required" class="alert alert-danger" role="alert">验证码为必填项</div>
          <div style="line-height: 0px;" ng-if="User.signup_validateCode_right" class="alert alert-danger" role="alert">验证码错误</div>

        </div>

      </div>

      <div class="col-md-offset-3 col-md-3">


        <div>[: User.signup_validateCode_right :]</div>
        <div>[: User.signup_username_exists :]</div>
        <button class="btn "
                ng-disabled="signup_form.$invalid || User.signup_validateCode_right || User.signup_username_exists" ng-click="User.signup()"
                ng-class="signup_form.$invalid || User.signup_validateCode_right || User.signup_username_exists ? 'btn-default' : 'btn-info' "

        >注册</button>

      </div>

    </form>

  </div>
</div>

<script>

</script>

