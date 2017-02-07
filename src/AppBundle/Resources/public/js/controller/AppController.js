/* global _ */
angular.module('app').controller('AppController', function($scope, Product) {
    $scope.products = Product.query();

    $scope.sortBy = function(column) {
        if (column === $scope.orderBy) {
            $scope.reverse = !$scope.reverse;
        } else {
            $scope.reverse = false;
        }

        $scope.orderBy = column;
    };

    $scope.setDefaultOrder = function() {
        var orderBy = _.first(_.keys(_.first($scope.products)));

        if (orderBy) {
            $scope.sortBy(orderBy);
        }
    };

    $scope.$watch('products', function() {
        $scope.setDefaultOrder();
    }, true);
});
