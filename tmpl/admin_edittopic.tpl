<div class="col-9 mt-5">
    <div class="col-lg-12 bg-dark shadow">
        <h2 class="h5 text-white pt-2 pb-2"><?=$title?></h2>
    </div>
    <div class="col-12 mt-2 p-3 bg-white shadow">
        <h1 class="h2 text-center mt-3 mb-5">Управление разделом (ID: <?=$seller->id?>)</h1>
        <div class="col-7 center">
            <form name="edit_seller" method="post">
                <table>
                    <tr>
                        <td>Название</td>
                        <td><input type="text" class="w_auto" name="title" value="<?=$topic->title?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-12 bg-grey-dark shadow p-0 center mt-3">
                                <button type="submit" name="edit_topic" class="pointer h6 text-white pt-2 pb-2 bg-dark pt-2 pb-2 text-center">Сохранить</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
