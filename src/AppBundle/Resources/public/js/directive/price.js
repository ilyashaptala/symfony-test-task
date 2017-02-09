angular.module('app').directive('price', function() {
    return {
        restrict: 'A',
        scope: {
            value: '=value'
        },
        template: '$ [[ value ]]'
    };
});
