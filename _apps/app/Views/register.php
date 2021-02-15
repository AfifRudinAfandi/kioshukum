<?= $this->extend('layout/_template') ?>

<?= $this->section('content') ?>
 <section class="register-form">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                  <div class="wrapper-icon">
                      <img class="image-icon" src="../static/images/team2.jpg">
                      <img class="decore" src="../static/images/decore.svg">
                  </div>
                  <p class="quotes">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <h1 class="title">Join with Us, we will give you best!
                    Wherever you are</h1>
				
				<div id="messages"></div>
                
				<form id="form" method="post">
                  <div class="row wrapper-form-control">
                    <div class="col">
                      <label for="first-name" class="form-label">First Name</label>
                      <input type="text" name="first_name" class="form-control" placeholder="First name" id="first_name" required/>
                    </div>
                    <div class="col">
                      <label for="last-name" class="form-label">Last Name</label>
                      <input type="text" name="last_name" class="form-control" placeholder="Last name" id="last_name" required/>
                    </div>
                  </div>
                  <div class="row wrapper-form-control">
                    <div class="col">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" placeholder="mail@gmail.com" id="email" required/>
                    </div>
                    <div class="col">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="tel" name="phone" class="form-control" placeholder="+62" value="+62" id="phone" required/>
                    </div>
                  </div>

                  <div class="row wrapper-form-control">
                    <div class="col">
                      <label for="password" class="form-label">Password</label>
                      <div class="wrapper-password">
                        <input type="password" name="password" class="form-control password_input" placeholder="**********" id="password" minlength="5" required/>
                        <i class="preview_icon far fa-eye" id="togglePassword"></i>
                      </div>
                    </div>
                    <div class="col">
                      <label for="confirm" class="form-label">Confirm Password</label>
                      <div class="wrapper-password">
                        <input type="password" name="confirm_password" class="form-control password_input" placeholder="**********" id="confirm_password" minlength="5" required/>
                        <i class="preview_icon far fa-eye" id="togglePasswordConfirm"></i>
                      </div>
					  <span id='message_password'></span>
                    </div>
                  </div>
                  
                  <div id="loader" style="display:none; margin-bottom: 20px;"><i class="fa fa-spinner fa-spin fa-fw"></i> Please wait...</div>
				  
                  <button class="btn button-messages mb-4" type="submit">Register Now</button>
                  <p class="direct-link">Do you have an account? <a href="<?=base_url('account/login')?>">Login Here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </section>
<?= $this->endSection() ?>