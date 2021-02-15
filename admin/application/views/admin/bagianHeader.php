<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?= base_url(); ?>com/images/favicon.ico">
    <title><?= $title; ?></title>
    <!--Core CSS -->
    <link href="<?= base_url() ?>com/panel/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>com/panel/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?= base_url() ?>com/panel/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--dynamic table-->
    <link href="<?= base_url() ?>com/panel/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url() ?>com/panel/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>com/panel/js/data-tables/DT_bootstrap.css" />
    <!--datetimepicker table-->
    <link rel="stylesheet" href="<?= base_url() ?>com/panel/js/bootstrap-datepicker/datepicker.min.css">
    <link href="<?= base_url() ?>com/panel/js/bootstrap-datepicker/datepicker3.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>com/panel/js/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>com/panel/js/fileupload/bootstrap-fileupload.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>com/panel/js/switcher/css/switcher.css" rel="stylesheet">
    <link href="<?= base_url() ?>com/panel/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>com/panel/css/style-responsive.css" rel="stylesheet" />
    <script src="<?= base_url() ?>com/panel/js/jquery.js"></script>

    <style type="text/css">
        .sidebar-ed {
            color: white;
            border-radius: 4px;
        }

        a.logo {
            margin: 11px 0 0 25px;
        }

        table#dynamic-table tr td a.btn-action {
            display: none;
        }

        table#dynamic-table tr:hover td a.btn-action {
            display: inline-block;
        }
    </style>
</head>

<body>

    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="<?= base_url() ?>dashboard" class="logo">
                    <p style="font-size: 24px; font-weight:bold; margin-top: 10px; color: white;">
                        KiosHukum.id
                    </p>
                    <!-- <img class="img-responsive" src="<?= base_url() ?>com/panel/images/logo.png" alt=""> -->
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
                            <img data-name="<?= $session['user_nama']; ?>" class="profile" />
                            <span class="username"><?= $session['user_nama']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="<?= base_url(); ?>setting"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="<?= base_url(); ?>login/session_off"><i class="fa fa-key"></i> Log Out</a></li>
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
                            <a href="<?php echo base_url('dashboard'); ?>" <?php $id = $this->uri->segment(1);
                                                                            if ($id == "dashboard") { ?> class="active" <?php } ?>>
                                <i class="fa fa-dashboard"></i>
                                DASHBOARD
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>landing/index" <?php $id = $this->uri->segment(1);
                                                                                if ($id == "landing") { ?> class="active" <?php } ?>>
                                <i class="fa fa-comments"></i>
                                LANDING
                            </a>
                        </li>
                        <li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "testimonial") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "testimonial") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-users"></i>
                                TESTIMONIAL
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "testimonial" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('testimonial'); ?>"><i class="fa fa-circle"></i> TESTIMONIAL</a></li>
                                <li <?php if ($this->uri->segment(1) == "testimonial" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('testimonial/category'); ?>"><i class="fa fa-circle"></i> CATEGORY TESTIMONIAL</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "partner") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "partner") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-users"></i>
                                PARTNER
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "partner" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('partner'); ?>"><i class="fa fa-circle"></i> PARTNER</a></li>
                                <li <?php if ($this->uri->segment(1) == "partner" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('partner/category'); ?>"><i class="fa fa-circle"></i> CATEGORY PARTNER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>inquiry/index" <?php $id = $this->uri->segment(1);
                                                                                if ($id == "inquiry") { ?> class="active" <?php } ?>>
                                <i class="fa fa-users"></i>
                                INQUIRY
                            </a>
                        </li>
                        <li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "lawyer") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "lawyer") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-users"></i>
                                LAWYER
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "lawyer" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('lawyer'); ?>"><i class="fa fa-circle"></i> LAWYER</a></li>
                                <li <?php if ($this->uri->segment(1) == "lawyer" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('lawyer/category'); ?>"><i class="fa fa-circle"></i> CATEGORY LAWYER</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "work") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "work") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-users"></i>
                                HOW IT WORK
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "work" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('work'); ?>"><i class="fa fa-circle"></i> HOW IT WORK</a></li>
                                <li <?php if ($this->uri->segment(1) == "work" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('work/category'); ?>"><i class="fa fa-circle"></i> CATEGORY HOW IT WORK</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "frequently_ask_question") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "frequently_ask_question") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-comments"></i>
                                FAQ
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "frequently_ask_question" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('frequently_ask_question'); ?>"><i class="fa fa-circle"></i> FAQ</a></li>
                                <li <?php if ($this->uri->segment(1) == "frequently_ask_question" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('frequently_ask_question/category'); ?>"><i class="fa fa-circle"></i> CATEGORY FAQ</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "slide") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "slide") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-picture-o"></i>
                                SLIDE
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "slide" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('slide'); ?>"><i class="fa fa-circle"></i> SLIDE</a></li>
                                <li <?php if ($this->uri->segment(1) == "slide" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('slide/category'); ?>"><i class="fa fa-circle"></i> CATEGORY SLIDE</a></li>
                            </ul>
                        </li>
						
						<li class="sub-menu dcjq-parent-li <?php if ($this->uri->segment(1) == "service") {
                                                                echo 'active';
                                                            } ?>">
                            <a href="javascript:;" class="<?php if ($this->uri->segment(1) == "service") {
                                                                echo 'dcjq-parent active';
                                                            } ?>">
                                <i class="fa fa-dollar"></i>
                                SERVICE
                            </a>
                            <ul class="sub">
                                <li <?php if ($this->uri->segment(1) == "service" && $this->uri->segment(2) == NULL) { ?> class="active" <?php } ?>><a href="<?php echo base_url('service'); ?>"><i class="fa fa-circle"></i> SERVICE</a></li>
                                <li <?php if ($this->uri->segment(1) == "service" && $this->uri->segment(2) == "category") { ?> class="active" <?php } ?>><a href="<?php echo base_url('service/category'); ?>"><i class="fa fa-circle"></i> CATEGORY SERVICE</a></li>
                            </ul>
                        </li>
						
                        <li>
                            <a href="<?php echo base_url(); ?>member/index" <?php $id = $this->uri->segment(1);
                                                                                if ($id == "member") { ?> class="active" <?php } ?>>
                                <i class="fa fa-users"></i>
                                MEMBER
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>menu" <?php $id = $this->uri->segment(1);
                                                                    if ($id == "menu") { ?> class="active" <?php } ?>>
                                <i class="fa fa-bars"></i>
                                MENU
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>setting/index" <?php $id = $this->uri->segment(2);
                                                                                if ($id == "setting") { ?> class="active" <?php } ?>>
                                <i class="fa fa-gear"></i>
                                SETTING
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