angular.module('app').factory('SearchHistory', function($resource) {
    return $resource('/api/search/history/:id', {id: '@id'}, {
        last: {method: 'GET'},
        update: {method: 'PUT'}
    });
});
