(function (){
    'use strict';
    /* global angular */
    angular
        .module('app.services')
        .factory('RestorauntFactory',['$resource',factory]);

    function factory($resource){
        return $resource('/restoraunt',{},{
        });
    }
}());