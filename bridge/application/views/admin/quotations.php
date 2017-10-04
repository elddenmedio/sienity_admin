
                        <div id="page-wrapper" class="quotation-wrapper">
				<div class="graphs">
					<div class="md">
						<h3 class="blank1 text-capitalize">{quotations}</h3>
						  <div class="row">
                                                      <?php foreach($files as $item => $value):?>
                                                      <div class="col-xs-3 col-sm-4 col-md-2 col-lg-2" id="s-folder">
                                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                            <label><?= substr_replace(substr_replace($value, "-", 4, 0), "-", 7, 0)?></label>
							</div>
                                                      <?php endforeach;?>
							<div class="clearfix"> </div>
						   </div>
					</div>
				</div>
			</div>

