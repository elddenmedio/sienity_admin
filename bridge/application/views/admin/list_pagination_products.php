
<div id="page-wrapper">
				<div class="graphs">
					<div class="md">
						<h3 class="blank1">{products}</h3>
						  <div class="row">
                                                      <div class="table-responsive">
						  <?= $table_pagination ?>
						</div>
							<div class="clearfix"> </div>
						   </div>
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
            <button type="button" class="close" data-dismiss="modal" style="color: red;">&times;</button>
          <h4 class="modal-title">{update} {product} <?= $modal[$i]['name']?></h4>
        </div>
        <div class="modal-body">
            <form id="form-<?= $modal[$i]['id']?>" action="update_product" method="post">
                <div style="display: none">
                    <input type="hidden" name="id" id="id" value="<?= $modal[$i]['id']?>">
                </div>
                <div class="form-group" id="f-sku">
                    <div class="col-xs-6">
                        <label for="sku" class="text-capitalize">{sku}</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="<?= strip_tags($modal[$i]['sku'])?>" value="<?= strip_tags($modal[$i]['sku'])?>" required="true">
                    </div>
                </div>
                <div class="form-group" id="f-name">
                    <div class="col-xs-6">
                        <label for="name" class="text-capitalize">{name}</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?= strip_tags($modal[$i]['name'])?>" value="<?= strip_tags($modal[$i]['name'])?>" required="true">
                    </div>
                </div>
                <div class="form-group" id="f-picture">
                    <div class="col-md-6">
                        <label for="picture" class="text-capitalize">{picture}</label>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div style="width: 150px;">
                                    <?= $modal[$i]['img']?>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="custom-file">
                                                <input type="file" id="userfile" name="userfile" class="custom-file-input">
                                                <span class="custom-file-control"></span>
                                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="f-description">
                    <div class="col-xs-6">
                        <label for="description" class="text-capitalize">{description}</label>
                    </div>
                    <div class="col-xs-6">
                        <textarea class="form-control" id="description" name="description" rows="3"><?= strip_tags($modal[$i]['description'])?></textarea>
                    </div>
                </div>
                <div class="form-group" id="f-stock">
                    <div class="col-xs-6">
                        <label for="stock" class="text-capitalize">{stock}</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="<?= strip_tags($modal[$i]['stock'])?>" value="<?= strip_tags($modal[$i]['stock'])?>" required="true" onkeypress="validate(event)">
                    </div>
                </div>
                <div class="form-group" id="f-price">
                    <div class="col-xs-6">
                        <label for="price" class="text-capitalize">{price}</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="price" name="price" placeholder="<?= floatval(preg_replace('/[^\d.]/', '', strip_tags($modal[$i]['price'])))?>" value="<?= floatval(preg_replace('/[^\d.]/', '', strip_tags($modal[$i]['price'])))?>" required="true" onkeypress="validate(event)">
                    </div>
                </div>
                <div class="form-group">
                    <div style="width: 100%; height: 20px;"></div>
                </div>
                <div class="form-group">
                    <input type="submit" value="{update}" id="submit-quotation-b" class="btn btn-primary btn-lg btn-block">
                </div>
            </form> 
        </div>
      </div>
      
    </div>
  </div>
<?php endfor;?>
