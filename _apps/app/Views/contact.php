<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
<section class="banner banner-contact">
    <div class="container">
        <p class="banner-lable">Kios Hukum.id</p>
        <h1 class="banner-title">Better Service with Us</h1>
    </div>
</section>

<section class="customer-assistance">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="item-customer-assistance">
                    <div class="wrapper-icon">
                        <img class="icon-cs" src="<?= base_url() ?>/assets/static/images/customer-service.svg" />
                    </div>
                    <div class="wrapper-content">
                        <div class="wp-text-content">
                            <h5 class="item-title">Talk to Customer Care</h5>
                            <p class="item-description">free consutation with our friendly customer care.</p>
                        </div>
                        <button class="btn button-cs">Contact Customer Care</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="item-faq">
                    <div class="wrapper-icon">
                        <img class="icon-cs" src="<?= base_url() ?>/assets/static/images/question.svg" />
                    </div>
                    <div class="wrapper-content">
                        <div class="wp-text-content">
                            <h5 class="item-title">FAQ (frequently Ask Question)</h5>
                            <p class="item-description">information to know about our service and pricing.</p>
                        </div>
                        
                        <a href="<?= base_url('frequently_ask_question') ?>" class="btn button-cs">go to FAQ Pages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact">
    <div class="container">
        <div class="row gx-5">
            <div class="col-md-6">
                <div class="right">
                    <h1 class="title">Contact Us</h1>
                   
					<div id="messages"></div>
					
                    <form id="form" method="post">
                        <div class="row wrapper-form-control">
                            <div class="col">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First name" id="first-name" name="inquiry_name1" value="" required/>
                            </div>
                            <div class="col">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last name" id="last-name" name="inquiry_name2" value="" required/>
                            </div>
                        </div>
                        <div class="row wrapper-form-control">
                            <div class="col">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="mail@gmail.com" id="email" name="inquiry_email" value="" required />
                            </div>
                            <div class="col">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" placeholder="+62" id="phone" name="inquiry_phone" value="" required />
                            </div>
                        </div>

                        <div class="wrapper-form-control">
                            <label class="form-label mb-3">What offer that you want to convey?</label>
                            <div class="wrapper">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inquiry_type" id="inlineRadio1" value="Pendirian Usaha" required>
                                    <label class="form-check-label" for="inlineRadio1">Pendirian Usaha</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inquiry_type" id="inlineRadio2" value="Perlindungan Hukum" required>
                                    <label class="form-check-label" for="inlineRadio2">Perlindungan Hukum</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inquiry_type" id="inlineRadio3" value="Lain-lain" required>
                                    <label class="form-check-label" for="inlineRadio3">Lain-lain</label>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper-form-control">
                            <label for="massages" class="form-label">Messages</label>
                            <textarea class="form-control" id="massages" placeholder="Write your messages" rows="3" name="inquiry_message" required></textarea>
                        </div>
						
						<div id="loader" style="display:none; margin-bottom: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i> Please wait...</div>
						
                        <button class="btn button-messages" type="submit">Send Massages</button>
                    </form>

                </div>
            </div>
            <div class="col-md-6">
                <div class="left">
                    <h1 class="title">Kantor Kami</h1>
                    <div class="col">
                        <h5 class="sub-title">KiosHukum.id</h5>
                        <p class="direction">
                            Jakarta - <a href="https://goo.gl/maps/9kUshyWDikYzNF147">Direction Maps</a>
                        </p>
                        <p class="direction-detail">
                            Jl. Damarsari No.35A RT 009 RW 007 Kel. Jatipadang Kec. Pasar Minggu Jakarta Selatan 12510
                        </p>
                    </div>
                    <!-- <div class="col d-none">
                        <h5 class="sub-title">Office Bandung</h5>
                        <p class="direction">
                            Bandung - <a href="#">Direction Maps</a>
                        </p>
                        <p class="direction-detail">
                            Jl Watukencana 4, Bandung Jawa Barat
                        </p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partnership contact-us d-none">
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

<section class="banner-ads d-none">
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