angular.module('app').service('CurrentUser', function (User) {
    var user = User.get();

    return {
        isLogin: function() {
            return user && user.id;
        },
        getLimits: function() {
            return user.limits;
        },
        hasLimits: function() {
            return user.limits && false !== user.limits;
        },
        decrementLimits: function() {
            user.limits--;
            user.$save();
        }
    };
});
