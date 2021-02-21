<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
<?php if (!empty($landing_slide)) { ?>
    <section class="home banner">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
            <?php if (count($landing_slide_data) > 1) { ?>
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
                            <a class="btn btn-banner" href="<?= $slide->slide_link ?>">Learn More</a>
                        </div>
                    </div>
                <?php $i++; } ?>
            </div>
        </div>
    </section>
<?php } ?>

<section class="home service-menu">
    <div class="container">
        <ul class="row gx-2 gy-2">
            <?php foreach ($landing_shortcut_menu as $menu) { ?>
                <li class="nav-item col">
                    <a class="nav-link" href="<?= $menu->menu_link ?>">
                        <img src="<?= $menu->menu_icon ?>"><span><?= $menu->menu_title ?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section> 

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

<?php if (!empty($s2_landing_title)) { ?>
    <section class="reason-belive home">
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

<?php if (!empty($landing_partner) && $landing_partner == 1) { ?>
    <section class="partnership home">
        <div class="container">
            <div class="row wrapper-partnership">
                <div class="col-md-4 mb-4">
                    <p class="partnership-title">Pertener with us</p>
                    <div class="partnership-seperator"></div>
                </div>
                <div class="col-md-8 mb-4">
                    <p class="partnership-description">Kami sudah bekerjasama dengan berbagai lembaga terpercaya untuk dapat melayani anda dengan baik.</p>
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

<?php if (!empty($landing_testimonial) && $landing_testimonial == 1) { ?>
    <section class="testimonial">
        <div class="container">
            <div class="wrapper-testimonial">
                <h1 class="testimonial-title">Testimonial</h1>
                <div class="testimonial-seperator"></div>
                <div class="wrapper-vm">
                    <p class="testimonial-description">Apa kata mereka yang sudah menggunakan KiosHukum.id</p>
                    <a class="btn btn-view-more vm-lg" href="<?= base_url('testimonial'); ?>">View More</a>
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
                <a class="btn btn-view-more vm-sm" href="<?= base_url('testimonial'); ?>">View More</a>
            </div>
        </div>
    </section>
<?php } ?>

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