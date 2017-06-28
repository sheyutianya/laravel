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
首頁。。。。。。。。。。。。。。。。。。啥
</div>
</script>

<script type="text/ng-template" id="login.tpl">
<div class="login container">
登錄。。。。。。。。。。。。。。
</div>
</script>

<script type="text/ng-template" id="signup.tpl">
<div class="signup container">
注冊。。。。。。。。。。。。
</div>
</script>

</html>
