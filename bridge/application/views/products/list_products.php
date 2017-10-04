

<?php $i = 1;?>
<?php foreach($search as $item):?>
    <a href="#" title="<?= $item->sku . ' | ' . $item->name ?>" id="<?= $item->sku . '|' . $item->name . '|' . $item->stock . '|' . $item->price ?>"><?= $item->sku . ' | ' . $item->name ?></a><br>
    <?php $i++;?>
<?php endforeach;?>
