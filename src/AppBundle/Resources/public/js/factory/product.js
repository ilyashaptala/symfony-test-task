angular.module('app').factory('Product', function ($resource) {
    return $resource('/api/products/:id', {id: '@id'}, {
        update: {method: 'PUT'},
        search: {method: 'GET', params: {id: 'search'}, isArray: true}
    });
});
