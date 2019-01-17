<div id="editmodal">
    <div class="window">
        <div class="row mb-1">
            <div class="col-10">
                <h4 class="h5">Вход в ЛК</h4>
            </div>
            <div class="col-2 text-right pr-0">
                <div class="pointer" onclick="closeWindow('editmodal')">X</div>
            </div>
        </div>
        <hr />
        <div class="col-12 mt-4">
            <div class="bold">
                <?php foreach ($fields as $field => $value) { ?>
                <div class="row">
                    <div class="col-2">
                        <p class="m-1"><?=$field?></p>
                    </div>
                    <div class="col-2">
                        <p class="m-1"><?=$value?></p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>