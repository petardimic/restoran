(function (){
    'use strict';
    /* global angular */
    angular
        .module('app.services')
        .factory('UserFactory',['$resource',factory]);

    function factory($resource){
        return $resource('/login',{},{
        });
    }
}());