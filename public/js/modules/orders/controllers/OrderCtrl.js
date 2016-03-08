(function () {
    'use strict';
    /*global angular*/
    angular.module('app')
        .controller('OrderCtrl', ['toastr','MenuFactory', 'RestorauntFactory','OrderFactory','UserFactory','$window', mainFunction]);

    function mainFunction(toastr, MenuFactory, RestorauntFactory,OrderFactory, UserFactory,$window) {
        var vm = this;
        vm.phone='090909128';
        vm.address='Тестова адреса'
        vm.copy= function (object){
            return angular.copy(object);
        };

        vm.order=[];

        vm.changeRestoraunt= function (restoraunt) {
            vm.selectedRestoraunt=restoraunt;
            vm.menu=MenuFactory.query({id: restoraunt.id});
        }
        RestorauntFactory.query().$promise.then(function(data){ // За замовчуванням обраний перший ресторан по списку
           vm.restorauntList=data;
           vm.selectedRestoraunt=data[0];
           vm.changeRestoraunt (vm.selectedRestoraunt);
        });
        vm.addToOrder = function (quantity){
            if (vm.selectedMenu.is_static!=0) { // Якщо страва статична
                var addNew=true;
                vm.order.forEach(function(item,index){ //Якщо страва вже в корзині додаемо кількість
                    if (item.menu==vm.selectedMenu){
                        vm.order[index].quantity+=quantity;
                        addNew=false;
                    }
                });
                if (addNew){ // Якщо ні додаємо до списку
                    vm.order.push({menu:vm.selectedMenu, quantity: quantity});
                }
            } else { // Якщо клієнт створив страву сам, створюємо кліенський рецепт (не буде відображений в списках)
                vm.selectedMenu.price=vm.findComponentsPrice(quantity);
                vm.selectedMenu.components.forEach(function(component,index){
                    if (component.newQuantity!=undefined) {
                        vm.selectedMenu.components[index].quantity=component.quantity*component.newQuantity;
                        vm.selectedMenu.name+=': '+component.product.name+'-'+component.newQuantity;
                    }
                    delete vm.selectedMenu.components[index].maxQuantity;
                });
                vm.selectedMenu.is_client_recipe=1;
                vm.order.push({menu:vm.selectedMenu, quantity: quantity});
            }
            toastr.success('Скористайтеся кошиком для оформлення замовлення','Ваше замовлення додано');
        };
        vm.findOrderSum = function (){ // Шукаємо ціну замовлення
            var sum=0;
            vm.order.forEach(function(item){
                sum+=parseFloat(item.menu.price*item.quantity);
            });
            return sum;
        }
        vm.findComponentsPrice= function (quantity){ // Вираховуємо ціну страви як базова ціна+кількість компонентів на їх ціну
            var sum=0;
            vm.selectedMenu.components.forEach(function (component){
                if (component.newQuantity!==undefined){
                    sum+=component.newQuantity*component.price;
                }
            });
            return parseFloat(vm.selectedMenu.price)+parseFloat(sum*quantity);
        }
        vm.saveOrder = function (price){ //Збираємо данні до купи та оптимізуємо пост запит
            var newOrder=new OrderFactory();
            var components;
            newOrder.restoraunt_id=vm.selectedRestoraunt.id;
            vm.order.forEach (function(order,index){
                if (order.menu.is_client_recipe!=1) {
                    vm.order[index]={'menu_id':order.menu.id, 'quantity': order.quantity};
                } else {
                    components=[];
                    vm.order[index].menu.components.forEach(function(component){
                        if (component.quantity>0) {
                            components.push({'product_id':component.product.id,'quantity':component.quantity})
                        }
                        vm.order[index].components=components;
                    });
                }
            });
            newOrder.price=price;
            newOrder.menu=vm.order;
            newOrder.address=vm.address;
            newOrder.phone=vm.phone;
            vm.order=[];
            newOrder.$save(function(){
                toastr.success('Смачного','Зараз ми зателефонуємо')
            });
        }
        vm.login = function (login, password, remember){

            var user=new UserFactory();
            user.login=login;
            user.password=password;
            user.remember=remember;
            user.$save (function (data){
                if (data.url!=undefined) {
                    $window.location.href = data.url;
                } else {
                    toastr.error ('Щось не так', 'Перевірте свої данні');
                }
            });
        }
    }
}());
