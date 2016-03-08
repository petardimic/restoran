angular.module('app').directive('showDelivery',['$modal',mainFunction]);

function mainFunction($modal){
    var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;
    function link(scope, element, attrs) {
        var Window = $modal({
                templateUrl: 'js/modules/orders/partials/showDelivery.html',
                scope: scope,
                show: false
            });
        scope.showDeliveryWindow = function () {
            Window.show();
        };
        scope.hideDeliveryWindow = function () {
            Window.hide();
        };
    }
}

