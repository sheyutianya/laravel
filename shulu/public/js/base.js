;(function()
{
    'use strict';

     var angularapp = angular.module('xiaohu',[
	'ui.router',
	]);

	angularapp.config(function($interpolateProvider,
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

	angularapp.service('UserService',[
        '$http',
	    function($http){
		    var me = this;
		    me.signup_data = {};
		    me.signup = function(){
                console.log('login ok');
            }
            me.username_exist = function(){
                $http.post('/api/exists',
                    {username:me.signup_data.username})
                .then(function(r)
                     {
                        console.log('exists return suc');0
                        console.log(r);
                     },
                     function(e)
                     {
                        console.log(e);
                     });
            }
	    }]);

	angularapp.controller('SignupController',[
	    '$scope',
	    'UserService',
	    function($scope,UserService){
	    	$scope.User = UserService;

            $scope.$watch(function(){
                return UserService.signup_data;
            },function(n,o){
                if(n.username != o.username){
                     UserService.username_exist();
                }
            },true);

	    }]);

})();

