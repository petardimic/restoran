angular.module('app').directive('orderRecipe',['$modal',mainFunction]);

function mainFunction($modal){
    var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;
    function link(scope, element, attrs) {
        var Window = $modal({
                templateUrl: 'js/modules/orders/partials/orderRecipe.html',
                scope: scope,
                show: false
            });
        scope.showWindow = function () {
            Window.show();
        };
        scope.hideWindow = function () {
            Window.hide();
        };
    }
}

