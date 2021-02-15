<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>

<section class="header-faq">
    <p class="banner-lable">Kios Hukum.id</p>
    <h4 class="banner-title">Better Service with Us</h4>
    <form class="form-inline" action="/frequently_ask_question/search">
        <input class="form-control" type="text" name="q" placeholder="&#xF002;  Search Question">
        <button class="btn button-submit" type="submit">Search</button>
    </form>
    <p class="header-description">or choose a category to quickly find the help you need</p>
</section>


<section class="faq-body">
    <div class="container">
		<?php if(!isset($_GET['q'])) : ?>
        <ul class="nav nav-pills row gx-3" id="pills-tab" role="tablist">
            <?php $i = 0;
            foreach ($faq_category_data as $faq_category) { ?>
                <li class="nav-item col" role="<?= $faq_category->category_faq_slug ?>">
                    <a class="nav-link <?php if ($i == 0) {
                                            echo 'active';
                                        } ?>" id="<?= $faq_category->category_faq_slug ?>-tab" data-bs-toggle="pill" href="#<?= $faq_category->category_faq_slug ?>" role="tab" aria-controls="<?= $faq_category->category_faq_slug ?>" aria-selected="true" onclick="myfaq()">
                        <img src="<?= $faq_category->category_faq_icon ?>"><span><?= $faq_category->category_faq_name ?></span></a>
                </li>
            <?php $i++;
            } ?>
        </ul>
		<?=$faq?>
		
		<?php endif ?>
		
		<?php if(isset($_GET['q'])) :?>
		<p><a href="/frequently_ask_question">&laquo;  Back to FAQ page</a>
		<h3 class="text-center mb-4">Hasil Pencarian: <?=$_GET['q']?></h3>
		<?=$cari?>
		<?php endif?>
		<!--
        <div class="tab-content" id="pills-tabContent perizinan">
            <div class="tab-pane fade active show" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                <h5 class="tab-title">Perizinan</h5>
                <p class="tab-description">Pendirian PT, CV, FIRMA, KOPERASI, OSS DAN UMKM</p>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php foreach ($faq_data as $faq) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading<?= $faq->id ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $faq->id ?>" aria-expanded="false" aria-controls="flush-collapse<?= $faq->id ?>">
                                    <?= $faq->faq_question ?>
                                </button>
                            </h2>
                            <div id="flush-collapse<?= $faq->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $faq->id ?>" data-bs-parent="#accordionFlushExample" style="">
                                <div class="accordion-body"><?= $faq->faq_answer ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
		-->
    </div>
</section>


<section class="banner-ads">
    <div class="container">
        <div class="wrapper-banner">
            <div class="left">
                <p class="ads-title">
                    Indonesia court filing and process serving software for law
                    firms
                </p>
                <p class="ads-description">
                    Pellentesque habitant morbi tristique senectus et netus et
                    malesuada fames ac turpis egestas.
                </p>
            </div>
            <div class="right">
                <a class="btn button-ads" href="#">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>