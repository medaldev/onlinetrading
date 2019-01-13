
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
                <p class="m-1">Товар</p>
            </div>
            <div class="col-4">
                <p class="m-1">Кол-во</p>
            </div>
            <div class="col-2">
                <p class="m-1">Дата</p>
            </div>
            <div class="col-2">
                <p class="m-1">Статус</p>
            </div>
        </div>
    </div>
    <?php foreach ($orders as $order) { ?>
    <div class="col-12 mt-1 bg-white shadow">
        <div class="row">
            <div class="col-1">
                <p class="m-1"><?=$order->id?></p>
            </div>
            <div class="col-3">
                <p class="m-1"><a href="<?=$order->link?>" class="text-dark decorated"><?=$order->title?></a></p>
            </div>
            <div class="col-4">
                <p class="m-1"><?=$order->count?></p>
            </div>
            <div class="col-2">
                <p class="m-1"><?=$order->date?></p>
            </div>
            <div class="col-2">
                <p class="m-1"><?=$order->status?></p>
            </div>
        </div>
    </div>
    <?php }?>
</div>
