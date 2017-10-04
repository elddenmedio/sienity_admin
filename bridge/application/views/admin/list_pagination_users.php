
<div id="page-wrapper">
				<div class="graphs">
					<div class="md">
						<h3 class="blank1">{users}</h3>
                                                <?php if( ! empty($this->session->flashdata('success')) || ! is_null($this->session->flashdata('success'))):?>
                                        <div style="width: 100%; height: 20px;"></div>
                                        <div class="alert alert-success" role="alert">
							<strong>success!</strong> <?= $this->session->flashdata('success') ?>
						   </div>
                                        <?php endif;?>
						  <div class="row">
                                                      <div class="table-responsive">
						  
								<?= $table_pagination ?>
							</div>
						</div>
							<div class="clearfix"> </div>
					</div>
				</div>
			</div>

<?php for($i = 0; $i < count($modal); $i++):?>
<!-- Modal <?= $modal[$i]['id']?> -->
<div class="modal fade" id="updateModal<?= $modal[$i]['id']?>" role="dialog" style="left: 15%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{update} {user}: <?= $modal[$i]['name']?></h4>
        </div>
        <div class="modal-body">
            <form id="form-<?= $modal[$i]['id']?>" action="update_users" method="post">
                <div style="display: none">
                    <input type="hidden" name="id" id="id" value="<?= $modal[$i]['id']?>">
                </div>
                <div class="form-group" id="f-name">
                    <label for="name">{name}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="<?= strip_tags($modal[$i]['name'])?>" value="<?= strip_tags($modal[$i]['name'])?>" required="true">
                </div>
                <div class="form-group" id="f-email">
                    <label for="email">{email}</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?= strip_tags($modal[$i]['email'])?>" value="<?= strip_tags($modal[$i]['email'])?>" required="true">
                </div>
                <div class="form-group">
                    <div style="width: 100%; height: 20px;"></div>
                </div>
                <div class="form-group">
                    <input type="submit" value="{update}" id="submit-quotation-b" class="btn btn-primary btn-lg btn-block">
                </div>
            </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php endfor;?>
