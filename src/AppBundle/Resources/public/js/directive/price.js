angular.module('app').directive('price', function($parse) {
    return {
        restrict: 'A',
        scope: {
            value: '=value'
        },
        template: '$ [[ value ]]'
    };
});
