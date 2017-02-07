angular
    .module('app', ['ui.router', 'ui.bootstrap', 'ngResource', 'ngCookies', 'ngAnimate', 'ngMessages'])
    .config(function($stateProvider, $interpolateProvider, $qProvider) {
        $stateProvider
            .state('products', {
                url: '/',
                templateUrl: 'products.html',
                controller: 'ProductController'
            });

        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
        $qProvider.errorOnUnhandledRejections(false);
    })
    .run(function($state) {
        $state.go('products');
    });
