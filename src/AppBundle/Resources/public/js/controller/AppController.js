angular.module('app').controller('AppController', function($scope) {
    $scope.items = [
        {id: 1, name: 'Apple', priority: 20},
        {id: 2, name: 'Lenovo', priority: 10},
        {id: 3, name: 'Samsung', priority: 40},
        {id: 4, name: 'Nokia', priority: 30},
        {id: 5, name: 'HP', priority: 50}
    ];

    $scope.setOrderBy = function(column) {
        $scope.orderBy = column;
    };

    $scope.setOrderBy('priority');
});
