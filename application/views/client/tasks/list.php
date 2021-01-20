  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tasks</h1>
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tasks</li>
            </ol>
          </div>

        </div>
          <?php if(in_array('createClientProjects', $permission) ) {  ?>
          <a class="btn btn-info" href="<?php echo base_url('/client/tasks/add'); ?>">Create New</a>
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

                <h3 class="card-title">All Tasks</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">

                       <table class="table table-bordered table-striped" id="table_id">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Title</th>
              <th>Project</th>
              <th>Priority</th>
              <th>Phase</th>
              <th>Due Date</th>
              <th>Status</th>
              <th>Options</th>
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
                  <td><?php echo $record->task_name;?></td>
                  <td><?php echo get_value_by_id('client_projects',$record->client_projects_id, 'project_name');?></td>
                  <td><?php echo $record->priority; ?></td>
                  <td><?php echo !empty($record->phase_id) ? $record->phase_id : 'Not Found'; ?></td>
                  <td><?php echo !empty($record->due_date) ? $record->due_date : 'Not mentioned';?></td>
                  <td>  
                    <?php echo $record->status;?>
                  </td>
                <td>
                    <a href="<?php echo base_url('client/tasks/edit/'); ?><?php echo $record->projects_tasks_id; ?>"><span style="border-radius:5px;" class="edit_icon"><i class="fa fa-edit" aria-hidden="true"></i></span></a> 
                    <a href="<?php echo base_url('client/tasks/delete/'); ?><?php echo $record->projects_tasks_id; ?>"><span style="border-radius:5px;" class="delete_icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
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