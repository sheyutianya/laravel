;(function()
{
    'use strict';

    angular.module('xiaohu',[
	'ui.router',
	])
	.config(function($interpolateProvider,
			$stateProvider,
			$urlRouterProvider)
	{
		$interpolateProvider.startSymbol('[:');
		$interpolateProvider.endSymbol(':]');
		
		
		$urlRouterProvider.otherwise('/home');
	
		var homestate = {
			name:'home',
			url:'/home',
			templateUrl:'home.tpl'
		}
		
		var loginstate = {
			name:'login',
			url:'/login',
			templateUrl:'login.tpl'
		}
		
		var signupstate = {
			name:'signup',
			url:'/signup',
			templateUrl:'signup.tpl'
		}
		
		$stateProvider.state(homestate);
		$stateProvider.state(loginstate);
		$stateProvider.state(signupstate);
	});

})();

