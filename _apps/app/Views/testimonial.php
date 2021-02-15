<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
<section class="testimonial">
    <div class="container">
        <div class="wrapper-testimonial">
            <h1 class="testimonial-title">Testimonial</h1>
            <div class="testimonial-seperator"></div>
            <div class="wrapper-vm">
                <p class="testimonial-description">Apa kata mereka yang sudah menggunakan KiosHukum.id</p>
            </div>
            <div class="row gy-3 gx-3">
                <?php foreach ($testimonial_data as $testimoni) { ?>
                    <div class="col-md-6">
                        <div class="card item">
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
                    </div>
                <?php } ?>
                <div class="controls"></div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>