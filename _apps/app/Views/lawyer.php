<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
<section class="banner banner-lawyers-detail">
    <div class="container">
        <div class="wrapper-banner-detail">
        <img class="banner-profile" src="<?= $lawyer[0]['lawyer_avatar'] ?>" />
        <div class="wrapper-banner-description">
            <h1 class="banner-title"><?= $lawyer[0]['lawyer_name'] ?></h1>
            <div class="wrapper-experiance">
            <p class="banner-description"><?= $lawyer[0]['lawyer_category_name'] ?></p>
            <span class="mx-3">|</span>
            <p class="profile-experience">
                <i class="fas fa-check-circle"></i><?= $lawyer[0]['lawyer_experien'] ?>
            </p>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="profile-services">
    <div class="container">
        <div class="wrapper-services">
        <h1 class="profile-services-title">Profile</h1>
        <p class="profile-services-description">
            <?= $lawyer[0]['lawyer_profile'] ?>
        </p>
        <div class="row profile-identity">
            <div class="col-md-3">
            <h5 class="head-profile-identity">Office Address</h5>
            <!-- <p class="direction">Jakarta - <a href="#">Direct Maps</a></p> -->
            <p class="address-detail">
                <?= $lawyer[0]['lawyer_office'] ?>
            </p>
            </div>
            <div class="col-md-3">
            <h5 class="head-profile-identity">Pengalaman</h5>
            <ul>
                <li class="list-identity"><?= $lawyer[0]['lawyer_experien'] ?></li>
            </ul>
            </div>
            <div class="col-md-3">
            <h5 class="head-profile-identity">Legalitas</h5>
            <ul>
                <li class="list-identity"><?= $lawyer[0]['lawyer_legality'] ?></li>
            </ul>
            </div>
            <div class="col-md-3">
            <h5 class="head-profile-identity">Pendidikan</h5>
            <p><?= $lawyer[0]['lawyer_study'] ?></p>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="other-lawyers">
    <div class="container">
        <h1 class="team-title">Other Lawyers</h1>
        <div class="lawyers-seperator"></div>
        <div class="row">
            <?php foreach ($outher_lawyer as $ol) { ?>
            <div class="col-md-3">
                <a class="lawyers-item" href="<?=base_url()?>/lawyer/<?= $ol->lawyer_slug ?>">
                <img class="profile-team" src="<?= $ol->lawyer_avatar ?>" />
                <p class="profile-name"><?= $ol->lawyer_name ?></p>
                <p class="profile-experience">
                    <i class="fas fa-check-circle"></i><?= $ol->lawyer_experien ?>
                </p>
                <p class="lable-lawyers"><?= $ol->lawyer_category_name ?></p>
                </a>
            </div>
            <?php } ?>
        </div>
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