<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no" />
		       
		<link rel="icon" href="<?=base_URL()?>assets/backend/logo.png" type="image/png">
		<link href="<?=base_URL()?>assets/frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?=base_URL()?>assets/frontend/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?=base_URL()?>assets/frontend/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="<?=base_URL()?>http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/assets/frontend/css/font-awesome.min.css">
		<link href="<?=base_URL()?>assets/frontend/css/style.css" rel="stylesheet" type="text/css"/>     
		<title>Sign In | SIP Umroh</title>
	</head>
<body data-color="theme-1">
	 
<!-- LOADER -->
<img class="center-image" src="<?=base_URL()?>assets/frontend/img/special/bg-1.jpg" alt="">

<div class="row">
<div class="container">
	<div class="login-fullpage">                                                                            
		<div class="row">
			<div class="col-sm-6 col-lg-offset-3">
				<div class="f-login-content">
					<div class="f-login-header">
						<div class="f-login-title color-dr-blue-2">Selamat Datang!</div>
						<div class="f-login-desc color-grey">Salwana Global Sarana</div>
					</div>

					<form action="<?php echo base_url(); ?>auth/cekmasuk" method="post" class="f-login-form">
						<div class="input-style-1 b-50 type-2 color-5">
							<input name="username" type="text" placeholder="username" required>
						</div>
						<div class="input-style-1 b-50 type-2 color-5">
							<input name="password" type="password" placeholder="password" required>
						</div>
						<input type="submit" name="submit" class="login-btn c-button full b-40 bg-dr-blue-2 hv-dr-blue-2-o" value="MASUK">
						<a href="<?=base_url('auth/pendaftaran')?>" class="login-btn c-button full b-40 bg-blue-8 hv-blue-8-o">PENDAFTARAN</a>					
					</form>
				</div>				
			</div>
		</div>
	</div>
</div>
</div>                                                                                                            
        
<script src="<?=base_URL()?>assets/frontend/js/jquery-2.1.4.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/jquery-ui.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/idangerous.swiper.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/jquery.viewportchecker.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/isotope.pkgd.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/jquery.mousewheel.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/jquery.circliful.min.js"></script>
<script src="<?=base_URL()?>assets/frontend/js/all.js"></script>
</body>
</html>				   