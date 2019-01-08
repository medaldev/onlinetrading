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
            <div class="row center">
                <div class="col-12 mt-4 bg-white p-4 shadow">
                    <div class="col-lg-12">
                        <h1 class="h3 text-center mb-5"><?=$product_title?></h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=$product_link?>">
                                <img src="/images/sections/1.jpg" alt="p" class="product_img"/>
                            </a>
                            <div class="col-12 bg-grey-dark shadow p-0">
                                <h2 class="h6 text-white pt-2 pb-2 bg-dark pt-2 pb-2 text-center">В корзину!</h2>

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <p class="bold text-center">Краткие характеристики</p>
                            <table class="product-properties mt-4 center">
                                <?php foreach ($shop_properties as $property => $value) { ?>
                                <tr>
                                    <td class="bold"><?=$property?>:</td>
                                    <td><?=$value?></td>
                                </tr>
                                <?php }?>

                            </table>
                        </div>
                    </div>
                    <div class="col-12 p-0 mt-4">
                        <p><?=$product_text?></p>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <p class="bold text-center">Полные характеристики</p>
                        <table class="product-properties mt-4 center">
                            <?php foreach ($seller_properties as $property => $value) { ?>
                            <tr>
                                <td class="bold"><?=$property?>:</td>
                                <td><?=$value?></td>
                            </tr>
                            <?php }?>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>