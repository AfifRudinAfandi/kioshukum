<!doctype html>
<html lang="en">

<head>
	<title><?= $setting->web_title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= $setting->web_description ?>">
	<meta name="robots" content="index, follow">
	
    <link rel="preconnect" href="https://fonts.gstatic.com">
	
	<link rel="icon" href="<?= $setting->web_favicon ?>" type="image/gif" sizes="16x16">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <?php if(!empty($_css)){
      foreach($_css as $val){
        ?>
      <link href="<?php echo $val ?>" rel="stylesheet" type="text/css"/>
    <?php
        }
    }
    ?>
    
    <link href="<?= base_url() ?>/assets/static/css/main.css?vertion=timestam" rel="stylesheet"/>
    <link href="<?= base_url() ?>/assets/static/css/responsive.css?vertion=timestam" rel="stylesheet"/>
	
	<style>
	<?= $setting->custom_css ?>
	</style>
	
    
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $setting->google_seo ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?= $setting->google_seo ?>');
	</script>


</head>

<body>
    <nav class="navbar main-nav navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid ctf">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img class="logo-brand" src="<?= $setting->web_logo ?>">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <?php
                    $db  = \Config\Database::connect();
                    $builder_tbl_menu = $db->table('tbl_menu');
                    $menu = $builder_tbl_menu->getWhere(array('is_parent' => 0));
                    foreach ($menu->getResult() as $m) {
                        
                      $submenu = $builder_tbl_menu->getWhere(array('is_parent'=>$m->menu_id));
                        if(count($submenu->getResult()) > 0){ ?>

                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"aria-expanded="false">
                                <?=strtoupper($m->menu_title)?>
                              </a>

                              <div class="dropdown-menu dropdown-multicol" aria-labelledby="navbarDropdown" >
                                <div class="dropdown-row">
                            
                                <?php foreach ($submenu->getResult() as $s){ ?>

                                <div class="item-sub-menu">
                                    <a href="<?=$s->menu_link?>" class="wrapper-menu dropdown-item">
                                      <img  class="icon-sub-menu" src="<?=$s->menu_icon?>"/>
                                      <div class="wrapper-sub-name ms-2">
                                        <p class="sub-title"><?=$s->menu_title?></p>
                                        <p class="sub-description">
                                          <?=$s->menu_description?>
                                        </p>
                                      </div>
                                    </a>
                                </div>

                                <?php } ?>
                            
                                </div>
                              </div>
                            </li>

                            <?php
                        } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?=$m->menu_link?>"><?=strtoupper($m->menu_title)?></a>
                            </li>
                        <?php }
                    } ?>

                </ul>
                <div class="d-flex">
                    <?php $session = session();
                    if($session->logged_in == TRUE){ ?>

                    <div class="dropdown">
                      <div class="btn wrapper-profile dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="ic-profile" src="<?= base_url() ?>/assets/static/images/default.svg">
                        <p class="profile-name"><?= $session->get('member_first_name'); ?></p>
                      </div>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= base_url('account/index') ?>">Dashboard</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('account/logout') ?>">Logout</a></li>
                      </ul>
                    </div>

                    <?php } else { ?>
                      <a href="<?= base_url('account/login') ?>" class="btn btn-sm btn-nav-outline">Login</a>
                      <a href="<?= base_url('account/register') ?>" class="btn btn-sm btn-nav-solid ms-2">Register</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <main class="main-wrapper">
      <?= $this->renderSection('content') ?>
      <footer>
      <div class="container mb-5">
        <div class="row">
          <div class="col-md-5">
            <h5 class="footer-title">kioshukum.id</h5>
            <p class="footer-description">Kios Hukum hadir sebagai jawaban atas kebutuhan layanan bantuan hukum yang mudah, cepat dan professional.</p>
            <ul class="wrapper-social-link">
              <li class="social-link"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
              <li class="social-link"><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li class="social-link"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li class="social-link"><a href="https://instagram.com/kioshukum"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
          <div class="col">
            <h5 class="footer-title">Layanan</h5>
            <ul class="footer-menu">
              <li><a href="#">Pendirian Badan</a></li>
              <li><a href="#">HAKI</a></li>
              <li><a href="#">Perjanjian</a></li>
              <li><a href="#">Tenaga Kerja Asing</a></li>
            </ul>
          </div>
          <div class="col">
            <h5 class="footer-title">Tentang</h5>
            <ul class="footer-menu">
              <li><a href="<?= base_url('about/tnc') ?>">Syarat dan Ketentuan</a></li>
            </ul>
          </div>
          <div class="col">
            <h5 class="footer-title">Office</h5>
            <p class="address">Jl. Damarsari No.35A RT 009 RW 007 Kel. Jatipadang Kec. Pasar Minggu Jakarta Selatan 12510</p>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p class="copy-right">©2020 Codekece. Studio</p>
      </div>
    </footer>
    <a class="float-button" href="https://api.whatsapp.com/send?phone=62<?= $setting->web_sms ?>&text=Hi KiosHukum.id" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
  </main>
  
  <script src="<?= base_url() ?>/assets/static/js/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <?php if(!empty(@$landing_slide)){ ?>
  <script src="<?= base_url() ?>/assets/static/js/slider.js"></script>
  <?php } ?>

  <!-- GetButton.io widget -->
  <!--<script type="text/javascript">
      (function () {
          var options = {
              whatsapp: "+62 819-2793-9290", // WhatsApp number
              call_to_action: "Message us", // Call to action
              position: "right", // Position may be 'right' or 'left'
          };
          var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
          var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
          s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
          var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
      })();
  </script>-->
  <!-- /GetButton.io widget -->
	
  <?php if(!empty($_js)){
    echo $_js;
  } ?>

</body>

</html>
