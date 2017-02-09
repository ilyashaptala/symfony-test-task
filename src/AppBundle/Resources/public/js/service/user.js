angular.module('app').service('CurrentUser', function(User) {
    var currentUser = false;

    User.get().$promise.then(function(user) {
        currentUser = user;
    });

    return {
        isLogin: function() {
            return this.isLoaded() && currentUser.id;
        },
        isLoaded: function() {
            return false !== currentUser;
        },
        getLimits: function() {
            return this.isLogin() ? currentUser.limits : 0;
        },
        hasLimits: function() {
            return this.isLogin() && this.getLimits() > 0;
        },
        decrementLimits: function() {
            currentUser.limits--;
            currentUser.$save();
        }
    };
});
