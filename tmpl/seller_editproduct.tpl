<div class="col-9 mt-5">
    <div class="col-lg-12 bg-dark shadow">
        <h2 class="h5 text-white pt-2 pb-2"><?=$title?></h2>
    </div>
    <div class="col-12 mt-2 p-3 bg-white shadow">
        <h1 class="h2 text-center mt-3 mb-5">Управление товаром (ID: <?=$product->id?>)</h1>
        <div class="col-7 center">
            <form name="edit_product" action="" method="post">
                <table>
                    <tr>
                        <td>Название</td>
                        <td><input type="text" class="w_auto" name="product_name" value="<?=$product->title?>" /></td>
                    </tr>
                    <tr>
                        <td>Изображение</td>
                        <td><input type="text" class="w_auto" name="product_img" value="<?=$product->img?>" /></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><input type="text" class="w_auto" name="product_price" value="<?=$product->price?>" /></td>
                    </tr>
                    <tr>
                        <td>Категория</td>
                        <td><input type="text" class="w_auto" name="product_category_id" value="<?=$product->category_id?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">Описание</td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea name="text" cols="10" rows="10"><?=$product->text?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-12 bg-grey-dark shadow p-0 center">
                                <button type="submit" name="edit_product" class="pointer h6 text-white pt-2 pb-2 bg-dark pt-2 pb-2 text-center">Сохранить</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>
