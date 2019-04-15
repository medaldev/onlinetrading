<div class="container">
    <div class="row">
        <div class="col-3 mt-5 bg-grey-dark shadow p-0">
            <h2 class="h5 text-white pt-2 pb-2 bg-dark text-center bb-light">Категории</h2>
            <?php foreach ($categories as $category) { ?>
            <a href="<?=$category->sef?>">
                <div class="text-white pt-3 pb-3 pl-3 bb-light"><?=$category->title?></div>
            </a>
            <?php }?>
        </div>
        <div class="col-9 mt-5">
            <div class="col-lg-12 bg-dark shadow">
                <h2 class="h5 text-white pt-2 pb-2">Регистрация</h2>
            </div>
            <form action="/register" method="post" name="reg">
                <div class="row center">
                    <div class="col-12 mt-4 bg-white p-4 shadow">
                        <h1 class="h2 text-center mt-3 mb-3">Регистрация пользователя</h1>
                        <div class="text-center mb-3"><?=$_SESSION["reg_message"]?></div>
                        <div class="row mt-2">
                            <div class="col-1">
                                <p>Логин:</p>
                            </div>
                            <div class="col-4">
                                <input type="text" id="reg_login" name="login" class="circled"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1">
                                <p>Пароль:</p>
                            </div>
                            <div class="col-4">
                                <input type="password" id="reg_password" name="password" class="circled"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <p>Введите символы с картинки: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>
                                    <img src="/captcha" alt="captcha" class="pointer" id="captcha" onclick="document.getElementById('captcha').src = '/captcha'" />
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" id="captcha" name="captcha" class="circled"/>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="col-4 pr-1">
                                    <button class="col-12 bg-grey-dark shadow p-0" type="submit" name="filter">
                                        <p class="pointer h6 text-white pt-2 pb-2 bg-dark pb-2 text-center">Регистрация</p>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </form>

        </div>
    </div>
</div>