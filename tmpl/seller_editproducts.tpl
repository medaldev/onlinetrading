<div class="col-9 mt-5">
    <div class="col-lg-12 bg-dark shadow">
        <h2 class="h5 text-white pt-2 pb-2"><?=$title?></h2>
    </div>
    <div class="col-12 mt-4 bg-white shadow">
        <div class="row bold">
            <div class="col-2">
                <p class="m-1">Название</p>
            </div>
            <div class="col-2">
                <p class="m-1">Изображение</p>
            </div>
            <div class="col-1">
                <p class="m-1">Цена</p>
            </div>
            <div class="col-2">
                <p class="m-1">Категория</p>
            </div>
            <div class="col-3">
                <p class="m-1">Описание</p>
            </div>
            <div class="col-1">
                <p class="m-1">Ред.</p>
            </div>
            <div class="col-1">
                <p class="m-1">Удалить</p>
            </div>
        </div>
    </div>
    <?php foreach ($products as $product) { ?>
    <div class="col-12 mt-1 bg-white shadow p-1">
        <div class="row">
            <div class="col-2">
                <p class="m-1"><?=$product->title?></p>
            </div>
            <div class="col-2">
                <p class="m-1"><?=$product->img?></p>
            </div>
            <div class="col-1">
                <p class="m-1"><?=$product->price?></p>
            </div>
            <div class="col-2">
                <p class="m-1"><?=$product->cetegory_id?></p>
            </div>
            <div class="col-3">
                <p class="m-1"><?=$product->text?></p>
            </div>
            <div class="col-1 text-center">
                <a href="/editproduct?id=<?=$product->id?>">
                    <img src="/images/edit.png" alt="edit" class="sign_img pointer">
                </a>

            </div>
            <div class="col-1 text-center">
                <img src="/images/delete.png" alt="edit" class="sign_img pointer">
            </div>
        </div>
    </div>
    <?php }?>
</div>
