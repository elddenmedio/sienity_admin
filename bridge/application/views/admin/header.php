<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title><?= $title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../../resources/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../../resources/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../../resources/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../../resources/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="../../resources/js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="../../resources/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../../resources/js/wow.min.js"></script>
	<script>
		 <?php //new WOW().init();?>
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="../../resources/js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

<style>
    .contenedor {font-size: 14px; background-color: #383838; color: #fff; padding: 5px 10px; border: 1px solid #000; max-width: 300px; margin-top: 0px; float: left; position: absolute; z-index: 10;}
            .contenedor a{color: #fff; text-decoration: none; cursor: pointer; width: 190px; max-width: 190px; overflow: hidden; text-overflow: ellipsis;}
            hr{border: 1px solid #888888;}
            .no-padding{padding: 0 !important;}
            .no-margin{margin: 0 !important;}
            .epadding-15{padding: 15px !important;}
            .e-w-bold{font-weight: bold !important;}
            .e-c-white{color: #ffffff;}
            .e-height-60{height: 60px !important;}
            .e-height-40{height: 40px !important;}
            .e-height-20{height: 20px !important;}
            .e-height-10{height: 10px !important;}
            .e-header{padding: 5px 20px; color: #ffffff;}
            .e-header-2{padding: 0px !important; height: 40px; color: #ffffff; background-color: #1e1f21; position: absolute; left: 7.5%; width: 85%;}
            .e-overflow{margin-top: 10px; padding: 0 15px;}
            .e-table-header{}
            .e-table{min-width: 480px;}
            .e-table-op{background-color: #999999;}
            .wrapper{padding: 25px;}
            .e-products{border: 1px solid #373A3E; border-radius: 10px; padding: 10px;}
            textarea {resize: none;}
            
            .profile_details{float: right; position: absolute; right: 0; top: 0;}
            #s-folder, #s-file{padding: 5px 0 0 0; text-align: center;}
            #s-file a{text-decoration: none;}
            #s-file #pdf{color: red;}
            #s-folder label, #s-file label{padding: 5px; overflow-x: hidden; text-overflow: ellipsis;}
            #s-folder, #s-folder i, #s-folder label, #s-file, #s-file i, #s-file label{cursor: pointer;}
            #s-folder:hover, #s-file:hover{background: #ABABAB;}
            input[type=text]#rfc_rfc{text-transform: uppercase;}
            
            #products-list a{cursor:pointer;}
</style>
</head> 
   
 <body class="sticky-header left-side-collapsed">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
                            <h1><a href="<?= site_url('admin')?>">Sienity <span>Admin</span></a></h1>
			</div>
			<div class="logo-icon text-center">
                            <a href="<?= site_url('admin')?>"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-users"></i>
								<span>{top_menu_1}</span></a>
								<ul class="sub-menu-list">
                                                                    <li><a href="<?= site_url('admin-users')?>">{top_menu_1_1}</a> </li>
                                                                    <?php if( (int) $this->session->userdata('level') === 120):?>
                                                                        <li><a href="<?= site_url('admin-new-user')?>">{top_menu_1_2}</a> </li>
                                                                    <?php endif;?>
								</ul>
						</li>             
						<li class="menu-list"><a href="#"><i class="lnr lnr-license"></i> <span>{top_menu_2}</span></a>
							<ul class="sub-menu-list">
                                                            <li><a href="<?= site_url('admin-products')?>">{top_menu_1_1}</a> </li>
                                                            <!--<li><a href="<?= site_url('admin-new-product')?>">{top_menu_1_2}</a></li>-->
							</ul>
						</li>
                                                <li class="menu-list">
                                                    <a href="#">
                                                        <i class="lnr lnr-file-add"></i> <span>{top_menu_3}</span>
                                                    </a>
                                                    <ul class="sub-menu-list">
                                                        <li><a href="<?= site_url('admin-quotations')?>">{top_menu_1_1}</a></li>
                                                        <li><a href="<?= site_url('admin-new-quotation')?>">{top_menu_1_2}</a></li>
                                                    </ul>
                                                </li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
                                            <ul class="nofitications-dropdown" style="height: 50px;">
								   							   		
							<div class="clearfix"></div>	
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(../../resources/images/default-user-imge.jpeg) no-repeat center; background-size: cover;"> </span> 
										 <div class="user-name">
                                                                                     <p><span class="admin-name" title="<?= $this->session->userdata('name')?>"><?= $this->session->userdata('name')?></span><span><?= ( (int) $this->session->userdata('level') === 120) ? '{level_admin}' : '{level_sales}'?></span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
                                                                        <!--
									<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
									<li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
                                                                        -->
                                                                        <li> <a href="<?= site_url('logout')?>"><i class="fa fa-sign-out"></i> {logout}</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		    	
					<div class="clearfix"></div>
				</div>
			  </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->
