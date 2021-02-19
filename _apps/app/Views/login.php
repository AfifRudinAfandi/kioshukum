<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
      <section class="register-form">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                  <div class="wrapper-icon">
                      <img class="image-icon" src="<?= base_url() ?>/assets/static/images/team2.jpg">
                      <img class="decore" src="<?= base_url() ?>/assets/static/images/decore.svg">
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
                  <div class="wrapper-form-control">
                    <div class="col">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" placeholder="mail@gmail.com" id="email" required/>
                    </div>
                  </div>
                  <div class="wrapper-form-control">
                    <div class="col">
                      <label for="password" class="form-label">Password</label>
                      <div class="wrapper-password">
                        <input type="password" name="password" class="form-control password_input" placeholder="**********" id="password" required/>
                        <i class="preview_icon far fa-eye" id="togglePassword"></i>
                      </div>
                    </div>
                    <a class="forgot" href="#">Forgot Password?</a>
                  </div>
				  
				  <div id="loader" style="display:none; margin-bottom: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i> Please wait...</div>

                  <button class="btn button-messages mb-4" type="submit">Log In Now</button>
                  <p class="direct-link">Don’t have an account? <a href="<?=base_url('account/register')?>">Register</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </section>
<?= $this->endSection() ?>