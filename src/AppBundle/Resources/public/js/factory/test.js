angular.module('app').factory('Test', function($resource) {
    return $resource('/api/test/:id', {id: '@id'});
});
