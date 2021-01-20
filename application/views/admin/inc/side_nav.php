  <!-- Main Sidebar Container -->
  <?php $developer = $this->developer; ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(<?php echo $developer[0]['developer_nav_gradient']; ?>, <?php echo $developer[0]['developer_nav_color']; ?>);">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('uploads/developer/'); ?><?php echo $developer[0]['site_logo']; ?>" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dynasti Branding</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="#" class="img-circle elevation-2" alt="User Image">
          <img src="<?php echo base_url('uploads/developer/'); ?>online_icon.png" style="width:9px;" >
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin
          </a>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php echo $this->uri->segment(2) == 'projects' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Project Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              if(in_array('createClientProjects', $this->permission)) {  ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/projects/create" class="nav-link <?php echo $this->uri->segment(3) == 'create' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Project</p>
                </a>
              </li>
              <?php } ?>
              <?php if(in_array('createClientProjects', $this->permission)) {  ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/projects/index" class="nav-link <?php echo $this->uri->segment(3) == 'index' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Projects</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="<?php echo base_url('/admin/projects/list/completed'); ?>" class="nav-link <?php echo $this->uri->segment(4) == 'completed' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects Completed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('/admin/projects/list/pending'); ?>" class="nav-link <?php echo $this->uri->segment(4) == 'pending' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Projects</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if(in_array('chat', $this->permission)) {  ?>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Chat</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?php echo base_url('/admin/tickets'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'tickets' ? 'active' : ''; ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Tickets</p>
            </a>
          </li>
          <?php if(in_array('viewCRM', $this->permission)):  ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                  CRM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php if(in_array('viewCircle', $this->permission)):  ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Circles</p>
                </a>
              </li>
            </ul>
            <?php endif;  ?>
          </li>
          <?php endif; ?>
          <?php if(in_array('viewMarketPlace', $this->permission)):  ?>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('admin/market'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'market' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tree"></i>
              <p>
            Market Place
                <i class="fas  right"></i>
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(in_array('viewMarketAnalytics', $this->permission)):  ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Marketing Analytics
              <i class="fas right"></i>
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(in_array('createFileManagement', $this->permission) && in_array('updateFileManagement', $this->permission) && in_array('viewFileManagement', $this->permission) && in_array('deleteFileManagement', $this->permission)) {  ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                File Management
                <i class="fas right"></i>
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item"> 
            <a href="<?php echo base_url(); ?>admin/roles" class="nav-link <?php echo $this->uri->segment(2) == 'roles' ? 'active' : ''; ?>" class="nav-link">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                 Roles
              </p>
            </a>
          </li>
          <?php if(in_array('viewChat', $this->permission) || in_array('accountManagement', $this->permission) ||
            in_array('viewBrandSettings', $this->permission)
              ) {  ?>
          <li class="nav-header">Others</li>
        <?php } ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                 Chat
              </p>
            </a>
          </li>
          <?php if(in_array('viewUser', $this->permission)): ?>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/account/index'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'account' ? 'active' : ''; ?>">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Account Management
                </p>
              </a>
            </li>
          <?php endif; ?>
         <li class="nav-item has-treeview <?php echo $this->uri->segment(2) == 'developer' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Brand Settings
           
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('/admin/developer'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'developer' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Story & Guide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inspiration</p>
                </a>
              </li>
            </ul>
          </li>
     <!--      <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>