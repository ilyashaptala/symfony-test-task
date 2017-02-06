/* global _ */
angular.module('app').controller('AppController', function($scope) {
    $scope.items = [
        {id: 1, name: 'Apple', priority: 20},
        {id: 2, name: 'Lenovo', priority: 10},
        {id: 3, name: 'Samsung', priority: 40},
        {id: 4, name: 'Nokia', priority: 30},
        {id: 5, name: 'HP', priority: 50}
    ];

    $scope.sortBy = function(column) {
        if (column === $scope.orderBy) {
            $scope.reverse = !$scope.reverse;
        } else {
            $scope.reverse = false;
        }

        $scope.orderBy = column;
    };

    $scope.setDefaultOrder = function() {
        var orderBy = _.first(_.keys(_.first($scope.items)));

        if (orderBy) {
            $scope.sortBy(orderBy);
        }
    };

    $scope.$watch('items', function() {
        $scope.setDefaultOrder();
    }, true);
});
