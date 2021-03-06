<div class="container">
    <div class="row m-0">
        <div class="col-lg-3 mt-5 bg-grey-dark shadow p-0">
            <h2 class="h5 text-white pt-2 pb-2 bg-dark text-center bb-light">Разделы</h2>
            <?php foreach ($sections as $section) { ?>
            <a href="<?=$section->sef?>">
                <div class="text-white pt-3 pb-3 pl-3 bb-light"><?=$section->title?></div>
            </a>
            <?php }?>
        </div>
        <div class="col-9 mt-5">
            <div class="col-lg-12 bg-dark shadow">
                <h2 class="h5 text-white pt-2 pb-2"><?=$seller->title?></h2>
            </div>
            <div class="col-12 p-3 mt-2 bg-white shadow">
                <h1 class="h2 text-center mt-3 mb-5">Страница торговой организации</h1>
                <h2 class="h4 text-left mt-2 mb-3"><?=$seller->name?></h2>
                <p class="mb-5"><?=$seller->text?></p>
            </div>
            <?=$products?>
        </div>

    </div>
</div>