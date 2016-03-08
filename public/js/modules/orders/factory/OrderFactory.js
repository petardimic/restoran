(function (){
    'use strict';
    /* global angular */
    angular
        .module('app.services')
        .factory('OrderFactory',['$resource',factory]);

    function factory($resource){
        return $resource('/order',{},{
        });
    }
}());