(function () {
    'use strict';
    /*global angular*/
    angular.module('app')
        .controller('OfficiantCtrl', ['toastr','OrderFactory', mainFunction]);

    function mainFunction(toastr, OrderFactory) {
        var vm = this;
        vm.orders=OrderFactory.query();

    }
}());
