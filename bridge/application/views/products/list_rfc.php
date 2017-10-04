

<?php $i = 1;?>
<?php foreach($search as $item):?>
    <a href="#" title="<?= $item->rfc . ' | ' . $item->name ?>" id="<?= $item->rfc . '|' . $item->name . '|' . $item->tel . '|' . $item->address ?>"><?= $item->rfc . ' | ' . $item->name ?></a><br>
    <?php $i++;?>
<?php endforeach;?>
