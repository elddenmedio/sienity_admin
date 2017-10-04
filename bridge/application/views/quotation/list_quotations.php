
				<div class="graphs">
					<div class="md">
						<h3 class="blank1 text-capitalize">Cotizaciones de la carpeta <?= $day?></h3>
						  <div class="row">
                                                      <?php foreach($search as $item => $value):?>
                                                      <div class="col-xs-3 col-sm-4 col-md-2 col-lg-2" id="s-file" title="<?= $value?>" style="height: 50px; overflow-y: hidden;">
                                                          <a href="<?= base_url() . 'resources/files/quotations/' . str_replace('-', '', trim($day)) . '/' . $value ?>" target="_blank">
                                                              <i class="fa fa-file-pdf-o" id="pdf" aria-hidden="true"></i>
                                                            <label><?= $value?></label>
                                                          </a>
							</div>
                                                      <?php endforeach;?>
							<div class="clearfix"> </div>
						   </div>
					</div>
				</div>

