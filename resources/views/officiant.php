<!DOCTYPE html>
<html ng-app="app">
<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
<link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/angular-toastr/dist/angular-toastr.min.css">
<title>EatThis вітаю маєте нові рецепти ? </title>

<body ng-controller="OfficiantCtrl as vm" ng-cloak>
<div class="container" style="margin-top: 20px">
    <div class="pull-right">
        <a href="/logout" class="btn btn-default"> Вийти </a>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Час</th>
                <th>Адреса</th>
                <th>Телефон</th>
                <th>Ціна</th>
                <th>Замовлення</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="order in vm.orders track by $index">
                <td>{{order.id}}</td>
                <td>{{order.create_at}}</td>
                <td>{{order.address}}</td>
                <td>{{order.phone}}</td>
                <td>{{order.price}}</td>
                <td><span ng-repeat="menu in order.menu_list track by $index">{{menu.menu.name}} - {{menu.quantity}} шт. <br></span></td>
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
<script type="text/javascript" src="js/modules/officiant/controllers/OfficiantCtrl.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/OrderFactory.js"></script>


</body>
</html>
