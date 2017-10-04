
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1 text-capitalize">{make} {quotation}</h3>
                                        <?php if( ! is_null($this->session->flashdata('new_quotation'))):?>
                                            <div class="alert alert-success" role="alert">
							<strong>Well done!</strong> <?= $this->session->flashdata('new_quotation')?>.
						   </div>
                                        <?php endif;?>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form method="post" action="<?= base_url('index.php/get_quotation')?>" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-project">
                            <label for="exampleInputEmail1" class="text-capitalize">{project}</label>
                            <input type="text" class="form-control" id="project" name="project" placeholder="">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-to">
                            <label for="exampleInputEmail1" class="text-capitalize">{to}</label>
                            <input type="text" class="form-control" id="to" name="to" placeholder="">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-email">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-rfc">
                            <label for="exampleInputEmail1">RFC</label>
                            <input type="text" class="form-control" id="rfc_rfc" name="rfc" placeholder="">
                            <div class="contenedor" id="content-rfc" style="display: none;"></div>
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-rfc-name">
                            <label for="exampleInputEmail1" class="text-capitalize">{name}</label>
                            <input type="text" class="form-control" id="rfc_name" name="rfc_name" placeholder="">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-rfc-tel">
                            <label for="exampleInputEmail1" class="text-capitalize">{phone}</label>
                            <input type="tel" class="form-control" id="rfc_tel" name="rfc_tel" placeholder="" onkeypress="validate(event)" maxlength="10">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-rfc-address">
                            <label for="exampleInputEmail1" class="text-capitalize">{address}</label>
                            <input type="text" class="form-control" id="rfc_address" name="rfc_address" placeholder="">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-delivery">
                            <label for="exampleInputEmail1" class="text-capitalize">{delivery_time}</label>
                            <small id="emailHelp" class="form-text text-muted">3-5[space]dias / 1-2[space]semanas / ...</small>
                            <input type="text" class="form-control" id="delivery" name="delivery" placeholder="3-5 dias">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-6">
                        <div class="form-group quotation-input" id="f-cost">
                            <label for="exampleInputEmail1" class="text-capitalize">{shipping_cost}</label>
                            <input type="text" class="form-control" id="shipping" name="shipping" placeholder="">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-12">
                        <div class="e-products">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group quotation-input" id="f-sku">
                                        <label for="exampleInputEmail1">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku[]" placeholder="" required="true">
                                        <div class="contenedor" id="content-sku" style="display: none;"></div>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-6" id="form-stock">
                                    <div class="form-group quotation-input" id="f-stock">
                                        <label for="exampleInputEmail1"class="text-capitalize">{stock}</label>
                                        <small id="emailHelp" class="form-text text-muted">global product stock.</small>
                                        <input type="text" class="form-control" id="stock" name="stock[]" placeholder="" required="true" onkeypress="validate(event)">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-3" id="form-price">
                                    <div class="form-group quotation-input" id="f-price">
                                        <label for="exampleInputEmail1" class="text-capitalize">{price}</label>
                                        <input type="text" class="form-control" id="price" name="price[]" placeholder="" required="true" onkeypress="validate(event)">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-3" id="form-price">
                                    <div class="form-group quotation-input" id="f-discount">
                                        <label for="exampleInputEmail1" class="text-capitalize">{discount}</label>
                                        <div class="input-group mb-2 mb-sm-0">
                                            <input type="text" class="form-control" id="discount" name="discount[]" placeholder="" onkeypress="validate(event)" maxlength="3">
                                            <div class="input-group-addon">%</div>
                                        </div>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-3" id="form-qty">
                                    <div class="form-group quotation-input" id="f-qty">
                                        <label for="exampleInputEmail1" class="text-capitalize  ">{qty}</label>
                                        <small id="emailHelp" class="form-text text-muted">{qty} {purchase}.</small>
                                        <input type="text" class="form-control" id="qty" name="qty[]" placeholder="" required="true" onkeypress="validate(event)">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12" id="form-name" style="display: none;">
                                    <div class="form-group quotation-input" id="f-name">
                                        <label for="exampleInputEmail1" class="text-capitalize">{product} {name}</label>
                                        <input type="text" class="form-control" id="name" name="name[]" placeholder="">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12" id="form-description" style="display: none;">
                                    <div class="form-group quotation-input" id="f-description">
                                        <label for="exampleInputEmail1" class="text-capitalize">{description}</label>
                                        <textarea class="form-control" id="description" name="description[]" rows="3"></textarea>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12" id="form-userfile" style="display: none;">
                                    <div class="form-group quotation-input" id="f-userfile">
                                        <label for="exampleInputEmail1" class="text-capitalize">{picture}</label>
                                        <label class="custom-file">
                                            <input type="file" id="userfile" name="userfile[]" class="custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12 e-height-10"></div>
                                <div id="add-product" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 e-height-10"></div>
                    <div class="col-md-12">
                    	<div class="form-group quotation-input">
                    		<button type="button" class="btn btn-success text-capitalize" id="add_product_"><span class="glyphicon glyphicon-plus-sign"></span> {add} {product}</button>
                    	</div>
                    </div>
                    <div class="col-md-12 e-height-10"></div>
                    <div class="col-md-12">
                        <div class="form-group quotation-input">
                            <input type="submit" value="{quotation}" id="submit-quotation-b" class="btn btn-primary btn-lg btn-block text-capitalize">
                        </div>
                    </div>
                </form>
                                                    <div class="col-md-12 e-height-10"></div>
                                                    <div class="col-md-12 e-height-10"></div>
                                                    <div class="col-md-12 e-height-10"></div>
						</div>
					</div>
				</div>
			</div>
