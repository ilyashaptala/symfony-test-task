angular
    .module('app', ['ui.router', 'ui.bootstrap', 'ngResource', 'ngAnimate', 'ngMessages'])
    .config(function($stateProvider, $interpolateProvider, $qProvider) {
        $stateProvider
            .state('test', {
                url: '/app',
                templateUrl: 'app.html',
                controller: 'AppController'
            });

        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
        // $locationProvider.html5Mode(true);
        $qProvider.errorOnUnhandledRejections(false);
    })
    .run(function($state) {
        $state.go('test');
    });
