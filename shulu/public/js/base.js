;(function () {
    'use strict'
    var angularapp = angular.module('xiaohu', [
    'ui.router',
    ])

    angularapp.config(function ($interpolateProvider,
            $stateProvider,
            $urlRouterProvider) {
        $interpolateProvider.startSymbol('[:')
        $interpolateProvider.endSymbol(':]')

        $urlRouterProvider.otherwise('/home')

        var homestate = {
            name: 'home',
            url: '/home',
            templateUrl: 'home.tpl'
        }

        var loginstate = {
            name: 'login',
            url: '/login',
            templateUrl: 'login.tpl'
        }

        var signupstate = {
            name: 'signup',
            url: '/signup',
            templateUrl: 'signup.tpl'
        }

        $stateProvider.state(homestate)
        $stateProvider.state(loginstate)
        $stateProvider.state(signupstate)
    });

    angularapp.service('UserService', [
        '$state',
        '$http',
        function ($state, $http) {
            var me = this
            me.signup_data = {}
            me.signup = function () {
                $http.post('api/signup', me.signup_data)
                .then(function (r) {
                    me.singnup_data = {}
                    $state.go('login')
                }, function (e) {

                })
            }
            me.username_exist = function () {
                $http.post('/api/exists',
                    { name: me.signup_data.username })
                .then(function (r) {
                    console.log('r', r);
                    if (r.data.status && r.data.data.count) {
                        me.sigup_username_exists = true
                        console.log(1)
                    } else {
                        me.sigup_username_exists = false
                        console.log(2)
                    }
                },
                    function (e) {
                        console.log(e);
                    })
            }
            me.login_data = {}
            me.login = function () {

            }
        }])

    angularapp.controller('SignupController', [
        '$scope',
        'UserService',
        function ($scope, UserService) {
            $scope.User = UserService

            $scope.$watch(function () {
                return UserService.signup_data
            }, function (n, o) {
                if (n.username != o.username) {
                    UserService.username_exist()
                }
            }, true)
        }])

    angularapp.controller('LoginController', [
        '$scope',
        'UserService',
        function ($scope, UserService) {
            $scope.User = UserService
        }
    ])
})()