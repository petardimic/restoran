angular.module('app').directive('editMenu',['$modal',mainFunction]);

function mainFunction($modal){
    var directive = {
        link: link,
        restrict: 'A'
    };
    return directive;
    function link(scope, element, attrs) {
        var Window = $modal({
                templateUrl: 'js/modules/cook/partials/editMenu.html',
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

