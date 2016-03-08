angular.module('app').directive('acceptOrder',['$modal',mainFunction]);

function mainFunction($modal){
    var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;
    function link(scope, element, attrs) {
        var Window = $modal({
                templateUrl: 'js/modules/orders/partials/showAddress.html',
                scope: scope,
                show: false
            });
        scope.showAddressWindow = function () {
            Window.show();
        };
        scope.hideAddressWindow = function () {
            Window.hide();
        };
    }
}

