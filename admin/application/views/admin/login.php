<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?=base_url();?>com/images/favicon.ico">
    <title><?=$title;?></title>
    <link href="<?=base_url();?>com/panel/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>com/panel/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?=base_url();?>com/panel/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url();?>com/panel/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>com/panel/css/style-responsive.css" rel="stylesheet" />
</head>
  <body class="login-body">
    <div class="container">
		<form class="form-signin" method="POST" action="<?php echo base_url(); ?>index.php/login/p_login">
			<h2 class="form-signin-heading">sign in now</h2>
			<div class="login-wrap">
				<div class="user-login-info">
					<?php if($this->session->flashdata('message') != '' ){ ?>
						 <div class="alert alert-danger">
							  <?php echo $this->session->flashdata('message');?>
						 </div>
					<?php } ?>
					<input type="text" name="username" class="form-control" id="login-username" placeholder="Username" tabindex="1">
					<input type="password" name="password" class="form-control" id="login-password" placeholder="Password" tabindex="2">
				</div>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
			</div>
		</form>
    </div>
    <script src="<?=base_url();?>com/panel/js/jquery.js"></script>
    <script src="<?=base_url();?>com/panel/bs3/js/bootstrap.min.js"></script>
  </body>
</html>