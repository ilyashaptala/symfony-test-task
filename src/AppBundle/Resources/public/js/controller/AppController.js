angular.module('app').controller('AppController', function($scope, CurrentUser) {
    $scope.user = CurrentUser;
});
