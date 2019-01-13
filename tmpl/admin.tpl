<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/css/static.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" sizes="32x32" type="image/png" href="http://onlinetrading/favicon.png">
    <title><?=$title?></title>
</head>
<body>
<header>
    <div class="navbar navbar-dark">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <p class="h3 text-white logo mt-3 ml-3">ПензаТоргСервис</p>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="fl-r w_auto">
                    <div class="p-1">
                        <div class="col-12">
                            <p class="text-white">Администратор: <span class="bold"><?=$user_login?></span></p>
                            <a href="/logout" class="text-white decorated">Выход</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>
<div class="container">
    <div class="row">
        <div class="col-3 mt-5 bg-grey-dark shadow p-0">
            <h2 class="h5 text-white pt-2 pb-2 bg-dark text-center bb-light">Меню администратора</h2>
            <?php foreach ($user_menu as $section) { ?>
            <a href="<?=$section->link?>">
                <div class="text-white pt-3 pb-3 pl-3 bb-light"><?=$section->title?></div>
            </a>
            <?php }?>
        </div>
        <?=$content?>
    </div>
</div>
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