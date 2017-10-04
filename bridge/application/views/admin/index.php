
<?php $this->load->helper('weather')?>

			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">
						<div class="clearfix"> </div>
					</div>
                                <!-- weather -->    
    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6 text-light text-right">{updated}: <small style=""><?php $upd = explode(' ', json_decode($phpObj)->query->results->channel->item->pubDate); echo $upd[4] . $upd[5]?></small></div>
        <div class="col-md-12" style="height: 20px;"></div>
        <div class="col-md-6 col-md-offset-3" style="position: absolute; border:1px solid #CCC;color: #ffffff; background-color: #0A2239; padding: 15px;">
            <div class="row">
                <div class="col-xs-6 col-md-6 text-center">
                    <?= json_decode($phpObj)->query->results->channel->location->country?>, <?= json_decode($phpObj)->query->results->channel->location->region?><br>
                    <img src="../../resources/images/weather/<?= get_img_type(json_decode($phpObj)->query->results->channel->item->condition->text)?>.png" width="50" alt="<?= json_decode($phpObj)->query->results->channel->item->condition->text?>" title="<?= json_decode($phpObj)->query->results->channel->item->condition->text?>">
                    <?= round (( (int) json_decode($phpObj)->query->results->channel->item->condition->temp - 32) / 1.8)?> °C
                </div>
                <div class="col-xs-6 col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../../resources/images/weather/sunrise.png" width="30" alt="sunrise" title="sunrise">
                            <?= json_decode($phpObj)->query->results->channel->astronomy->sunrise?>
                        </div>
                        <div class="col-md-6">
                            <img src="../../resources/images/weather/sunset.png" width="30" alt="sunset" title="sunset">
                            <?= json_decode($phpObj)->query->results->channel->astronomy->sunset?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 clearfix"><hr></div>
            <div class="col-md-12" style="font-size: 9px;">
                <?php $i= 0?>
                <?php foreach(json_decode($phpObj)->query->results->channel->item->forecast as $item):?>
                    <?php if( $i < 6):?>
                <div class="col-xs-2 col-md-2" style="padding: 10px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6" style="text-align: right; padding-right: 5px;">
                                            <?= change_day($item->day, $this->session->userdata('language'))?>
                                        </div>
                                        <div class="col-xs-6 col-md-6" style="text-align: left; padding-left: 5px;">
                                            <img src="../../resources/images/weather/<?= get_img_type($item->text)?>.png" width="15" alt="<?= $item->text?>" title="<?= $item->text?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 0;">
                                    <div class="row" style="padding: 0;">
                                        <div class="col-xs-6 col-md-6 text-right" style="text-align: right; padding-right: 5px;">
                                            <?= get_c_f($item->high, $this->session->userdata('language'))?>
                                        </div>
                                        <div class="col-xs-6 col-md-6 text-left" style="text-align: left; padding-left: 5px;">
                                            <?= get_c_f($item->low, $this->session->userdata('language'))?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php $i++?>
                <?php endforeach;?>
            </div>
        </div>
    </div>              <!--/weather -->        
    
    <div class="clearfix"></div>
    
    <div class="col-md-12" style="height: 200px;"></div>
    
    <!-- currency -->
    <div class="row">
        <div class="col-md-12" style="border:1px solid #CCC;color: #ffffff; background-color: #0A2239; padding: 15px;">
            <?= $currency?>
        </div>
    </div>
<?php
    //*********************************************
//    echo 'created -> ' . json_decode($phpObj)->query->created . '<br>';
//    echo 'lang -> ' . json_decode($phpObj)->query->lang . '<br>';
//    echo 'temperature -> ' . json_decode($phpObj)->query->results->channel->units->temperature . '<br>';
//    echo 'title -> ' . json_decode($phpObj)->query->results->channel->title . '<br>';
//    echo 'city -> ' . json_decode($phpObj)->query->results->channel->location->city . '<br>';
//    echo 'coutnry -> ' . json_decode($phpObj)->query->results->channel->location->country . '<br>';
//    echo 'region -> ' . json_decode($phpObj)->query->results->channel->location->region . '<br>';
//    echo 'sunrise -> ' . json_decode($phpObj)->query->results->channel->astronomy->sunrise . '<br>';
//    echo 'sunset -> ' . json_decode($phpObj)->query->results->channel->astronomy->sunset . '<br>';
//    echo 'pubDate -> ' . json_decode($phpObj)->query->results->channel->item->pubDate . '<br>';
//    echo 'temp -> ' . json_decode($phpObj)->query->results->channel->item->condition->temp . '<br>';//actual temperature
//    echo 'text -> ' . json_decode($phpObj)->query->results->channel->item->condition->text . '<br>';//type weather
//    
//    foreach(json_decode($phpObj)->query->results->channel->item->forecast as $item){
//        echo 'temp for day - ' . $item->date . '<br>';
//        echo $item->day . '<br>';
//        echo $item->high . '<br>';
//        echo $item->low . '<br>';
//        echo $item->text . '<br>';
//    }
    //*********************************************
?>
			<!-- switches -->
				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
