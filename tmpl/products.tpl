<div class="row center">
    <?php foreach ($products as $product) { ?>
    <?php $in_order = in_array($product->id, $_SESSION['ordered_ids']);?>
    <?php $text_button = in_array($product->id, $_SESSION['ordered_ids']) ? 'В корзине' : 'В корзину!';?>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-4">
        <div class="block text-center product shadow">
            <a href="<?=$product->sef?>">
                <img src="/images/products/<?=$product->img?>" alt="p" class="products_img"/>
                <h3 class="h4 text-dark text-center mt-2"><?=$product->title?></h3>
                <p class="text-grey p-2 text_intro text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                <p class="h5 text-dark text-center mt-2"><?=$product->price?> Р</p>
            </a>
            <div class="col-12 bg-grey-dark shadow p-0" onclick="addProductInCart(<?=$product->id?>, this)">
                <h2 class="pointer h6 text-white pt-2 pb-2 bg-dark pt-2 mt-3 pb-2 text-center <?if ($in_order) echo 'button_clicked'?>"><?=$text_button?></h2>
            </div>
        </div>
    </div>
    <?php }?>

</div>