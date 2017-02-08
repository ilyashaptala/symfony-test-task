/* global _ */
angular.module('app').controller('ProductController', function ($scope, $cookies, $http, Product, CurrentUser) {
    $scope.conditions = $cookies.getObject('conditions') || {};

    $scope.getLatestProducts = function () {
        var lastSearch = $cookies.getObject('conditions');

        if (_.size(lastSearch)) {
            $scope.products = Product.search(lastSearch);
        } else {
            $scope.products = Product.query();
            $scope.reverse = true;
        }
    };

    $scope.sortBy = function (column) {
        if (column === $scope.orderBy) {
            $scope.reverse = !$scope.reverse;
        } else {
            $scope.reverse = false;
        }

        $scope.orderBy = column;
    };

    $scope.setDefaultOrder = function () {
        var orderBy = _.first(_.keys(_.first($scope.products)));

        if (orderBy) {
            $scope.sortBy(orderBy);
        }
    };

    $scope.$watch('products', function () {
        $scope.setDefaultOrder();
    }, true);

    $scope.$watch('conditions', function (newValue, oldValue) {
        _.each($scope.conditions, function (value, key) {
            if (!value) {
                delete $scope.conditions[key];
            }
        });
    }, true);

    $scope.typeahead = function (value) {
        return $http
            .get('/api/products/typeahead', {
                params: {
                    name: value
                }
            })
            .then(function (response) {
                return response.data;
            });
    };

    $scope.search = function () {
        if (CurrentUser.hasLimits()) {
            if (_.size($scope.conditions)) {
                $scope.products = Product.search($scope.conditions);
            } else if (_.size($scope.conditions)) {
                $scope.getLatestProducts();
            }

            CurrentUser.decrementLimits();

            $cookies.putObject('conditions', $scope.conditions);
        }

        return false;
    };

    $scope.getLatestProducts();
});
