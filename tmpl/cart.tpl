<div class="container">
    <div class="row">
        <div class="col-3 mt-5 bg-grey-dark shadow p-0">
            <h2 class="h5 text-white pt-2 pb-2 bg-dark text-center bb-light">Разделы</h2>
            <?php foreach ($sections as $section) { ?>
            <a href="<?=$section->sef?>">
                <div class="text-white pt-3 pb-3 pl-3 bb-light"><?=$section->title?></div>
            </a>
            <?php }?>
        </div>
        <div class="col-9 mt-5">
            <div class="col-lg-12 bg-dark shadow">
                <h2 class="h5 text-white pt-2 pb-2">Товары в корзине</h2>
            </div>

            <div class="col-12 mt-4 bg-white shadow">
                <div class="row bold">
                    <div class="col-1">
                        <p class="m-1">ID</p>
                    </div>
                    <div class="col-3">
                        <p class="m-1">Стоимость</p>
                    </div>
                    <div class="col-4">
                        <p class="m-1">Название товара</p>
                    </div>
                    <div class="col-2">
                        <p class="m-1">Кол-во</p>
                    </div>
                    <div class="col-2">
                        <p class="m-1">Удалить</p>
                    </div>
                </div>
            </div>
            <?php foreach ($products as $product) { ?>
            <div class="col-12 mt-1 bg-white shadow">
                <div class="row">
                    <div class="col-1">
                        <p class="m-1"><?=$product->id?></p>
                    </div>
                    <div class="col-3">
                        <p class="m-1"><?=$product->price?></p>
                    </div>
                    <div class="col-4">
                        <p class="m-1"><?=$product->title?></p>
                    </div>
                    <div class="col-2">
                        <p class="m-1"><input type="number" name="count" value="1" min="1"></p>
                    </div>
                    <div class="col-2">
                        <p class="m-1 dec pointer" onclick="cancelorder(<?=$product->id?>, this)">Удалить</p>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="col-12 mt-2 bg-white shadow">
                <p class="text-center">Всего товаров <b id="count_products"><?=$count_products?></b> на сумму <b id="price_products"><?=$sum_products?></b> рублей.</p>
            </div>
        </div>
    </div>
</div>