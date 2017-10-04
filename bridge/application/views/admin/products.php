

<div id="pag_content">
    <?php if( ! is_null($this->session->flashdata('update'))):?>
        <div class="alert alert-success" role="alert">
            <strong>{Well done!}</strong> <?= $this->session->flashdata('update')?>
       </div>
    <?php endif;?>

                        <?= ( empty($pagination)) ? 'Por el momento no tiene ningun producto dado de alta' : $pagination?>
</div>
