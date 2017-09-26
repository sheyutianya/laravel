<!doctype html>
<html lang="zh" ng-app="xiaohu">
<head>
    <meta charset="UTR-8">
    <title>哈哈提问</title>
    <link rel="stylesheet" href="/node_modules/normalize-css/normalize.css">
    <link rel="stylesheet" href="/css/base.css">
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/angular/angular.js"></script>
    <script src="/node_modules/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="/js/base.js"></script>

</script>
</head>

<body>
	<div class="navbar clearfix">
		<div class="fl">
		    <div class="navbar-item brand">哈问</div>
		    <div class="navbar-item">
		    	<input type="text"></input>
		    </div>
		</div>
		<div class="fr">
		    <a ui-sref="home" class="navbar-item">首页</a>
		    <a ui-sref="login" class="navbar-item">登录</a>
		    <a ui-sref="signup" class="navbar-item">注册</a>
		</div>
	</div>
	<div class="page">
		<div ui-view></div>
	</div>
</body>

<script type="text/ng-template" id="home.tpl">
<div class="home container">
    <h1>最新功能</h1>
    <div class="hr"></div>
    <div class="item-set">
        <div class="item">
            <div class="vote"></div>
            <div class="item-content">
                <div class="content-act">x點在回答</div>
                <div class="title">那个瞬间让你感觉读书真的有用</div>
                <div class="content-owner">作者</div>
                <div class="content-main">
                    最新消息
                </div>
            </div>
            <div class="content-ation">
                <div class="coment">评论</div>
            </div>
        </div>
    </div>
</div>
</script>

<script type="text/ng-template" id="login.tpl">
<div class="login container">
登录。。。。。
</div>
</script>

<script type="text/ng-template" id="signup.tpl">
<div ng-controller="SignupController" class="signup container">
	<div class="card">
		<h1>注册</h1>
		[: User.sigup_username_exists :]
		<form name="signup_form" ng-submit="User.signup()">
			<div>
				<label>用戶名：</label>
                <input name="username"
                type="text"
                ng-minlength="4"
                ng-maxlength="24"
                ng-model="User.signup_data.username"
				ng-model-options="{debounce:500}"
				required
				/>
			</div>
			<div ng-if="signup_form.username.$touched" class="input-error-set">
				<div ng-if="signup_form.username.$error.required"
				>*用户名为必填项*
				</div>
				<div ng-if="signup_form.username.$error.minlength || signup_form.username.$error.maxlength"
				>*用户名长度需在4-24之间*
				</div>	
				<div ng-if="User.sigup_username_exists"
				>*用户名已经存在*
				</div>												
			</div>
			<div>
				<label>密码：</label>
                <input name="password"
                type="password"
                ng-minlength="6"
                ng-maxlength="255"
                ng-model="User.signup_data.password"
				required
				/>
			</div>
			<div ng-if="signup_form.password.$touched" class="input-error-set">
				<div ng-if="signup_form.password.$error.required"
				>*密码为必填项*
				</div>
			    <div ng-if="signup_form.password.$error.minlength || signup_form.password.$error.maxlength"
				>*密码长度需在6-255之间*
				</div>
			</div>
            <button
            type="submit"
            ng-disabled="signup_form.$invalid"
            >注册</button>
		</form>
	</div>
    </div>
</script>

</html>
