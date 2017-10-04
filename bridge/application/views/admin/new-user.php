
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1 text-capitalize">{insert} {user}</h3>
                                        <?php if( ! empty($this->session->flashdata('error')) || ! is_null($this->session->flashdata('error'))):?>
                                        <div style="width: 100%; height: 20px;"></div>
                                        <div class="alert alert-danger" role="alert">
							<strong>error!</strong> <?= $this->session->flashdata('error') ?>
						   </div>
                                        <?php endif;?>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form method="post" action="<?= base_url('index.php/insert_user')?>">
                    <div class="col-md-6">
                        <div class="form-group" id="f-project">
                            <label for="name" class="text-capitalize">{full_name} </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="" required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="f-email">
                            <label for="email" class="text-capitalize">{email}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" required="true">
                        </div>
                    </div>
                                                            <div class="col-md-6">
                        <div class="form-group" id="f-email">
                            <label for="password" class="text-capitalize">{password}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required="true">
                        </div>
                    </div>
                                                            <div class="col-md-6">
                        <div class="form-group" id="f-to">
                            <label for="level" class="text-capitalize">{level}</label>
                            <select id="level" name="level" class="form-control1" required="true">
                                <option></option>
                                <option value="120">{level_admin}</option>
                                <option value="2">{level_sales}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 e-height-10"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="{insert}" id="submit-quotation-b" class="btn btn-primary btn-lg btn-block text-capitalize">
                        </div>
                    </div>
                </form>
						</div>
					</div>
				</div>
			</div>
