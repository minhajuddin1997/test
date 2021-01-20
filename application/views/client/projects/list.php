  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>

        </div>
          <?php if(in_array('createClientProjects', $permission) ) {  ?>
          <a class="btn btn-info" href="<?php echo base_url('/client/projects/add'); ?>">Create New</a>
          <?php } ?>
                <hr style="border-top: 1px solid #504444;" >
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <h3 class="card-title">All Projects</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">

                       <table class="table table-bordered table-striped" id="table_id">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Type</th>
              <th>Project Manager</th>
              <th>Status</th>
              <th>Pay Status</th>
              <th width="10%">Brief Form</th>
              <th>Progress</th>
              <th>Due Date</th>
              <th width="10%">Discussion</th>
              <!--<th width="2%">Actions</th>-->
            </tr>
          </thead>
          <tbody>
            <?php 
            if(!empty($records)):
              $x = 1;
              foreach($records as $record):
                ?>

                <?php 
                $comments_read = get_list('comments',array('project_id' =>$record->client_projects_id,"comments_read_client"=>"unread"));

                (!empty($comments_read))? ($comments_read_count = count($comments_read)):($comments_read_count = 0);
                ?>
                <tr>
                  <td><?php echo $x++;?></td> 
                  <td><?php echo $record->project_name;?></td>
                  <td><?php echo get_name_by_id('department',$record->project_type);?></td>
                  <td><?php echo !empty(get_name_by_id('client',$record->project_manager_id)) ? get_name_by_id('client',$record->project_manager_id) : '<span style="color:red" >Not Assigned</span>'; ?></td>
                  <td><?php echo ucwords($record->complete_status);?></td>

                  <td>  
                      <?php 
                      if($record->payment_due == 'Yes'){ ?>
                        <center><button type='button' class='btn btn-info' style='background: #d4784e;border:1px solid #d4784e;'><a style='color:white !important;' href="<?php echo base_url('client/projects/pay/'); ?><?php echo !empty($record->project_brief_id) ? $record->project_brief_id : 'NULL'; ?>">Pay</a></button></center>
                      <?php } else { echo "<center><p class='btn btn-info' style='background: #048c3a;border:1px solid #048c3a;'><a style='color:white !important;' >Paid</p></center>"; } ?>
                      </td>
                  <td>
                    <?php if($record->project_brief_id){ ?>
                      <center><a href="<?php echo base_url('client/projects/'); ?>view_brief_form/<?php echo $record->project_brief_id; ?>" target="_blank"><span style="background:#E6B86A;border-radius:15px" class="btn btn-info">View</span></a></center>
                    <?php } else {  ?>
                      <center><a href="<?php echo base_url('client/projects/'); ?>submit_brief_form/<?php echo $record->client_projects_id; ?>"><span style="background:#E6B86A;border-radius:15px" class="btn btn-info">Add Brief</span></a></center>
                    <?php } ?>
                  </td>
                  <td class="project_progress">
                      <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="<?php echo $record->complete_status == 'Completed' ? '100' : '0'; ?>"  aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                              </div>
                          </div>
                          
                        <small>
                              <?php 
                                if($record->complete_status == 'Completed'): echo '100% Complete'; else: echo '0% complete'; endif; 

                              ?>
                        </small>
                  </td>
                  <td><?php echo !empty($record->project_due_date) ? $record->project_due_date : 'Not mentioned';?></td>
                
                    <td>
                      <center>
                      <a href="<?php echo site_url('client/chat/details/'.$record->client_projects_id.'');?>">
                        <span class="btn btn-info" >Details</span>
                      </a>
                      </center>
                      <?php if($comments_read_count > 0): ?>
                        <center><a href="<?php echo site_url('client/chat/details/'.$record->client_projects_id.'');?>"><span style="background:#4d8e4d;border-radius:5px;color:white;padding:5px;" class="view_icon">
                          <?php echo (!empty($comments_read_count))? $comments_read_count:0; ?>&nbsp;Comment</a></center>
                          <?php else: ?>
                          <?php endif; ?>
                        </td>
                    <!--<td><a href="https://myprojectstaging.com/dynisty/admin/projects/edit/129"><span style="border-radius:5px;" class="edit_icon"><i class="fa fa-edit" aria-hidden="true"></i></span></a></td>-->
                      </tr> 
                    <?php endforeach; endif;?>  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>