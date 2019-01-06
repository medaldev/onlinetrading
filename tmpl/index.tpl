<div class="container">
    <div class="col-12">
        <h1 class="h2 text-center mt-5 mb-5">Главные разделы</h1>
    </div>
</div>
<?php foreach ($topics as $topic) { ?>
<div class="container">
    <div class="col-lg-12 bg-grey-dark shadow">
        <h2 class="h5 mt-5 text-white pt-2 pb-2"><?=$topic->title?></h2>
    </div>
</div>
<div class="container">
    <div class="row center">
        <?php foreach ($topic->sections as $section) { ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-4">
            <div class="block section shadow">
                <a href="/<?=$section->sef?>">
                    <img src="/images/sections/1.jpg" alt="p" class="sections_img"/>
                    <h3 class="h3 text-dark text-center mt-3"><?=$section->title?></h3>
                    <p class="text-grey p-4"><?=$section->text?></p>
                    <p class="text-right h2 pr-3 pb-1">&gt;</p>
                </a>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }?>