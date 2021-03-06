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
            <div class="col-2">
                <p class="m-1">Раздел</p>
            </div>
            <div class="col-5">
                <p class="m-1">Описание</p>
            </div>
            <div class="col-1">
                <p class="m-1">Ред.</p>
            </div>
        </div>
    </div>
    <?php foreach ($categories as $category) { ?>
    <div class="col-12 mt-1 bg-white shadow p-1">
        <div class="row">
            <div class="col-1">
                <p class="m-1"><?=$category->id?></p>
            </div>
            <div class="col-3">
                <p class="m-1"><?=$category->title?></p>
            </div>
            <div class="col-2">
                <p class="m-1"><?=$category->section_id?></p>
            </div>
            <div class="col-5">
                <p class="m-1"><?=$category->text?></p>
            </div>
            <div class="col-1 text-center">
                <a href="/editcategory?id=<?=$category->id?>">
                    <img src="/images/edit.png" alt="edit" class="sign_img pointer">
                </a>
            </div>
        </div>
    </div>
    <?php }?>
</div>
