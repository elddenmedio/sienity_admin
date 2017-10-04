
<div id="pag_content">
    <?php if( ! is_null($this->session->flashdata('update'))):?>
        <div class="alert alert-success" role="alert">
            <strong>{Well done!}</strong> <?= $this->session->flashdata('update')?>
       </div>
    <?php endif;?>

                        <?= $pagination?>
</div>
