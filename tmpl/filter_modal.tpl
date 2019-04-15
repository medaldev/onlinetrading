<div id="filter_cat_products">
    <div class="window">
        <div class="row mb-1">
            <div class="col-10">
                <h4 class="h5">Фильтровать товары</h4>
            </div>
            <div class="col-2 text-right pr-0">
                <div class="pointer" onclick="closeWindow('filter_cat_products')">X</div>
            </div>
        </div>
        <hr />
        <form class="form-modal" name="auth" method="post" action="">
            <table>
                <?php foreach ($fields as $field) { ?>

                        <tr>
                            <td>
                                <input type="text" name="filter_<?=$field->id?>" placeholder="<?=$field->attr?>"/>
                            </td>
                        </tr>

                <?php }?>


                <tr>
                    <td colspan="2">
                        <button class="col-12 bg-grey-dark shadow p-0" type="submit" name="filter">
                            <p class="pointer h6 text-white pt-2 pb-2 bg-dark pb-2 text-center">Фильтровать</p>
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>