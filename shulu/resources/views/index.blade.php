<!doctype html>
<html lang="zh" ng-app="xiaohu">
<head>
    <meta charset="UTR-8">
    <title>哈哈提問</title>
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
		    <div class="navbar-item brand">哈問</div>
		    <div class="navbar-item">
		    	<input type="text"></input>
		    </div>
		</div>
		<div class="fr">
		    <a ui-sref="home" class="navbar-item">首頁</a>
		    <a ui-sref="login" class="navbar-item">登錄</a>
		    <a ui-sref="signup" class="navbar-item">注冊</a>
		</div>
	</div>
	<div class="page">
		<div ui-view></div>
	</div>
</body>

<script type="text/ng-template" id="home.tpl">
<div class="home container">
    <h1>最新動態</h1>
    <div class="hr"></div>
    <div class="item-set">
        <div class="item">
            <div class="vote"></div>
            <div class="item-content">
                <div class="content-act">x點在回答</div>
                <div class="title">那個瞬間讓你感覺讀書真的有用</div>
                <div class="content-owner">作者</div>
                <div class="content-main">
                    最新消息顯示圖蘭特和勇士的合同不會續約
                </div>
            </div>
            <div class="content-ation">
                <div class="coment">評論</div>
            </div>
        </div>
    </div>
</div>
</script>

<script type="text/ng-template" id="login.tpl">
<div class="login container">
登錄。。。。。。。。。。。。。。
</div>
</script>

<script type="text/ng-template" id="signup.tpl">
<div ng-controller="SignupController" class="signup container">
	<div class="card">
		<h1>注冊</h1>
		[: User.signup_data :]
		<form name="signup_form" ng-submit="User.signup()">
			<div>
				<label>用戶名：</label>
                <input name="username"
                type="text"
                ng-minlength="4"
                ng-maxlength="24"
                ng-model="User.signup_data.username"/>
			</div>
			<div>
				<label>密碼：</label>
                <input name="password"
                type="password"
                ng-minlength="6"
                ng-maxlength="255"
                ng-model="User.signup_data.password"/>
			</div>
            <button
            type="submit"
            ng-disabled="signup_form.$invalid"
            >注冊</button>
		</form>
	</div>
    </div>
</script>

</html>
