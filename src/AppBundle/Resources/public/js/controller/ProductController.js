/* global _ */
angular.module('app').controller('ProductController', function ($scope, $cookies, $http, Product) {
    $scope.search = $cookies.getObject('search') || {};

    $scope.getLatestProducts = function () {
        $scope.products = Product.query()
        $scope.reverse = true;
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

    $scope.$watch('search', function (newValue, oldValue) {
        _.each($scope.search, function (value, key) {
            if (!value) {
                delete $scope.search[key];
            }
        });

        if (_.size($scope.search)) {
            $scope.products = Product.search($scope.search);
        } else if (_.size(oldValue)) {
            $scope.getLatestProducts();
        }
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

    $scope.save = function (conditions) {
        $cookies.putObject('search', conditions);

        return false;
    };

    $scope.getLatestProducts();
});
