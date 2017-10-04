<?php $count = count($products)?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Quotation</title>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100% !important; text-align: left; font-size: 12px;}
  img {height: auto;}
  .content {width: 750px;; max-width: 750px;}
  .header {padding: 0;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 15px; color: rgb(255,255,255); font-family: sans-serif; letter-spacing: 10px;}
  .h1, .h2, .bodycopy {color: rgb(66,66,66); font-family: sans-serif;}
  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: rgb(255,255,255); text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: sans-serif; font-size: 14px; color: rgb(255,255,255);}
  .footercopy a {color: rgb(255,255,255); text-decoration: underline;}
  img.fix{height: 70px; width: 100% !important;}
  table th, b{font-size: 10px !important; font-weight: 600 !important;}
  @font-face {font-family:"WeblySleek UI Bold";src:url("../../resources/fonts/weblysleekuil.ttf") format("truetype");font-weight:bold;font-style:bold;}
  @font-face {font-family:"WeblySleek UI Light";src:url("../../resources/fonts/weblysleekuil.eot?") format("eot"),url("../../resources/fonts/weblysleekuil.woff") format("woff"),url("../../resources/fonts/weblysleekuil.ttf") format("truetype"),url("../../resources/fonts/weblysleekuil.svg#WeblySleekUILight") format("svg");font-weight:normal;font-style:normal;}
  body, html, table{font-size: 9px !important; font-weight: 300; font-family:"WeblySleek UI Light"}
  b{font-size: 10px !important; font-weight: 600 !important; font-family:"WeblySleek UI Bold"}
  
  table tr, table tr th, table tr td{text-align: left;}
  
  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }

  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
    .col425 {width: 425px!important;}
    .col380 {width: 380px!important;}
    }*/

  </style>
</head>

<body yahoo bgcolor="#ffffff">
	<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table width="100%" bgcolor="rgb(255,255,255)" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<table width="100%" bgcolor="rgb(255,255,255)" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<img class="fix" src="resources/images/pdf_header.png" height="70" border="0" alt="logo" style="width: 700px !important;" />
									</td>
								</tr>
								<tr bgcolor="rgb(244,246,246)">
									<td bgcolor="rgb(244,246,246)">
                                                                            <table width="100%" bgcolor="rgb(244,246,246)" border="0" cellspacing="0" cellpadding="0" style="padding: 10px 0;">
											<tr>
                                                                                            <th colspan="2" style="width: 18%;"><p style="margin: 0 !important; padding: 0; margin-top: 10px; margin-bottom: -15px;"><b>SID PROYECTO:</b></p></th>
                                                                                            <td colspan="2" style="width: 24%;"><b><?= strtoupper(utf8_encode($project)) ?></b></td>
												<td style="width: 2%;"></td>
                                                                                                <th style="width: 56%;"><b><?= strtoupper(utf8_encode($rfc_name)) ?></b></th>
											</tr>
											<tr>
                                                                                            <?php setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish'); ?>
                                                                                            <th style="width: 5%;"><b>No.</b></th>
												<td style="width: 15%;"><?= $unique?></td>
                                                                                                <th style="width: 5%;"><b>Fecha</b></th>
												<td style="width: 17%;"><?= date("d/m/Y")//iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B del %Y", strtotime(date("Y-m-d"))));//date("F j, Y")?></td>
                                                                                                <td style="width: 2%;"></td>
                                                                                                <td rowspan="2" style="width: 65%;"><?= strtoupper(utf8_encode($rfc_address)) ?></td>
											</tr>
											<tr>
                                                                                            <th><b>Para:</b></th>
												<td colspan="3"><?= strtoupper(utf8_encode($to))?></td>
												<td></td>
											</tr>
											<tr>
                                                                                            <th><b>Por:</b></th>
                                                                                            <td colspan="3" style="color: #000000 !important;"><?= strtoupper(utf8_encode($user))?> | Asesor Tecnol&oacute;gico Empresarial.</td>
												<td></td>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
                                                                                                                    <th><b>RFC</b></th>
															<td><?= strtoupper(utf8_encode($rfc)) ?></td>
                                                                                                                        <th><b>TEL</b></th>
															<td><?= '(' . $tel[1] . ') ' . $tel[2] . ' - ' . $tel[3];?></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="footer" bgcolor="rgb(50,50,50)">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color: rgb(255,255,255) !important;">
											<tr>
												<td width="23.3">Cant</td>
												<td width="43.3">Producto</td>
												<td width="140">Descripci&oacute;n</td>
												<td width="63.3">P/Unitario</td>
												<td width="63.3">Total (MXN)</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<?php for($i = 0; $i < $count; $i++):?>
                                                                                                <tr bgcolor="rgb(<?= ( $i%2 === 0) ? '255,255,255' : '242,242,242' ?>)" style="padding: 5px 0;">
													<td width="23.3">&nbsp;&nbsp;<?= $products[$i]['qty']?></td>
                                                                                                        <td width="43.3"><img class="" src="resources/products/<?= $products[$i]['img']?>" border="0" alt="<?= $products[$i]['img']?>" width="100%" /></td>
													<td width="140">
                                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            	<tr>
                                                                                                            		<td colspan="2"><?= utf8_encode($products[$i]['name'])?></td>
                                                                                                            	</tr>
                                                                                                            	<tr>
                                                                                                            		<td colspan="2"><?= utf8_encode($products[$i]['description'])?></td>
                                                                                                            	</tr>
                                                                                                            	<tr>
                                                                                                            		<td style="text-align: left">
                                                                                                            			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            				<tr>
                                                                                                            					<td>SKU</td>
                                                                                                            					<td><?= utf8_encode($products[$i]['sku'])?></td>
                                                                                                            				</tr>
                                                                                                            			</table>
                                                                                                            		</td>
                                                                                                            		<td style="text-alin: right">
                                                                                                            			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            				<tr>
                                                                                                            					<td>STOCK</td>
                                                                                                            					<td><?= $products[$i]['stock']?> Pzs.</td>
                                                                                                            				</tr>
                                                                                                            			</table>
                                                                                                            		</td>
                                                                                                            	</tr>
                                                                                                            </table>
                                                                                                        </td>
													<td width="63.3">
                                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                <tr>
                                                                                                                    <td style="text-align: right;"><p style="font-size: 9px; margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format((int) $products[$i]['price'], 2)?></p></td>
                                                                                                                </tr>
                                                                                                                <?php if( $products[$i]['discount'] > 0): ?>
                                                                                                                    <tr>
                                                                                                                        <td bgcolor="rgb(255,195,0)" style="color: rgb(255,255,255); text-align: right;"><p style="font-size: 10px; margin: 0 !important; padding: 0 10px 0 0;"><b>- <?= $products[$i]['discount']?> %</b></p></td>
                                                                                                                    </tr>
                                                                                                                <?php endif;?>
                                                                                                            </table>
                                                                                                        </td>
													<td width="63.3">
                                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                <tr>
                                                                                                                    <td style="text-align: right;"><p style="font-size: 9px; margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format(((int) $products[$i]['qty'] * (int) $products[$i]['price']), 2) ?></p></td>
                                                                                                                </tr>
                                                                                                                <?php if( $products[$i]['discount'] > 0): ?>
                                                                                                                    <tr>
                                                                                                                    	<?php $_discount = ((int) $products[$i]['qty'] * (int) $products[$i]['price']) - ((int) $products[$i]['qty'] * (int) $products[$i]['price']) * ((100 - (int) $products[$i]['discount']) * 0.01);?>
                                                                                                                        <td bgcolor="rgb(255,195,0)" style="text-align: right; color: rgb(255,255,255);"><p style="font-size: 10px; margin: 0 !important; padding: 0 10px 0 0;"><b>- $</b> <?= number_format($_discount, 2) ?></p></td>
                                                                                                                    </tr>
                                                                                                                <?php endif;?>
                                                                                                                <?php $arr_sub[$i] = ( $products[$i]['discount'] > 0) ? $_discount : (int) $products[$i]['price'];?>
                                                                                                            </table>
                                                                                                        </td>
												</tr>
											<?php endfor;?>
										</table>
									</td>
								</tr>
								<tr><td height="20"></td></tr>
								<tr>
									<td class="footer" bgcolor="rgb(50,50,50)">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td height="10"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr><td height="20"></td></tr>
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="30"></td>
                                                                                                <th width="380"><b>Condiciones Comerciales</b></th>
                                                                                                <th><p style="margin: 0 !important; padding: 0 0 0 10px;"><b>Total Bruto</b></p></th>
												<?php 
                                                                                                    $sub = $desc = $_int = $desc_o = 0;
                                                                                                    for($i = 0; $i < $count; $i++):
                                                                                                        $sub = $sub + ((int) $products[$i]['qty'] * (int) $products[$i]['price']);
                                                                                                        
                                                                                                        if( $products[$i]['discount'] > 0):
                                                                                                            $desc_o = $desc_o + ((int) $products[$i]['qty'] * (int) $products[$i]['price']);
                                                                                                            $desc = $desc + ((int) $products[$i]['qty'] * (int) $products[$i]['price']) * ((100 - (int) $products[$i]['discount']) * 0.01);
                                                                                                        endif;
                                                                                                        
                                                                                                        $_int = $_int + ((int) $products[$i]['qty'] * (int) $products[$i]['price']) * ((100 - (int) $products[$i]['discount']) * 0.01);
                                                                                                    endfor;
                                                                                                ?>
                                                                                                <td style="text-align: right"><p style="margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format($sub, 2)?></p></td>
											</tr>
											<tr><td height="10"></td></tr>
											<tr>
												<td width="30"></td>
												<?php $delivery_time = explode('-', $delivery);?>
												<td>&#8226; <b>Tiempo de entrega:</b> de <?= $delivery_time[0]?> a <?= $delivery_time[1]?> <?= utf8_encode($d_time)?> <?= ( utf8_encode(strtolower($d_time)) === 'semana' || utf8_encode(strtolower($d_time)) === 'semanas') ? '' : 'habiles'?> una vez realizado el pago.</td>
                                                <td><p style="margin: 0 !important; padding: 0 0 0 10px;">Costo de env&iacute;o</p></td>
												<td style="text-align: right"><p style="margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format($shipping, 2)?></p></td>
											</tr>
											<tr>
												<td width="30"></td>
												<td>&#8226; <b>Condiciones de pago:</b> 100% para generar la orden de compra correspondiente.</td>
												<?php if( $desc > 0): ?>
                                                                                                    <td bgcolor="rgb(255,195,0)" style="color: rgb(255,255,255);"><p style="margin: 0 !important; padding: 0 0 0 10px;"><b>Descuento</b></p></td>
                                                                                                <?php else: ?>
                                                                                                    <td></td>
                                                                                                <?php endif; ?>
												<?php if( $desc > 0): ?>
												<?php $rest = $sub - $desc;?>
                                                                                                    <td bgcolor="rgb(255,195,0)" style="color: rgb(255,255,255); text-align: right"><p style="margin: 0 !important; padding: 0 10px 0 0;"><b>- $</b> <?= number_format(($desc_o - $desc), 2)?></p></td>
                                                                                                <?php else: ?>
                                                                                                    <td></td>
                                                                                                <?php endif; ?>
											</tr>
											<tr>
												<td width="30"></td>
												<td>&#8226; <b>M&eacute;todos de pago:</b> dep&oacute;sito o transferencia Interbancaria.</td>
                                                                                                <th><p style="margin: 0 !important; padding: 0 0 0 10px;">Subtotal</p></th>
                                                                                                <td style="text-align: right"><p style="margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format(( $desc > 0) ? ($_int) + $shipping : $sub + $desc + $shipping, 2)?></p></td>
											</tr>
											<tr>
												<td width="30"></td>
												<td>&#8226; <b>Vigencia de la cotizaci&oacute;n:</b> <?= date('d-m-Y', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')))?></td>
                                                                                                <th><p style="margin: 0 !important; padding: 0 0 0 10px;">IVA</p></th>
                                                                                                <td style="text-align: right"><p style="margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format(( $desc > 0) ? (($_int) + $shipping) * 0.16 : ($sub + $desc + $shipping) * 0.16, 2)?></p></td>
											</tr>
											<tr>
												<td width="30"></td>
												<td>&#8226; Env&iacute;o <b>GR&Aacute;TIS</b> a la Ciudad de M&eacute;xico a partir de los <b>$5,000.00</b>.</td>
                                                                                                <th><p style="margin: 0 !important; padding: 0 0 0 10px;">Total</p></th>
                                                                                                <td style="text-align: right"><p style="margin: 0 !important; padding: 0 10px 0 0;"><b>$</b> <?= number_format(( $desc > 0) ? (($_int) + $shipping) * 1.16 : ($sub + $desc + $shipping) * 1.16, 2)?></p></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr><td height="20"></td></tr>
								<tr>
									<td class="footer" bgcolor="rgb(50,50,50)">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="10"></td>
												<td align="left" class="footercopy" style="text-align: left;">
													contacto@sienity.com
												</td>
												<td align="right" class="footercopy" style="text-align: right;">
													&copy; <?= date("Y")?> - Sienty Solutions  S.A. de C.V.
												</td>
												<td width="10"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
        			</tr>
				</table>
			</td>
		</tr>
	</table>
<!--analytics-->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://tutsplus.github.io/github-analytics/ga-tracking.min.js"></script>
</body>
</html>
