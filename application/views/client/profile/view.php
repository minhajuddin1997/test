<div class="content-wrapper" style="min-height: 1416.81px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Client Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <!-- Profile Image -->
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background: url('<?php echo !empty($records->client_cover_image) ? base_url() . 'uploads/client/' . $records->client_cover_image : 'Not available'; ?>') center center;">
                <h3 class="widget-user-username text-right"><?php echo !empty($records->client_name) ? ucwords($records->client_name) : 'Not available'; ?></h3>
                <h5 class="widget-user-desc text-right"><?php echo !empty($records->role_id) ? ucwords($records->role_id) : 'Not available'; ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" style="border: 2px solid #000000;" src="<?php echo !empty($records->client_image) ? base_url() . 'uploads/client/' . $records->client_image : 'Not available'; ?>" alt="Client Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <?php $ticket = get_list('tickets', array('generated_by'=>$this->session->userdata('client_id'))); ?>
                      <h5 class="description-header"><?= !empty($ticket) ? count($ticket) : '0'; ?></h5>
                      <span class="description-text">TICKETS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <?php $contact = get_list('crm_contacts', array('client_id'=>$this->session->userdata('client_id'))); ?>
                      <h5 class="description-header"><?= !empty($contact) ? count($contact) : '0'; ?></h5>
                      <span class="description-text">CONTACTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <?php $project = get_list('client_projects', array('client_id'=>$this->session->userdata('client_id'))); ?>
                      <h5 class="description-header"><?= !empty($project) ? count($project) : '0'; ?></h5>
                      <span class="description-text">PROJECTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            <!-- /.widget-user -->
          </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header" id="tab_mod">
                <h3 class="card-title" >About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <strong><i class="fas fa-book mr-1"></i> Client Company</strong>

                <p class="text-muted">
                 <?php echo !empty($records->client_company) ? $records->client_company : 'Not available'; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">
                    <?php echo !empty($records->client_city) ? $records->client_city . ',' : 'Not available'; ?>
                    <?php echo !empty($records->client_state) ? $records->client_state . ',' : 'Not available'; ?>
                    <?php echo !empty($records->client_country) ? $records->client_country : 'Not available'; ?>

                </p>

                <hr>
                
                <strong><i class="fas fa-pencil-alt mr-1"></i> Client Address</strong>
                 <p class="text-muted"><?php echo !empty($records->client_address) ? $records->client_address : 'Not available'; ?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Date Of Join</strong>

                <p class="text-muted"><?php echo !empty($records->client_date) ? date('d-M-yy', strtotime($records->client_date)) : 'Not available'; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <?php if(!($this->session->userdata('role_id') == 1)): ?>
<!--                   <li class="nav-item"><a class="nav-link" href="#rem_payment" data-toggle="tab">Remaining Payments</a></li>
 -->                  <li class="nav-item"><a class="nav-link" href="#payments_paid" data-toggle="tab">Payments Paid</a></li>
<!--                   <li class="nav-item"><a class="nav-link" href="#invoices" data-toggle="tab">Invoices</a></li>
 -->                  <?php endif; ?>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                 <!-- Payments Paid -->
                <div class="tab-pane" id="payments_paid">
                
                </div>
                  <!-- Payment Paid End -->
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('client/profile/edit'); ?>/<?php echo $id; ?>" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="client_name" class="form-control" placeholder="User Name" value="<?php echo !empty($records->client_name)?$records->client_name:''?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="client_email" class="form-control" placeholder="Email" value="<?php echo !empty($records->client_email)?$records->client_email:''?>">
                        </div>
                      </div>
                      <div class="form-group row">
                         <label class="col-sm-2 col-form-label">Profile Image</label>
                         <div class="col-sm-10">

                          <div class="image-upload" >                      
                            <img class="imgpath" src="<?php echo !empty($records->client_image)?base_url('uploads/client/').$records->client_image:base_url('assets/img/placeholder.png')?>" style="width:100px;height:100px;border: 1px solid #E6B86A;">
                            <div class="file-btn">
                                <input type="file" id="client_image" name="client_image" value="<?php echo $records->client_image; ?>" >
                            </div>
                            </div>
                        </div>
                        <!--<label class="col-sm-2 col-form-label">Profile Image</label>-->
                        <!--<div class="col-sm-10">-->
                        <!--  <input type="file" name="user_image" class="form-control">-->
                        <!--</div>-->
                      </div>
                    <div class="form-group row">
                         <label class="col-sm-2 col-form-label">Cover Image</label>
                         <div class="col-sm-10">

                          <div class="image-upload" >                      
                            <img class="imgpath" src="<?php echo !empty($records->client_cover_image)?base_url('uploads/client/').$records->client_cover_image:base_url('assets/img/placeholder.png')?>" style="width:100px;height:100px;border: 1px solid #E6B86A;">
                            <div class="file-btn">
                                <input type="file" id="client_cover_image" name="client_cover_image" value="<?php echo $records->client_cover_image; ?>" >
                            </div>
                          </div>
                        </div>
                        <!--<label class="col-sm-2 col-form-label">Profile Image</label>-->
                        <!--<div class="col-sm-10">-->
                        <!--  <input type="file" name="user_image" class="form-control">-->
                        <!--</div>-->
                    </div>
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                          <input type="text" name="client_phone_number" id="client_phone_number" class="form-control" placeholder="Client Phone" value="<?php echo !empty($records->client_phone_number)?$records->client_phone_number:''?>">
                        </div>
                      </div>
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10  input-group" id="show_hide_password">
                          <input type="password" name="client_password" class="form-control" placeholder="Password Here"  value="<?php echo !empty($records->client_password)?$records->client_password:''?>">
                          
                          &nbsp;
                            <div class="input-group-addon">
                              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10 input-group" id="show_hide_password"> 
                          <input type="password" name="client_password" class="form-control" placeholder="Confirm Password Here" value="<?php echo !empty($records->client_password)?$records->client_password:''?>">
                            &nbsp;
                            <div class="input-group-addon">
                              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update Profile Settings</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#client_phone_number').mask('000-0000000');

      $("#show_hide_password a").on('click', function(event) {
          event.preventDefault();
          if($('#show_hide_password input').attr("type") == "text"){
              $('#show_hide_password input').attr('type', 'password');
              $('#show_hide_password i').addClass( "fa-eye-slash" );
              $('#show_hide_password i').removeClass( "fa-eye" );
          }else if($('#show_hide_password input').attr("type") == "password"){
              $('#show_hide_password input').attr('type', 'text');
              $('#show_hide_password i').removeClass( "fa-eye-slash" );
              $('#show_hide_password i').addClass( "fa-eye" );
          }
        });
    });

  </script>