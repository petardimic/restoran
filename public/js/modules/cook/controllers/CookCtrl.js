(function () {
    'use strict';
    /*global angular*/
    angular.module('app')
        .controller('CookCtrl', ['toastr','MenuFactory','RestorauntFactory', 'ProductFactory', mainFunction]);

    function mainFunction(toastr, MenuFactory, RestorauntFactory,ProductFactory) {
        var vm = this;
        vm.copy= function (object){
            return angular.copy(object);
        };
        vm.toStr= function (number){
            return number.toString();
        }
        vm.products=ProductFactory.query();
        vm.changeRestoraunt= function (restoraunt) {
            vm.selectedRestoraunt=restoraunt;
            vm.menu=MenuFactory.query({id: vm.selectedRestoraunt});
        }
        RestorauntFactory.query().$promise.then(function(data){ // За замовчуванням обраний перший ресторан по списку
            vm.restorauntList=data;
            vm.selectedRestoraunt=data[0].id;
            vm.changeRestoraunt (vm.selectedRestoraunt);
        });
        vm.clearMenu= function (){
            vm.selectedMenu= new MenuFactory();
            vm.selectedMenu.image='delivery.jpg';
            vm.selectedMenu.name='Введіть назву';
            vm.selectedMenu.description='Новий рецепт';
            vm.selectedMenu.restoraunt_id=vm.selectedRestoraunt;

            vm.selectedMenu.components=[];
            vm.selectedMenu.components.push({});
        };
        vm.saveMenu= function (){
            vm.selectedMenu.$save(function (){
                // так тут можно пушити або обновляти і це красиво і правильно
                // але зараз друга година ночі тому просто обновимо весь список
                vm.changeRestoraunt(vm.selectedRestoraunt);
                vm.clearMenu();
            });

        };
        vm.removeMenu= function (menu){
            vm.menu.splice(vm.menu.indexOf(menu),1);
            menu.$delete ({'id': menu.id});
        };
        vm.AddEmptyComponent = function(){
            if (vm.selectedMenu.components[vm.selectedMenu.components.length-1].product_id){
                vm.selectedMenu.components.push({});
            }
        };
    }
}());
