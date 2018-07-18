<!-- Log in Modal -->
<div class="modal fade auth-modal" id="logIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content join_now">
      <div class="modal-body">
        <figure class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cavalletti_logo.jpg" alt="image"></figure>
        <h2>Log in to Cavalletti</h2>
        <p class="j_fb"><a href="#">Log in with facebook</a></p>
        <p>Easily share with Facebook friends and family.</p>
        <p class="or-txt1"><strong>or</strong></p>
        <form id="login_form">
          <p class="status alert"></p>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter email address...">
          </div>
          <div class="form-group">
            <input name="password" class="form-control" type="password" data-toggle="password" placeholder="Enter Password...">
          </div>
          <div class="checkbox">
            <label>
              <input value="" type="checkbox" name="remember">
              <span>Remember me</span>
            </label>
          </div>
          <button type="submit" class="btn btn-default">Log In</button>
          <?php wp_nonce_field_without_id( 'ajax-auth-nonce', 'auth-nonce' ); ?>
        </form>
        <p class="text-center"><a href="#" data-toggle="modal" data-target="#forgotPwd" data-dismiss="modal"><strong>Forgot Your Password?</strong></a></p>
        <p class="text-center pad-top">Don't have an account yet? <a href="#" data-toggle="modal" data-target="#joinNow" data-dismiss="modal"><strong>Join Now</strong></a></p>
      </div>
    </div>
  </div>
</div>
<!-- Log in Modal -->

<!-- Forgot Password -->
<div class="modal fade auth-modal" id="forgotPwd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content join_now">
      <div class="modal-body">
        <figure class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cavalletti_logo.jpg" alt="image"></figure>
        <h2>Forgot your password?</h2>
        <p class="text-center">Please enter your registered email address and we'll send you a new password.</p>
        <form id="forgot">
          <p class="status alert"></p>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter email address...">
          </div>
          <button type="submit" class="btn btn-default">Get Password</button>
          <?php wp_nonce_field_without_id( 'ajax-auth-nonce', 'auth-nonce' ); ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Forgot Password -->

<!-- Join Now Modal -->
<div class="modal fade auth-modal" id="joinNow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content join_now">
      <div class="modal-body">
        <figure class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cavalletti_logo.jpg" alt="image"></figure>
        <h2>Join the Cavalletti Community.</h2>
        <p class="j_fb"><a href="#">Join with facebook</a></p>
        <p>Easily share with Facebook friends and family.</p>
        <p class="or-txt1"><strong>or</strong></p>
        <form id="join">
          <p class="status alert"></p>
          <div class="form-group">
            <input type="text" class="form-control" name="first_name" id="exampleInputName" placeholder="Enter your first name...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Enter your last name...">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter email address...">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="password" data-toggle="password" placeholder="Enter Password...">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" data-toggle="password" placeholder="Confirm Password...">
          </div>
          <div class="checkbox">
            <label>
              <input value="" type="checkbox" name="have_code">
              <span>I already have verification code</span>
            </label>
          </div>
          <button type="submit" class="btn btn-default">Join Now</button>
          <?php wp_nonce_field_without_id( 'ajax-auth-nonce', 'auth-nonce' ); ?>
        </form>
        <p class="text-center note">BY clicking 'Join Now' or 'Join with Facebook'. I acknowledge and agree to the <a href="/terms-and-conditions/"><strong>Terms of Use</strong></a> and <a href="#"><strong>Privacy Policy</strong></a></p>
        <p class="text-center note pad-top">Already have an account? <a href="#" data-toggle="modal" data-target="#logIn" data-dismiss="modal"><strong>Log in</strong></a></p>
      </div>
    </div>
  </div>
</div>
<!-- Join Now Modal -->

<!-- Join Now Verification Modal -->
<div class="modal fade auth-modal" id="joinowVerification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content jn_verification">
      <div class="modal-body">
        <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/msg-top-img.png" alt="image"></p>
        <h2>Just one more step</h2>        
        <p>Please verify your email address so you can sign in to your Cavalletti account. We’ve sent a confirmation email to:</p>
        <p class="email-btn"><a href="#">test@test.test</a></p>
        <div class="join_now">
          <form id="joinowVerificationForm">
            <p class="status alert"></p>
            <div class="form-group input-group">
              <input type="text" class="form-control" name="code" placeholder="Enter email verification code...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Verify</button>
              </span>
            </div>
            <?php wp_nonce_field_without_id( 'ajax-auth-nonce', 'auth-nonce' ); ?>
          </form>
        </div>
        <figure class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cavalletti_logo.jpg" alt="image"></figure>
        <p class="p4">If you don't receive an email, please check your SPAM folder or you can <a id="resend_confirmation" href="#">resend the confirmation email</a>.</p>
      </div>
    </div>
  </div>
</div>
<!-- Join Now Verification Modal -->

<!-- Join Now Success Modal -->
<div class="modal fade auth-modal" id="joinowSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content jn_success">
      <div class="modal-body">
        <p class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cong-img.png" alt="image"></p>
        <h2>Congratulations!</h2>
        <h4 class="text-center">You are now part of the Cavalletti Community.</h4>
        <p class="text-center">What would you like to do next?</p>
        <ul>
          <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/classified-add-icon.png" alt="image"> Place a classified ad</a></li>
          <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/promote-business-icon.png" alt="image"> Promote your business</a></li>
          <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/event-icon.png" alt="image"> Add an event</a></li>
          <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/profile_icon1.png" alt="image"> Complete your profile</a></li>
          <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/browse-icon.png" alt="image"> Browse cavalletti</a></li>
        </ul>
        <figure class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cavalletti_logo.jpg" alt="image"></figure>
      </div>
    </div>
  </div>
</div>
<!-- Join Now Success Modal -->
