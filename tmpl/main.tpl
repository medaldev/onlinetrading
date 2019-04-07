<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/css/static.css">
    <link rel="stylesheet" href="/css/main.css">
    <link href="/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <title><?=$title?></title>
</head>
<body>
<?=$login_modal?>
<header>
    <div class="navbar navbar-dark">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <a href="/">

                    <p class="h3 text-white logo mt-3 ml-3">ПензаТоргСервис</p>
                </a>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <?=$system_menu?>
            </div>
        </div>
    </div>
    <div class="sub-header">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mt-4">
                    <form name="search" action="/search" method="get">
                        <table>
                            <tr>
                                <td>
                                    <input name="query" placeholder="поиск..." type="text" class="circled border-0 p-1" />
                                </td>
                                <td>
                                    <button class="bg-no search_img" type="submit"><img src="/images/search.png" class="sign " alt="" /></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <!--<a href="" class="text-white decorated fs-little">Расширенный поиск</a>-->
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 text-white">
                <div class="row mt-1">
                    <div class="col-7">
                        <div class="row p-1 mt-3">
                            <div class="col-2">
                                <img src="/images/user1_add.png" class="sign" alt="d" />
                            </div>
                            <div class="col-10">
                                <a href="/reg" class="text-white">Регистрация</a>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2">
                                <img src="/images/user1_add.png" class="sign" alt="d" />
                            </div>
                            <div class="col-10">
                                <p onclick="openWindow('login');" class="pointer" >Кабинет пользователя</p>
                            </div>
                        </div>


                    </div>
                    <div class="col-5 col-xs-12">
                        <a href="/cart" class="text-white">
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <img src="/images/cart.png" class="" alt="cart" />
                                </div>
                                <div class="col-6 p-0 mt-4">
                                    <p class="h5 decorated">Корзина</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="navbar-dark main_menu shadow">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="menu menu-dark">
                <ul>
                    <li>
                        <a href="#" class="active">Главная</a>
                    </li>
                    <li>
                        <a href="#">Оплата</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Сотрудничество</a>
                    </li>
                    <li>
                        <a href="#">Оплата</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Сотрудничество</a>
                    </li>
                    <li>
                        <a href="#">Оплата</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Сотрудничество</a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</header>
<?=$content?>
<footer class="mt-5">
    <div class="navbar-dark main_menu shadow">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="menu menu-dark">
                <ul>
                    <li>
                        <a href="#" class="active">Главная</a>
                    </li>
                    <li>
                        <a href="#">Оплата</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Сотрудничество</a>
                    </li>
                    <li>
                        <a href="#">Оплата</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Сотрудничество</a>
                    </li>
                    <li>
                        <a href="#">Оплата</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Сотрудничество</a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="sub-header">

    </div>
    <div class="navbar-dark main_menu shadow">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="text-white text-center pt-3">Copyright 2018. Все права защищены.</p>
        </div>
    </div>
</footer>
<script src="/js/functions.js"></script>
</body>
</html>