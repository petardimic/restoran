<!DOCTYPE html>
<html ng-app="app">
<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
<link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/angular-toastr/dist/angular-toastr.min.css">
<title>EatThis вітаю маєте нові рецепти ? </title>

<body ng-controller="CookCtrl as vm" ng-cloak>
<div class="container" style="margin-top: 20px">
    <div class="pull-right">
        <a href="/logout" class="btn btn-default"> Вийти </a>
    </div>
    <select
        ng-change="vm.changeRestoraunt(vm.selectedRestoraunt)"
        class="form-control"
        ng-model="vm.selectedRestoraunt" ;
        ng-options="restoraunt.id as restoraunt.name for restoraunt in vm.restorauntList"></select>
    <br>
    <button class="btn btn-success" edit-menu ng-click="vm.clearMenu();showWindow();"><i class="fa fa-plus"></i> Додати
        страву
    </button>
    <table class="table table-hover table-bordered" style="margin-top: 20px">
        <thead>
        <tr>
            <th>Назва</th>
            <th>Склад</th>
            <th>Ціна, грн</th>
            <th style="text-align: center">Дії</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="menu in vm.menu track by $index">
            <td>{{menu.name}}</td>
            <td><span ng-repeat="component in menu.components track by $index">{{component.product.name}} | </span></td>
            <td>{{menu.price}}</td>
            <td style="text-align: center">
                <div class="btn-group-vertical">
                    <a class="btn btn-warning" edit-menu ng-click="vm.selectedMenu=vm.copy(menu);vm.AddEmptyComponent();showWindow();"><i
                            class="fa fa-edit"></i> Редагувати</a>
                    <a class="btn btn-danger" ng-click="vm.removeMenu(menu)"><i class="fa fa-trash"></i> Видалити</a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="vendor/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="vendor/angular/angular.js"></script>
<script type="text/javascript" src="vendor/angular-resource/angular-resource.js"></script>
<script type="text/javascript" src="vendor/angular-animate/angular-animate.js"></script>
<script type="text/javascript" src="vendor/angular-toastr/dist/angular-toastr.tpls.min.js"></script>
<script type="text/javascript" src="vendor/angular-strap/dist/angular-strap.min.js"></script>
<script type="text/javascript" src="vendor/angular-sanitize/angular-sanitize.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/modules/cook/controllers/CookCtrl.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/MenuFactory.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/RestorauntFactory.js"></script>
<script type="text/javascript" src="js/modules/cook/factory/ProductFactory.js"></script>
<script type="text/javascript" src="js/modules/cook/directives/editMenu.js"></script>


</body>
</html>
