<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?=base_url();?>com/images/favicon.ico">
    <title><?=$title;?></title>
    <!--Core CSS -->
    <link href="<?=base_url()?>com/panel/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>com/panel/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?=base_url()?>com/panel/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--dynamic table-->
    <link href="<?=base_url()?>com/panel/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="<?=base_url()?>com/panel/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>com/panel/js/data-tables/DT_bootstrap.css" />
    <!--datetimepicker table-->
    <link rel="stylesheet" href="<?=base_url()?>com/panel/js/bootstrap-datepicker/datepicker.min.css">
    <link href="<?=base_url()?>com/panel/js/bootstrap-datepicker/datepicker3.min.css" rel="stylesheet">
    <link href="<?=base_url()?>com/panel/js/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?=base_url()?>com/panel/js/fileupload/bootstrap-fileupload.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>com/panel/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>com/panel/css/style-responsive.css" rel="stylesheet" />
	<script src="<?=base_url()?>com/panel/js/jquery.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .sidebar-ed{color: white;border-radius: 4px;}
    </style>
</head>

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
     <a href="<?=base_url()?>admin" class="logo">
        <img class="img-responsive" src="<?=base_url()?>com/kece/img/logo_admn.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<img data-name="<?=$session['user_nama'];?>" class="profile"/>
				<span class="username"><?=$session['user_nama'];?></span>
				<b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?=base_url();?>admin/setting"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="<?=base_url();?>admin/session_off"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
				<li>
					<a href="<?php echo base_url(); ?>author" <?php $id=$this->uri-> segment(2); if ($id=="") { ?> class="active" <?php } ?>>
						<i class="fa fa-dashboard"></i>
						DASHBOARD
					</a>
				</li>
				<li class="sub-menu dcjq-parent-li <?php $id=$this->uri-> segment(2); if ($id=="posts" || $id=="category" || $id=="new_posts"|| $id=="editposts") { echo 'active'; } ?>">
                    <a href="javascript:;" class="<?php $id=$this->uri-> segment(2); if ($id=="posts" || $id=="category" || $id=="new_posts"|| $id=="editposts") { echo 'dcjq-parent active'; } ?>">
                        <i class="fa fa-file"></i>
                        <span>POST </span>
                    </a>
                    <ul class="sub">
                        <li <?php $id=$this->uri-> segment(2); if ($id=="new_posts") { ?> class="active" <?php } ?>>
						<a href="<?php echo base_url(); ?>author/new_posts"><i class="fa fa-plus"></i> ADD POST</a></li>
						<li <?php $id=$this->uri-> segment(2); if ($id=="posts") { ?> class="active" <?php } ?>>
						<a href="<?php echo base_url(); ?>author/posts"><i class="fa fa-file-text"></i> ALL POST</a></li>
                    </ul>
                </li>
				<li>
					<a href="<?php echo base_url(); ?>author/account" <?php $id=$this->uri-> segment(2); if ($id=="user") { ?> class="active" <?php } ?>>
						<i class="fa fa-users"></i>
						ACCOUNT
					</a>
				</li>
            </ul>
        </div>
	<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
