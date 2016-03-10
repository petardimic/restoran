(function (){
    'use strict';
    /* global angular */
    angular
        .module('app.services')
        .factory('ProductFactory',['$resource',factory]);

    function factory($resource){
        return $resource('/product',{},{
        });
    }
}());