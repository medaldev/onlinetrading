<div class="col-9 mt-5">
    <div class="col-lg-12 bg-dark shadow">
        <h2 class="h5 text-white pt-2 pb-2"><?=$title?></h2>
    </div>
    <div class="col-12 mt-4 bg-white shadow">
        <div class="row bold">
            <div class="col-1">
                <p class="m-1">ID</p>
            </div>
            <div class="col-3">
                <p class="m-1">Название</p>
            </div>
            <div class="col-7">
                <p class="m-1">Описание</p>
            </div>
            <div class="col-1">
                <p class="m-1">Ред.</p>
            </div>
        </div>
    </div>
    <?php foreach ($sellers as $seller) { ?>
    <div class="col-12 mt-1 bg-white shadow p-1">
        <div class="row">
            <div class="col-1">
                <p class="m-1"><?=$seller->id?></p>
            </div>
            <div class="col-3">
                <p class="m-1"><?=$seller->title?></p>
            </div>

            <div class="col-7">
                <p class="m-1"><?=$seller->text?></p>
            </div>
            <div class="col-1 text-center">
                <a href="/editseller?id=<?=$seller->id?>">
                    <img src="/images/edit.png" alt="edit" class="sign_img pointer">
                </a>
            </div>
        </div>
    </div>
    <?php }?>
</div>
