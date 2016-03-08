<!DOCTYPE html>
<html ng-app="app">
<head>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/angular-toastr/dist/angular-toastr.min.css">
    <title>EatThis</title>
</head>
<body>
<header id="header-full-top" name="header" class="hidden-xs header-full">
    <nav class="container">
        <div class="header-full-title">
            <h1 class="animated fadeInRight"><a ui-sref="home">Eat <span>This</span></a></h1>

            <p class="animated fadeInRight">Найсмачніша їжа, завжди поруч </p>
        </div>
        <nav class="top-nav">
            <blockquote class="blockquote-big">
                <p>При великих неприємностях я відмовляю собі в усьому, крім їжі та напоїв.</p>
                <footer><cite title="Source Title">Оскар Уайльд</cite></footer>
            </blockquote>
        </nav>
    </nav>
</header>
<div ng-controller="OrderCtrl as vm">
<nav class="navbar navbar-default navbar-header-full navbar-yellow" role="navigation" id="header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a id="ar-brand" class="navbar-brand hidden-lg hidden-md hidden-sm" href="index.html">Eat
                <span>This</span></a>
        </div>
        <div class="pull-right">
            <a class="sb-icon-navbar sb-toggle-right" accept-order ng-click="showAcceptWindow()">
                <i class="fa fa-shopping-cart">
                    <small>Усього {{vm.findOrderSum()}} грн</small>
                </i>
            </a>
        </div>
        <div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-1" aria-expanded="true">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a class="dropdown-toggle">{{vm.selectedRestoraunt.name}}</a>
                    <ul class="dropdown-menu  dropdown-menu-left">
                        <li ng-repeat="restoraunt in vm.restorauntList track by $index">
                            <a ng-click="vm.changeRestoraunt(restoraunt)">
                                <i ng-class="{'fa fa-check':restoraunt==vm.selectedRestoraunt}"></i>
                                {{::restoraunt.name}}</a>
                        </li>
                </li>
            </ul>
            </li>
            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" show-delivery ng-click="showDeliveryWindow()">Оплата та доставка</a>
            </li>
            <li>
                <a show-address ng-click="showAddressWindow()" class="dropdown-toggle">Контакти</a>
            </li>
            <li>
                <a class="dropdown-toggle" show-login-form ng-click="showLoginFormWindow()">Авторизація</a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid" style="margin-top: 10px">
    <div class="col-md-4" ng-repeat="menu in vm.menu track by $index" order-recipe ng-click="vm.selectedMenu=vm.copy(menu);showWindow()">
            <div class="panel  panel-card">
                <div class="panel-heading">
                    <img ng-src="img/{{::menu.image}}">
                </div>
                <div class="panel-body text-center">
                    <h4 class="panel-header">
                        <a>{{::menu.name}}</a></h4>
                    <b>{{::menu.price}} <span ng-if="menu.is_static==0">+</span> грн</b>
                    <div class="panel-thumbnails">
                        {{::menu.description}}
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
<script type="text/javascript" src="vendor/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $('li.dropdown.mega-dropdown a').on('click', function (event) {
        $(this).parent().toggleClass('open');
    });
    $('body').on('click', function (e) {
        if (!$('li.dropdown.mega-dropdown').is(e.target) && $('li.dropdown.mega-dropdown').has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
            $('li.dropdown.mega-dropdown').removeClass('open');
        }
    });
</script>
<script type="text/javascript" src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="vendor/angular/angular.js"></script>
<script type="text/javascript" src="vendor/angular-ui-router/release/angular-ui-router.js"></script>
<script type="text/javascript" src="vendor/angular-resource/angular-resource.js"></script>
<script type="text/javascript" src="vendor/angular-animate/angular-animate.js"></script>
<script type="text/javascript" src="vendor/angular-toastr/dist/angular-toastr.tpls.min.js"></script>
<script type="text/javascript" src="vendor/angular-strap/dist/angular-strap.min.js"></script>
<script type="text/javascript" src="vendor/angular-sanitize/angular-sanitize.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/MenuFactory.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/RestorauntFactory.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/UserFactory.js"></script>
<script type="text/javascript" src="js/modules/orders/factory/OrderFactory.js"></script>
<script type="text/javascript" src="js/modules/orders/controllers/OrderCtrl.js"></script>
<script type="text/javascript" src="js/modules/orders/directives/orderRecipe.js"></script>
<script type="text/javascript" src="js/modules/orders/directives/showAddress.js"></script>
<script type="text/javascript" src="js/modules/orders/directives/showDelivery.js"></script>
<script type="text/javascript" src="js/modules/orders/directives/acceptOrder.js"></script>
<script type="text/javascript" src="js/modules/orders/directives/showLoginForm.js"></script>


</body>
</html>
