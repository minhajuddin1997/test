<div class="register-box">
  <div class="login-logo">
      <img src=<?php echo base_url() . 'uploads/developer/' . $developer->site_logo ?> class='login_logo' style="max-width:100% !important;">
  </div>

  <div class="card">
    <div class="card-body register-card-body" style="width:100%;">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?php echo base_url(); ?>front/register" method="post" style="margin-bottom:25px;">
        <div class="input-group mb-3">
          <input type="text" name="client_name" class="form-control" placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="client_email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="client_company" class="form-control" placeholder="Company">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-building"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="client_website" class="form-control" placeholder="Website (https://website.com)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-globe"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="hidden" name="client_login_detail" class="form-control" value="disable">
      
        </div>
<!--         <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col-4">
           
          </div>
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block" style="background-color:#E6B86A;border: 1px solid #E6B86A;color: white;">Join the Empire</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<!--       <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Join the E
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>
 -->

      <a href="<?php echo base_url('client/login'); ?>" class="text-center" style="color: #333;">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>