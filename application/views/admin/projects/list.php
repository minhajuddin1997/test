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
          <a class="btn btn-info" href="<?php echo base_url('/admin/projects/create'); ?>">Create New</a>
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

                <h3 class="card-title"><?php echo ucwords($title); ?> Projects</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">

                <table class="table table-bordered table-striped" id="table_id">
              <thead>
                <tr style="margin: 0 auto;">
                  <th>S.No</th>
                  <th>Project Owner</th>
                  <th>Project Name</th>
                  <th>Project Type</th>
                  <th>Project Manager</th>
                  <th>Payment Due</th>
                  <th>Create Date</th>
                  <th>Phase</th>
                  <th width="4%">Discussion</th>
                  <th width="15%">Actions</th>
                </tr>
              </thead>
              <tbody>
                                <?php 
            if(!empty($records)):
              $x = 1;
              foreach($records as $record):
                ?>

                <?php 
                $comments_read = get_list('comments',array('project_id' =>$record->client_projects_id,"comments_read_admin"=>"unread"));
                (!empty($comments_read))? ($comments_read_count = count($comments_read)):($comments_read_count = 0);
                ?>

                <tr>
                  <td><?php echo $x++;?></td> 
                  <td><?php echo get_name_by_id('client',$record->client_id);?></td>
                  <td><?php echo $record->project_name;?></td>
                  <td><?php echo get_name_by_id('department',$record->project_type);?></td>
                  <td><?php echo !empty(get_name_by_id('client',$record->project_manager_id)) ? get_name_by_id('client',$record->project_manager_id) : '<span style="color:red;">Not Assigned</span>'; ?></td>
                    <td>  
                <!--       <input type="checkbox" <?php //echo  $record->payment_due == 'Yes'?"checked":'';?> data-id="<?php //echo $record->client_projects_id; ?>" data-toggle="toggle" class="payment_due" data-on="Yes" data-off="No" value="<?php // echo $record->payment_due;?>"></td> -->
                
                  <input type="checkbox" data-on="Yes" data-off="No" name="payment_due" data-toggle="toggle" data-id="<?php echo $record->client_projects_id; ?>" value="<?php echo $record->payment_due; ?>" class="payment_due" <?php echo ($record->payment_due == 'Yes') ? 'checked' : ''; ?>>
                  </td>
                  <td><?php echo date("d-m-Y",strtotime($record->client_projects_date));?></td>

                  <td><?php echo $record->delivery_status;?></td>

                  
                  <td>
                    <a href="<?php echo site_url('admin/chat/details/'.$record->client_projects_id.'');?>">
                      <span class="btn btn-info" style="border-radius:15px;">Details</span>
                    </a>
                    <?php if($comments_read_count > 0): ?>
                      <a href="<?php echo site_url('admin/chat/details/'.$record->client_projects_id.'');?>"><span style="background:#4d8e4d;border-radius:5px;color:white;padding:5px;" class="view_icon">
                        <b><?php echo (!empty($comments_read_count))? $comments_read_count:0; ?></b>&nbsp;Comment</a>
                        <?php else: ?>
                        <?php endif; ?>
                      
                    </td>

                      <td>

                        <?php if($record->complete_status == "completed"): ?>
                          <a href="<?php echo base_url('admin/projects/convert_to_completed/'.$record->client_projects_id.'');?>"><span style="background:#d4784e;border-radius:5px;padding:0.4rem;color:white;" class="view_icon">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Pending</span></a>
                            <?php else: ?>
                              <a href="<?php echo site_url('admin/projects/convert_to_pending/'.$record->client_projects_id.'');?>"><span style="background:#039e5e;border-radius:5px;padding:0.4rem;color:white;" class="view_icon">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;Completed</span></a>
                              <?php endif; ?>


                              <a href="<?php echo site_url('admin/projects/edit/'.$record->client_projects_id.'');?>"><span style="border-radius:5px;" class="edit_icon"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                              <a href="<?php echo site_url('admin/projects/del/'.$record->client_projects_id.'');?>"><span style="border-radius:5px;" class="delete_icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                            </td>
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