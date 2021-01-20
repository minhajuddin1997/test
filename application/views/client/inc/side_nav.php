  <style>
      .layout-navbar-fixed.layout-fixed .wrapper .sidebar {
          margin-top:0px;
      }
  </style>
  <!-- Main Sidebar Container -->
  <?php $developer = $this->developer; ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(<?php echo $developer[0]['developer_nav_gradient']; ?>, <?php echo $developer[0]['developer_nav_color']; ?>);">
    <!-- Brand Logo -->
    <a href="#" >
      <center><img src="<?php echo base_url('uploads/developer/'); ?><?php echo $developer[0]['site_logo']; ?>" alt="Logo"  style="width:180px;"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('uploads/client/'); ?><?php echo get_value_by_id('client', $this->session->userdata('client_id'), 'client_image'); ?>" class="img-circle elevation-2" alt="User Image">
           <img src='<?php echo base_url('uploads/developer/'); ?>online_icon.png' style="width:9px;" >
        </div>
        <div class="info">
            <a href="#" class="d-block">
                <?php          
                  if($this->session->userdata('client_name')){    
                      echo $this->session->userdata('client_name');
                  }
                ?>
            </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>client/dashboard" class="nav-link <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right"></i>
              </p>
            </a>
          </li>
   <!--        <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  PROJECTS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->

          <li class="nav-item has-treeview <?php echo $this->uri->segment(2) == 'projects' ? 'menu-open' : ''; ?>">
              <?php if(in_array('createClientProjects', $this->permission) ) {  ?>

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Project Management
                <i class="fas fa-angle-left right"></i>
<!--                 <span class="badge badge-info right">6</span>
 -->              </p>
            </a>
          <?php } ?>
            <ul class="nav nav-treeview">
              <?php if(in_array('createClientProjects', $this->permission) || in_array('updateClientProjects', $this->permission) || in_array('deleteClientProjects', $this->permission) || 
                in_array('viewClientProjects', $this->permission)
              ) {  ?>
              <li class="nav-item">
               <a href="<?php echo base_url(); ?>client/projects/index" class="nav-link <?php echo $this->uri->segment(3) == 'index' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Projects</p>
                </a>
              </li>
              <?php } ?>
              <?php if(in_array('createClientProjects', $this->permission) ) {  ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>client/projects/add" class="nav-link <?php echo $this->uri->segment(3) == 'add' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Project</p>
                </a>
              </li>
               <?php } ?>
              <?php if(in_array('createClientProjects', $this->permission) ) {  ?>
              <li class="nav-item">
                <a href="<?php echo base_url('/client/projects/list/completed'); ?>" class="nav-link <?php echo $this->uri->segment(4) == 'completed' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects Completed</p>
                </a>
              </li>
              <?php } ?>
              <?php if(in_array('createClientProjects', $this->permission) ) {  ?>
              <li class="nav-item">
                 <a href="<?php echo base_url('/client/projects/list/pending'); ?>" class="nav-link <?php echo $this->uri->segment(4) == 'pending' ? 'active' : ''; ?>">                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Projects</p>
                </a>
              </li>
               <?php } ?>
               <?php if(in_array('createClientProjects', $this->permission) ) {  ?>
              <li class="nav-item">
                 <a href="<?php echo base_url('/client/kanban/index'); ?>" class="nav-link <?php echo $this->uri->segment(4) == 'pending' ? 'active' : ''; ?>">                  <i class="far fa-circle nav-icon"></i>
                  <p>Kanban Board</p>
                </a>
              </li>
               <?php } ?>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <?php if(in_array('viewCRM',$this->permission)) {  ?>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                  CRM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php } ?>
            <ul class="nav nav-treeview">
              <?php if(in_array('viewCircle', $this->permission)) {  ?>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Circles</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="<?php echo base_url('client/crm/contacts'); ?>" class="nav-link">
                  <i class="nav-icon far fa-circle"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <!--<li class="nav-item">-->
              <!--  <a href="pages/charts/flot.html" class="nav-link">-->
              <!--    <i class="far fa-circle nav-icon"></i>-->
              <!--    <p>User Types</p>-->
              <!--  </a>-->
              <!--</li>-->
              <!--<li class="nav-item">-->
              <!--  <a href="pages/charts/inline.html" class="nav-link">-->
              <!--    <i class="far fa-circle nav-icon"></i>-->
              <!--    <p>Inline</p>-->
              <!--  </a>-->
              <!--</li>-->
            </ul>
          </li>
          <li class="nav-item">
             <a href="<?php echo base_url('/client/tickets'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'tickets' ? 'active' : ''; ?>">  
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Tickets
              </p>
            </a>
          </li>
          <?php if(in_array('chat',$this->permission)) {  ?>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Chat</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?php echo base_url('client/tasks/index'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'tasks' ? 'active' : ''; ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Tasks</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('client/market'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'market' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tree"></i>
              <p>
            Market Place
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
        <?php //if(in_array('marketAnalytics', $this->permission)) {  ?>

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>

            Marketing Analytics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <?php //} ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('client/analytics/list'); ?>" class="nav-link <?php echo $this->uri->segment(3) == 'list' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('client/analytics'); ?>" class="nav-link <?php echo $this->uri->segment(3) == 'view' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Analytics</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if(in_array('fileManagement', $this->permission)) {  ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              File Management
           
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
          <?php if(in_array('viewChat', $this->permission) || in_array('accountManagement', $this->permission) ||
            in_array('viewBrandSettings', $this->permission)
              ) {  ?>
          <li class="nav-header">Other</li>
          <?php } ?>
          <?php if(in_array('viewChat', $this->permission)) {  ?>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                 Chat
 
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if(in_array('accountManagement', $this->permission)) {  ?>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                  Account Management
            
              </p>
            </a>
          </li>
           <?php } ?>
         <li class="nav-item has-treeview">
         <?php if(in_array('viewBrandSettings', $this->permission)) {  ?>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Brand Settings
           
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <?php } ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('/admin'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Main Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Story & Guide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inspiration</p>
                </a>
              </li>
            </ul>
          </li>
        <!--   <li class="nav-header">LABELS</li>
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