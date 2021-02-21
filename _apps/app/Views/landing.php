<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>

<!-- // SLIDE -->
<?php if (!empty($landing_slide)) { ?>
    <section class="banner home">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
            <?php echo count($landing_slide_data); if (count($landing_slide_data) > 1) { ?>
                <?php $i = 0; foreach ($landing_slide_data as $slide) { ?>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" <?php if ($i == 0) {
                                                                                                        echo 'class="active"';
                                                                                                    } ?>></li>
                <?php $i++; } ?>
            <?php } ?>
            </ol>
            <div class="carousel-inner">
                <?php $i = 0; foreach ($landing_slide_data as $slide) { ?>
                    <div class="carousel-item <?php if ($i == 0) {
                                                    echo 'active';
                                                } ?>">
                        <img src="<?= $slide->slide_image ?>" class="d-block w-100">
                        <div class="overlay"></div>
                        <div class="carousel-caption">
                            <p class="banner-lable"><?= $slide->slide_label ?></p>
                            <h1 class="banner-title"><?= $slide->slide_title ?></h1>
                            <p class="banner-description"><?= $slide->slide_description ?></p>
                            <?php if($slide->slide_link != "#" && $slide->slide_link != ""){ ?>
                                <a class="btn btn-banner" href="<?= $slide->slide_link ?>">Learn More</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php $i++; } ?>
            </div>
        </div>
    </section>
<?php } else{ ?>

<section class="banner banner-services">
    <div class="container">
        <p class="banner-lable">Kios Hukum.id</p>
        <h1 class="banner-title"><?= $landing_name ?></h1>
        <p class="banner-description"><?= $landing_shortdesc ?></p>
    </div>
</section>

<?php } ?>


<!-- // ABOUT SECTION -->
<?php if(!empty($landing_slide)){ ?>
    <?php if (!empty($s1_landing_title)) { ?>
        <section class="about-company home">
            <div class="container">
                <div class="wrapper-about">
                    <h1 class="about-title"><?= $s1_landing_title ?></h1>
                    <p class="about-description"><?= $s1_landing_content ?></p>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if (!empty($landing_service_category)) { ?>
    <section class="home service-menu">
        <div class="container">
            <ul class="row gx-2 gy-2">
                <?php foreach ($service_category_data as $service) { ?>
                    <li class="nav-item col">
                        <a class="nav-link" href="#">
                            <img src="<?= $service->category_icon ?>"><span><?= $service->category_name ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <?php } ?>

<?php } else { ?>

<?php if (!empty($landing_service_category)) { ?>
    <section class="home service-menu">
        <div class="container">
            <ul class="row gx-2 gy-2">
                <?php foreach ($service_category_data as $service) { ?>
                    <li class="nav-item col">
                        <a class="nav-link" href="#">
                            <img src="<?= $service->category_icon ?>"><span><?= $service->category_name ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php } ?>

<section class="about-services">
    <div class="container">
        <div class="wrapper-services">
            <h1 class="services-title"><?= $s1_landing_title ?></h1>
            <p class="services-description"><?= $s1_landing_content ?>
            </p>
        </div>
    </div>
</section>
<?php } ?>

<!-- // FEATURE SECTION -->
<?php if (!empty($section1_on)) { ?>
<section class="reason-belive home landing">
    <div class="container">
        <div class="wrapper-reason">
            <h1 class="reason-title"><?= $s2_landing_title ?></h1>
            <div class="reason-seperator"></div>
            <div class="row row-reason">
                <div class="col-md-4 reason-item">
                    <img class="reason-icon" src="<?= $s2_landing_icon1 ?>">
                    <p class="reason-item-title"><?= $s2_landing_title1 ?></p>
                    <p class="reason-item-description"><?= $s2_landing_description1 ?></p>
                </div>
                <div class="col-md-4 reason-item">
                    <img class="reason-icon" src="<?= $s2_landing_icon2 ?>">
                    <p class="reason-item-title"><?= $s2_landing_title2 ?></p>
                    <p class="reason-item-description"><?= $s2_landing_description2 ?></p>
                </div>
                <div class="col-md-4 reason-item">
                    <img class="reason-icon" src="<?= $s2_landing_icon3 ?>">
                    <p class="reason-item-title"><?= $s2_landing_title3 ?></p>
                    <p class="reason-item-description"><?= $s2_landing_description3 ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!-- // SEARCH SECTION -->
<?php if (!empty($landing_search)) { ?>

<section class="pricing">
    <div class="container">
        <div class="wrapper-pricing">
            <p class="company-lable">Kios Hukum.id</p>
            <h1 class="pricing-title">Jaminan Layanan Terbaik</h1>
            <p class="pricing-description">
            Kios Hukum.id menyediakan layanan bantuan hukum terbaik dan di
            tangani oleh pengacara berdedikasi tinggi di bidangnya.
            </p>
            <div class="wrapper-pricing-filter">
                <p class="filter-title">Cek Harga Layanan</p>
                <form action="" method="post">
                    <div class="row-pricing-filter">
                        <div class="item-pricing col">
                            <select name="wilayah" class="form-select" aria-label="Default select example" required>
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="jabotabek">JABOTABEK</option>
                                <option value="surabaya">SURABAYA</option>
                                <option value="other">KOTA LAINNYA</option>
                            </select>
                        </div>
                        <div class="item-pricing col">
                            <?=$service?>
                        </div>
                        <button type="submit" class="btn button-pricing">Cek Harga</button>
                    </div>
                </form>
            </div>
        </div>
		
		<?php if (!empty($result)) { echo $result; } ?>
		
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content modal-content-login">
<div class="modal-body login-form">
<div class="row">
<div class="col-md-6">
<div class="left">
<div class="wrapper-icon-form">
<img class="image-icon" src="../../assets/static/images/team2.jpg">
<img class="decore" src="../../assets/static/images/decore.svg">
</div>
<p class="quotes">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
</div>
</div>
<div class="col-md-6">
<div class="right form-login">
<h1 class="title">Login to get awesome services,
Wherever you are</h1>
<div id="messages"></div>
<form id="form" method="post">
<input type="hidden" name="from" value="service">
<div class="wrapper-form-control">
<div class="col">
<label for="email" class="form-label">Email Address</label>
<input type="email" name="email" class="form-control" placeholder="mail@gmail.com" id="email"/>
</div>
</div>
<div class="wrapper-form-control">
<div class="col">
<label for="password" class="form-label">Password</label>
<div class="wrapper-password">
<input type="password" name="password" class="form-control password_input" placeholder="**********" id="password"/>
<i class="preview_icon far fa-eye" id="togglePassword"></i>
</div>
</div>
<a class="forgot" href="#">Forgot Password?</a>
</div>
<div id="loader" style="display:none; margin-bottom: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i> Please wait...</div>
<button class="btn button-messages mb-4" type="submit">Log In Now</button>
<p class="direct-link">Don’t have an account? <a href="register.html">Register</a></p>
</form>

</div>
</div>
</div>
<button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
</div>
</div>
</div>
<script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
      const passwordConfirm = document.querySelector('#confirm_password');

      togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });
      togglePasswordConfirm.addEventListener('click', function (e) {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });
    </script>
<?php } ?>

<!-- // HOW IT WORK SECTION -->
<?php if (!empty($landing_work)) { ?>

<section class="how-it-works">
    <p class="how-it-title">How it Works</p>
    <div class="seperator"></div>
    <?php foreach ($landing_work_data as $work) { ?>
    <div class="wrapper-step">
        <div class="container step-row">
            <div class="wrapper-icon">
                <img class="icon-step" src="<?= $work->work_icon ?>" />
            </div>
            <div class="col wrapper-step-description">
                <p class="feature-title"><?= $work->work_title ?></p>
                <p class="feature-description"><?= $work->work_description ?></p>
                <?php if($work->work_link != "#" && $work->work_link != ""){ ?>
                    <a class="btn button-step" href="<?= $work->work_link ?>">Learn More</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<?php } ?>

<!-- // LAWYERS SECTION -->
<?php if (!empty($landing_lawyers)) { ?>

<section class="our-lawyers">
    <div class="container">
        <h1 class="team-title">Our Lawyers</h1>
        <div class="lawyers-seperator"></div>
        <div class="row">
            <?php foreach ($landing_lawyer_data as $lawyer) { ?>
            <div class="col-md-3">
                <a class="lawyers-item" href="<?=base_url()?>/lawyer/<?= $lawyer->lawyer_slug ?>">
                <img class="profile-team" src="<?= $lawyer->lawyer_avatar ?>">
                <p class="profile-name"><?= $lawyer->lawyer_name ?></p>
                <p class="profile-experience"><i class="fas fa-check-circle"></i><?= $lawyer->lawyer_experien ?></p>
                <p class="lable-lawyers"><?= $lawyer->lawyer_category_name ?></p>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>

<!-- // PARTNER SECTION -->
<?php if (!empty($landing_partner) && $landing_partner == 1) { ?>
    <section class="partnership">
        <div class="container">
            <div class="row wrapper-partnership">
                <div class="col-md-4 mb-4">
                    <p class="partnership-title">Pertener with us</p>
                    <div class="partnership-seperator"></div>
                </div>
                <div class="col-md-8 mb-4">
                    <p class="partnership-description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. </p>
                </div>
                <?php foreach ($landing_partner_data as $partner) { ?>
                <div class="col col-img">
                    <img src="<?= $partner['partner_image'] ?>" class="partnership-img" title="<?= $partner['partner_name'] ?>">
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- // TESTIMONIAL SECTION -->
<?php if (!empty($testimonial_on)) { ?>
    <section class="testimonial">
        <div class="container">
            <div class="wrapper-testimonial">
                <h1 class="testimonial-title">Testimonial</h1>
                <div class="testimonial-seperator"></div>
                <div class="wrapper-vm">
                    <p class="testimonial-description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p>
                    <a class="btn btn-view-more vm-lg" href="#">View More</a>
                </div>
                <div class="thumbnail-slider">
                    <div class="thumbnail-container">
                        <?php foreach ($landing_testimonial_data as $testimoni) { ?>
                            <div class="item">
                                <div class="wrapper-slider">
                                    <div class="wrapper-content">
                                        <img class="decor-testimonial" src="<?= base_url() ?>/assets/static/images/quotation-mark.svg">
                                        <p class="content-testimonial"><?= $testimoni['testimonial'] ?></p>
                                    </div>
                                    <div class="testimonial-profile">
                                        <img class="image-profile-testimonial" src="<?= $testimoni['testimonial_avatar'] ?>">
                                        <div class="wrapper-profile-name">
                                            <p class="testimonial-name"><?= $testimoni['testimonial_name'] ?></p>
                                            <p class="testimonial-company"><?= $testimoni['testimonial_company'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="controls"></div>
                </div>
                <a class="btn btn-view-more vm-sm" href="#">View More</a>
            </div>
        </div>
    </section>
<?php } ?>

<!-- // ADS SECTION -->
<?php if (!empty($s2_landing_title)) { ?>
    <section class="banner-ads">
        <div class="container">
            <div class="wrapper-banner">
                <div class="left">
                    <p class="ads-title">Indonesia court filing and process serving software for law firms</p>
                    <p class="ads-description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
                <div class="right">
                    <a class="btn button-ads" href="#">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?= $this->endSection() ?>