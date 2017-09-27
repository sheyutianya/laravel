var app = angular.module('myApp',[]);

app.run(function($rootScope) { 
	$rootScope.name = "Ari Lerner"; 
});

/* app.controller('MyController', function($scope) { 
	$scope.person = { 
		name: "Ari Lerner" 
	}; 
}); */

app.controller('myController',function($scope){
	$scope.person = {
		name:"Ari Lerner"
	};
});