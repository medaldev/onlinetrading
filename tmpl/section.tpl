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
                <h2 class="h5 text-white pt-2 pb-2"><?=$section_title?></h2>
            </div>
            <div class="text-center mt-4 mb-1">
                <span class="decorated m-1 bold pointer">Фильтровать</span>
                <span class="decorated m-1 bold pointer">Сортировка</span>
            </div>
            <div class="row center">
                <?php foreach ($products as $product) { ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-4">
                    <div class="block product shadow">
                        <a href="<?=$product->sef?>">
                            <img src="/images/sections/1.jpg" alt="p" class="sections_img"/>
                            <h3 class="h4 text-dark text-center mt-2"><?=$product->title?></h3>
                            <p class="text-grey p-2 text_intro text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                        </a>
                        <div class="col-12 bg-grey-dark shadow p-0">
                            <h2 class="h6 text-white pt-2 pb-2 bg-dark pt-2 mt-3 pb-2 text-center">В корзину!</h2>

                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
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