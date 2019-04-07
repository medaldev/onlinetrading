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
                <h2 class="h5 text-white pt-2 pb-2"><?=$category_title?></h2>
            </div>
            <div class="text-center mt-4 mb-1">
                <span class="decorated m-1 bold pointer">Фильтровать</a></span>
                <span class="decorated m-1 bold pointer" onclick="cat_order_products('price')">Сортировка (цена)</span>
            </div>
            <?=$products?>
            <div class="text-center mt-4 mb-1 m-1 pointer">
                <a href="#" class="text-dark bold m-1 decorated">&lt;</a>
                <a href="#" class="text-dark bold m-1 decorated">1</a>
                <a href="#" class="text-dark bold m-1 decorated">2</a>
                <a href="#" class="text-dark bold m-1 decorated">3</a>
                <a href="#" class="text-dark bold m-1 decorated">&gt;</a>
            </div>
        </div>
    </div>
</div>