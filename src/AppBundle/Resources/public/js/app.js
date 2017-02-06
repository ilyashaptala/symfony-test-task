angular
    .module('app', ['ui.router', 'ui.bootstrap', 'ngResource', 'ngAnimate', 'ngMessages'])
    .config(function($stateProvider, $interpolateProvider, $qProvider) {
        $stateProvider
            .state('test', {
                url: '/',
                templateUrl: 'app.html',
                controller: 'AppController'
            });

        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
        $qProvider.errorOnUnhandledRejections(false);
    })
    .run(function($state) {
        $state.go('test');
    });
