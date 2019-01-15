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
            <div class="row center">
                <div class="col-12 mt-4 bg-white p-4 shadow">
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
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="col-4 pr-1">
                                <div class="col-12 bg-grey-dark shadow p-0" onclick="reg()">
                                    <h2 class="pointer h6 text-white pt-2 pb-2 bg-dark pt-2 pb-2 text-center">
                                        Регистрация</h2>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>