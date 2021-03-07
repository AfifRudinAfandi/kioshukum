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
    <nav class="navbar main-dashboard-nav navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid ctf">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img class="logo-brand" src="<?= $setting->web_logo ?>">
        </a>
        <div class="d-flex dashboard-nav-right">
          <form action="#">
            <div class="wrapper-search">
              <input class="input-search" type="text" name="" placeholder="Type to Search">
              <button class="btn search-btn" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <div class="dropdown">
            <div class="btn wrapper-profile dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="ic-profile" src="<?= base_url() ?>/assets/static/images/default.svg">
              <p class="profile-name"><?= $session->get('member_first_name'); ?></p>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="<?= base_url('home') ?>">Main Home</a></li>
              <li><a class="dropdown-item" href="<?= base_url('account/logout') ?>">Logout</a></li>
            </ul>
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
          <div class="col d-none">
            <h5 class="footer-title">Services</h5>
            <ul class="footer-menu">
              <li><a href="#">Perizinan</a></li>
              <li><a href="#">Ketenagakerjaan</a></li>
              <li><a href="#">HAKI</a></li>
              <li><a href="#">Probono</a></li>
              <li><a href="#">Goverment Support</a></li>
            </ul>
          </div>
          <div class="col">
            <h5 class="footer-title">About</h5>
            <ul class="footer-menu">
              <li><a href="#">Legal And Terms</a></li>
              <li><a href="#">Lawyers Team</a></li>
              <li><a href="#">Privacy Policy</a></li>
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
  </main>
  
  <script src="<?= base_url() ?>/assets/static/js/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <?php if(!empty(@$landing_slide)){ ?>
  <script src="<?= base_url() ?>/assets/static/js/slider.js"></script>
  <?php } ?>

  <!-- GetButton.io widget -->
  <!-- <script type="text/javascript">
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
  </script> -->
  <!-- /GetButton.io widget -->
	
  <?php if(!empty($_js)){
    echo $_js;
  } ?>

</body>

</html>
