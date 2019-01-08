<div class="menu menu-dark mt-1">
    <ul class="fl-r">
        <?php foreach ($items as $item) { ?>
        <li>
            <a href="<?=$item->link?>" class="active"><?=$item->title?></a>
        </li>
        <?php }?>
    </ul>
</div>