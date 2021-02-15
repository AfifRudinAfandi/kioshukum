<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
<div class="dashboard-sub-nav mt-5 pt-5">
        <ul class="nav nav-pills nav-fixed" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><img class="ic-nav-dashboard" src="../assets/static/images/dashboard.svg"><span>Home</span></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-history-tab" data-bs-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false"><img class="ic-nav-dashboard" src="../assets/static/images/doughnut_chart.svg"><span>History</span></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-payment-tab" data-bs-toggle="pill" href="#pills-payment" role="tab" aria-controls="pills-payment" aria-selected="false"><img class="ic-nav-dashboard" src="../assets/static/images/credit_card.svg"><span>Payment</span></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-faq-tab" data-bs-toggle="pill" href="#pills-faq" role="tab" aria-controls="pills-faq" aria-selected="false"><img class="ic-nav-dashboard" src="../assets/static/images/ic-info.svg"><span>FAQ</span></a>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane home fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="wrapper-left">
                    <h1 class="left-title">Welcome,</h1>
                    <p class="left-content">Kioshukum.id memberikan solusi bantuan layanan hukum dan perizinan berbasis aplikasi</p>
                    <a class="btn button-left" href="#">go to FAQ Pages</a>
                    <img class="absolute-image" src="../assets/static/images/undraw_Login.svg">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wrapper-right">
                    <h3 class="right-title">Dapatkan promo terbaik layanan hukum dan pendirian usaha</h3>
                    <a class="btn button-right" href="#">Contact Customer Care</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane history fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="wrapper-left">
                    <p class="left-title">Proses Pelayanan</p>
                    <ul class="history-list mb-5 pb-5">
                      <li class="list-item">
                        <a class="item-link" href="#">
                          <div class="wrapper-icon">
                            <i class="far fa-file"></i>
                          </div>
                          <div class="wrapper-item mx-3">
                            <p class="description-list">Permohonan layanan Pendirian PT diterima</p>
                            <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <span>On Progress</span></p>
                          </div>
                        </a>
                      </li>
                      <li class="list-item">
                        <a class="item-link" href="#">
                          <div class="wrapper-icon">
                            <i class="far fa-file"></i>
                          </div>
                          <div class="wrapper-item mx-3">
                            <p class="description-list">Permohonan Perlindungan Hukum</p>
                            <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <span>Complete</span></p>
                          </div>
                        </a>
                      </li>
                    </ul>
                    <ul class="history-track">
                      <li class="track-list">
                        <div class="wrapper-icon">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="wrapper-item mx-3">
                          <p class="description-list">Permohonan layanan Pendirian PT diterima</p>
                          <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <a href="#">Download File</a></p>
                        </div>
                      </li>
                      <li class="track-list">
                        <div class="wrapper-icon">
                          <i class="far fa-credit-card"></i>
                        </div>
                        <div class="wrapper-item mx-3">
                          <p class="description-list">Pembayaran Termin 1 Pemohonan Pendirian PT</p>
                          <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <a href="#">download invoice</a></p>
                        </div>
                      </li>
                      <li class="track-list">
                        <div class="wrapper-icon">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="wrapper-item mx-3">
                          <p class="description-list">Pembuatan Akta Notaris Pendirian PT</p>
                          <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <a href="#">Download File</a></p>
                        </div>
                      </li>
                      <li class="track-list">
                        <div class="wrapper-icon">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="wrapper-item mx-3">
                          <p class="description-list">Pembuatan NPWP Badan/PT</p>
                          <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <a href="#">Download File</a></p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wrapper-right">
                    <img class="right-image" src="../assets/static/images/undraw_Login.svg">
                    <h1 class="right-title">Welcome,</h1>
                    <p class="right-content">Kioshukum.id memberikan solusi bantuan layanan hukum dan perizinan berbasis aplikasi</p>
                    <a class="btn right-button" href="#">go to FAQ Pages</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane payment fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="wrapper-left">
                    <p class="left-title">Proses Pelayanan</p>
                    <ul class="payment-list mb-5 pb-5">
                      <li class="list-item">
                        <div class="wrapper-icon">
                          <i class="far fa-credit-card"></i>
                        </div>
                        <div class="wrapper-item mx-3">
                          <p class="description-list">Pembayaran Termin 1 Pemohonan Pendirian PT</p>
                          <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <span>Dalam Proses</span></p>
                        </div>
                        <a class="link-invoice mx-auto" href="#">
                          <i class="fa fa-arrow-down"></i><span>invoice</span>
                        </a>
                      </li>
                      <li class="list-item">
                        <div class="wrapper-icon">
                          <i class="far fa-credit-card"></i>
                        </div>
                        <div class="wrapper-item mx-3">
                          <p class="description-list">Pembayaran Termin 1 Pemohonan Pendirian PT</p>
                          <p class="date-status">26 Des 2020 <i class="fas fa-circle"></i> <span>Dalam Proses</span></p>
                        </div>
                        <a class="link-invoice mx-auto" href="#">
                          <i class="fa fa-arrow-down"></i><span>invoice</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wrapper-right">
                    <img class="right-image" src="../assets/static/images/undraw_Login.svg">
                    <h1 class="right-title">Welcome,</h1>
                    <p class="right-content">Kioshukum.id memberikan solusi bantuan layanan hukum dan perizinan berbasis aplikasi</p>
                    <a class="btn right-button" href="#">go to FAQ Pages</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane faq fade show active" id="pills-faq" role="tabpanel" aria-labelledby="pills-faq-tab">
            
            <section class="header-faq">
              <p class="banner-lable">Kios Hukum.id</p>
              <h4 class="banner-title">Better Service with Us</h4>
              <form class="form-inline" action="#">
                <input class="form-control" type="text" placeholder="&#xF002;   ask a question . . .">
                <button class="btn button-submit" type="submit">Search</button>
              </form>
              <p class="header-description">or choose a category to quickly find the help you need</p>
            </section>
      
            <section class="faq-body">
              <div class="container">
                <ul class="nav nav-pills row mt-0" id="pills-tab" role="tablist">
                  <li class="nav-item col" role="presentation">
                    <a class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">
                      <img src="../assets/static/images/file.svg"><span>Perizinan</span></a>
                  </li>
                  <li class="nav-item col-md-2" role="presentation">
                    <a class="nav-link" id="pills-2-tab" data-bs-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><img src="../assets/static/images/bag.svg"><span>Ketenagakerjaan</span></a>
                  </li>
                  <li class="nav-item col" role="presentation">
                    <a class="nav-link" id="pills-3-tab" data-bs-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false"><img src="../assets/static/images/tag.svg"><span>HAKI (Copyright)</span></a>
                  </li>
                  <li class="nav-item col" role="presentation">
                    <a class="nav-link" id="pills-4-tab" data-bs-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false"><img src="../assets/static/images/justice.svg"><span>PROBONO</span></a>
                  </li>
                  <li class="nav-item col" role="presentation">
                    <a class="nav-link" id="pills-5-tab" data-bs-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false"><img src="../assets/static/images/goverment.svg"><span>Goverment service</span></a>
                  </li>
                </ul>
      
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                    <h5 class="tab-title">Perizinan</h5>
                    <p class="tab-description">Pendirian PT, CV, FIRMA, KOPERASI, OSS DAN UMKM</p>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Persyaratan apa saja yang harus di penuhi?
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Bagaimana alur permintaan pelayanan perizinan di kioshukum.co.id
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Berapa lama waktu kepengurusan izin?
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            Apa saja layanan yang di dapatkan oleh pelanggan?
                          </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                            apakah ada layanan konsultasi sebelum melakukan permintaan bantuan hukum?
                          </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                    <h5 class="tab-title">Ketenagakerjaan</h5>
                    <p class="tab-description">Pelayanan Ketenagakerjaan untuk masyarakat umum.</p>
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading1b">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1b" aria-expanded="false" aria-controls="flush-collapse1b">
                            Persyaratan apa saja yang harus di penuhi?
                          </button>
                        </h2>
                        <div id="flush-collapse1b" class="accordion-collapse collapse" aria-labelledby="flush-heading1b" data-bs-parent="#accordionFlushExample2">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading2b">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2b" aria-expanded="false" aria-controls="flush-collapse2b">
                            Bagaimana alur permintaan pelayanan perizinan di kioshukum.co.id
                          </button>
                        </h2>
                        <div id="flush-collapse2b" class="accordion-collapse collapse" aria-labelledby="flush-heading2b" data-bs-parent="#accordionFlushExample2">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading3b">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3b" aria-expanded="false" aria-controls="flush-collapse3b">
                            Berapa lama waktu kepengurusan izin?
                          </button>
                        </h2>
                        <div id="flush-collapse3b" class="accordion-collapse collapse" aria-labelledby="flush-heading3b" data-bs-parent="#accordionFlushExample2">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading4b">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4b" aria-expanded="false" aria-controls="flush-collapse4b">
                            Apa saja layanan yang di dapatkan oleh pelanggan?
                          </button>
                        </h2>
                        <div id="flush-collapse4b" class="accordion-collapse collapse" aria-labelledby="flush-heading4b" data-bs-parent="#accordionFlushExample2">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading5b">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5b" aria-expanded="false" aria-controls="flush-collapse5b">
                            apakah ada layanan konsultasi sebelum melakukan permintaan bantuan hukum?
                          </button>
                        </h2>
                        <div id="flush-collapse5b" class="accordion-collapse collapse" aria-labelledby="flush-heading5b" data-bs-parent="#accordionFlushExample2">
                          <div class="accordion-body">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                    <h5 class="tab-title">HAKI (Copyright)</h5>
                    <p class="tab-description">Pelayanan pendaftaran Haki dan paten</p>
                  </div>
                  <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                    <h5 class="tab-title">Probono</h5>
                    <p class="tab-description">Pelayanan probono untuk masyarakat umum.</p>
                  </div>
                  <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                    <h5 class="tab-title">Goverment service</h5>
                    <p class="tab-description">Pelayanan perlindungan hukum untuk perusahaan.</p>
                  </div>
                </div>
              </div>
            </section>
            
          </div>
        </div>
      </div>
<?= $this->endSection() ?>