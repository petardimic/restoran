angular.module('app').directive('showLoginForm',['$modal',mainFunction]);

function mainFunction($modal){
    var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;
    function link(scope, element, attrs) {
        var Window = $modal({
                templateUrl: 'js/modules/orders/partials/showLoginForm.html',
                scope: scope,
                show: false
            });
        scope.showLoginFormWindow = function () {
            Window.show();
        };
        scope.hideLoginFormWindow = function () {
            Window.hide();
        };
    }
}

