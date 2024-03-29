(function () {
    "use strict";
    /* global angular*/
    var app = angular.module('app',
        [
            'ngResource',
            'app.services',
            'ngSanitize',
            'mgcrea.ngStrap',
            'ngAnimate',
            'toastr',
        ]);
    angular.module('app.services', []);
    angular.module('app.helpers', ['mgcrea.ngStrap']).
        config(['$modalProvider', function ($modalProvider) {
            angular.extend($modalProvider.defaults, {
                html: true
            });
        }]);

    angular.module('app').config(['toastrConfig', function (toastrConfig) {
        angular.extend(toastrConfig, {
            positionClass: 'toast-bottom-right'
        });
    }]);


}());
