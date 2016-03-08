angular.module('app').directive('acceptOrder',['$modal',mainFunction]);

function mainFunction($modal){
    var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;
    function link(scope, element, attrs) {
        var Window = $modal({
                templateUrl: 'js/modules/orders/partials/acceptOrder.html',
                scope: scope,
                show: false
            });
        scope.showAcceptWindow = function () {
            Window.show();
        };
        scope.hideAcceptWindow = function () {
            Window.hide();
        };
    }
}

