(function (){
    'use strict';
    /* global angular */
    angular
        .module('app.services')
        .factory('MenuFactory',['$resource',factory]);

    function factory($resource){
        return $resource('/menu/:id',{},{
        });
    }
}());