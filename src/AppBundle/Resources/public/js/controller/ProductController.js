/* global _ */
angular.module('app').controller('ProductController', function($scope, Product, CurrentUser, SearchHistory) {
    SearchHistory.last().$promise.then(function(history) {
        $scope.conditions = history.conditions || {};

        $scope.getLatestProducts();
    });

    $scope.getLatestProducts = function() {
        if (_.size($scope.conditions)) {
            $scope.products = Product.search($scope.conditions);
        } else {
            $scope.products = Product.query();
            $scope.reverse = true;
        }
    };

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

    $scope.$watch('conditions', function() {
        _.each($scope.conditions, function(value, key) {
            if (!value) {
                delete $scope.conditions[key];
            }
        });
    }, true);

    $scope.typeahead = function(value) {
        return Product.typeahead({name: value}).$promise.then(function(products) {
            return products;
        });
    };

    $scope.search = function() {
        if (false === CurrentUser.hasLimits() && 0 === _.size($scope.conditions)) {
            return;
        }

        CurrentUser.decrementLimits();

        $scope.products = Product.search($scope.conditions);

        SearchHistory.save({conditions: $scope.conditions});

        return false;
    };
});
