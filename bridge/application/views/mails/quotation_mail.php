<?php $count = count($products)?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Quotation</title>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  img {height: auto;}
  .content {width: 100%; max-width: 600px;}
  .header {padding: 40px 30px 20px 30px;}
  .header1 {padding: 5px 30px 20px 30px;}
  .innerpadding {padding: 10px 50px 30px 50px; text-align: justify;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 10px; color: #153643; font-family: sans-serif; text-align: center;}
  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

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
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->     
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td bgcolor="#f6f8f1" class="header">
          <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0width="100%"" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">  
            <tr>
              <td height="30">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="subhead" style="padding: 0 0 0 3px;">
                        Hola, <?= strtoupper($to)?>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffff" class="header1">
          <table width="60%" align="center" border="0" cellpadding="0" cellspacing="0">  
            <tr>
              <td height="" style="padding: 0;">
                <img class="fix" src="<?= base_url()?>resources/images/logo.png" width="100%" height="70" border="0" alt="logo" />
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
            <tr>
              <td height="70">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="subhead" style="padding: 0 0 0 3px; font-size: 18px;">
                      <img class="fix" src="<?= base_url()?>resources/images/mail_top.png" width="100%" border="0" alt="" />
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="bodycopy" align="center">
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
                    
                Sienity Solutions SA de CV le ha enviado un formato de pago por un importe de $ <?= number_format(( $desc > 0) ? (($_int) + $shipping) * 1.16 : ($sub + $desc + $shipping) * 1.16, 2)?> MXN
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
            <tr>
              <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align: center;">
                  <tr>
                    <td class="bodycopy">
                        <?php setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish'); ?>
                      Fecha de vencimiento <?= iconv('ISO-8859-2', 'UTF-8', strftime("%A %d de %B del %Y", strtotime(date('d-m-Y', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y'))))));//date("F j, Y");//$expire_time?>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 20px 0 0 0; text-align: center;">
                        <!--
                        <table class="buttonwrapper" bgcolor="#15c" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
                        <tr>
                          <td class="button" height="45">
                            <a href="#">Ver y pagar formato de pago</a>
                          </td>
                        </tr>
                      </table>
                        -->
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
          <td class="innerpadding bodycopy" style="font-size: 14.5pt; color: #009cde;">
          Nota de Sienity Solutioins SA de CV
        </td>
      </tr>
        <tr>
        <td class="innerpadding bodycopy">
            <?php $delivery_time = explode('-', $delivery);?>
          Tiempo de entrega: <?= $delivery_time[0]?> a <?= $delivery_time[1]?> <?= utf8_encode($d_time)?> <?= ( utf8_encode(strtolower($d_time)) === 'semana' || utf8_encode(strtolower($d_time)) === 'semanas') ? '' : 'habiles'?>
        </td>
      </tr>
        <tr>
        <td>
          <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
            <tr>
              <td height="70">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="subhead" style="padding: 0 0 0 3px; font-size: 18px;">
                      <img class="fix" src="<?= base_url()?>resources/images/mail_bottom.png" width="90%" border="0" alt="" />
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td class="footer">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" style="padding: 20px 0 0 0;">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="33%" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="https://www.paypal.com/selfhelp/home?ppid=PPC000977&cnac=MX&rsta=es_MX(es_US)&cust=&unptid=cf7016b0-a3a3-11e7-9c9e-101f7436f90c&t=&cal=e896c49f908d7&calc=e896c49f908d7&calf=e896c49f908d7&unp_tpcid=invoice-buyer-notification&page=main:email&pgrp=main:email&e=op&mchn=em&s=ci&mail=sys">
                        Contacto y ayuda
                      </a>
                    </td>
                      <td width="1" style="text-align: center; padding: 0;">|</td>
                    <td width="33%" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="https://www.paypal.com/mx/webapps/mpp/paypal-safety-and-security?ppid=PPC000977&cnac=MX&rsta=es_MX(es_US)&cust=&unptid=cf7016b0-a3a3-11e7-9c9e-101f7436f90c&t=&cal=e896c49f908d7&calc=e896c49f908d7&calf=e896c49f908d7&unp_tpcid=invoice-buyer-notification&page=main:email&pgrp=main:email&e=op&mchn=em&s=ci&mail=sys">
                        Seguridad
                      </a>
                    </td>
                      <td width="1" style="text-align: center; padding: 0;">|</td>
                      <td width="33%" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="https://www.paypal.com/mx/webapps/mpp/mobile-apps?ppid=PPC000977&cnac=MX&rsta=es_MX(es_US)&cust=&unptid=cf7016b0-a3a3-11e7-9c9e-101f7436f90c&t=&cal=e896c49f908d7&calc=e896c49f908d7&calf=e896c49f908d7&unp_tpcid=invoice-buyer-notification&page=main:email&pgrp=main:email&e=op&mchn=em&s=ci&mail=sys">
                        Aplicaciones
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 40px 0 40px 0;">
                  <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="https://twitter.com/PaypalMexico?ppid=PPC000977&cnac=MX&rsta=es_MX(es_US)&cust=&unptid=cf7016b0-a3a3-11e7-9c9e-101f7436f90c&t=&cal=e896c49f908d7&calc=e896c49f908d7&calf=e896c49f908d7&unp_tpcid=invoice-buyer-notification&page=main:email&pgrp=main:email&e=op&mchn=em&s=ci&mail=sys">
                        <img src="<?= base_url()?>resources/images/mail_twitter.png" width="37" height="37" alt="Twitter" border="0" />
                      </a>
                    </td>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="https://ci5.googleusercontent.com/proxy/vVWX0BGg5CLmwkPcmbeiuVuniZ4N8WfhYeNtIXlCxu0vlvkxqL30MaYzKQeqjKKdB2xIGRpl5oIrUCCgDCGzjjA-p6s8Nl4ZTYANNVWq61e9wMz05LEErKcNDLeAXvVahsa_k2VAZAWYmEqZIc5H0XSG8EW_1w=s0-d-e1-ft#https://www.paypalobjects.com/digitalassets/c/system-triggered-email/n/layout/images/icon-ig.jpg">
                        <img src="<?= base_url()?>resources/images/mail_pinterest.png" width="37" height="37" alt="Pinterest" border="0" />
                      </a>
                    </td>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="https://ci6.googleusercontent.com/proxy/V6WApbnNwAOZZYxNROgQ0ghkIfGiumbovOWOVH-QKHI1JZ2VRu00kw2Hv0lHeMD0OWFuhQYkaAi6iwQssIcjviIYAQErzjVUwnh7s-1cZ5rCkh5cp3CUa9FLUJ8JNQsNDwE36WEam0X9nIZ2xWcd3cOqszW98g=s0-d-e1-ft#https://www.paypalobjects.com/digitalassets/c/system-triggered-email/n/layout/images/icon-fb.jpg">
                        <img src="<?= base_url()?>resources/images/mail_face.png" width="37" height="37" alt="Facebook" border="0" />
                      </a>
                    </td>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.linkedin.com/company/1482?trk=tyah&ppid=PPC000977&cnac=MX&rsta=es_MX(es_US)&cust=&unptid=cf7016b0-a3a3-11e7-9c9e-101f7436f90c&t=&cal=e896c49f908d7&calc=e896c49f908d7&calf=e896c49f908d7&unp_tpcid=invoice-buyer-notification&page=main:email&pgrp=main:email&e=op&mchn=em&s=ci&mail=sys">
                        <img src="<?= base_url()?>resources/images/mail_link.png" width="37" height="37" alt="In" border="0" />
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</table>
    <hr>
<!--analytics-->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://tutsplus.github.io/github-analytics/ga-tracking.min.js"></script>
</body>
</html>
