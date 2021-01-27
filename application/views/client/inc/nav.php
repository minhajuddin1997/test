<!-- Navbar -->
  <?php $developer = $this->developer;

   ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: linear-gradient(<?php echo !empty($developer[0]['front_nav_color']) ? $developer[0]['front_nav_color'] : 'none'; ?>,<?php echo !empty($developer[0]['front_nav_gradient']) ? $developer[0]['front_nav_gradient'] : 'none'; ?>)">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('/client/profile/index'); ?>/<?php echo $this->session->userdata('client_id'); ?>" class="nav-link">Profile</a>
      </li>
      <?php if(!empty($this->cart->contents())): ?>
      <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('client/market/view_cart'); ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> 
            View Cart (<?php echo count($this->cart->contents()); ?>)</a>
      </li>
      <?php endif; ?>
      <?php print_r($this->session->userdata('data_session')); ?>
    </ul>

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3">-->
    <!--  <div class="input-group input-group-sm">-->
    <!--    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">-->
    <!--    <div class="input-group-append">-->
    <!--      <button class="btn btn-navbar" type="submit">-->
    <!--        <i class="fas fa-search"></i>-->
    <!--      </button>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
<!--             <span class="float-right text-muted text-sm">3 mins</span>
 -->          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 comments
          </a>
  <!--         <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
 -->          </a>
      <!-- <div class="dropdown-divider"></div> -->
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <!--<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i-->
        <!--    class="fas fa-th-large"></i></a>-->
      </li>
      <li>
        <div class='btn btn-info' ><a href='<?php echo base_url(); ?>client/logout' >Log Out</a></div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
