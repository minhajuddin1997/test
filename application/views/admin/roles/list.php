  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Roles</h1>
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div>

        </div>
        <?php if(in_array('createRoles', $this->permission)): ?>
          <a class="btn btn-info" href="<?php echo base_url('/admin/roles/add'); ?>">Create New Role</a>
        <?php endif; ?>
                <hr style="border-top: 1px solid #504444;" >
      </div><!-- /.container-fluid -->
    </section>          
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
           <div class="card-header">
                <h3 class="card-title">Roles</h3>
              </div>
              <div class="card-body">
                   <table id="table_id" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Role Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(!empty($records)):
            $x = 1;
            foreach($records as $record):
              ?>
              <tr data-id='<?php echo $record->role_id;?>'>
                <td><?php echo $x++;?></td> 
                <td><?php echo $record->role_name;?></td>
                <td>
                  <a href="<?php echo site_url('admin/roles/edit/'.$record->role_id.'');?>"><span style="border-radius:5px;" class="edit_icon"><i  class="fa fa-edit" aria-hidden="true"></i></span></a>
                  <?php 
                  if($record->role_id == 1 || $record->role_id == 2 || $record->role_id == 3 || $record->role_id == 4){ ?>

                  <?php } else { ?>
                  <a href="<?php echo site_url('admin/roles/delete/'.$record->role_id.'');?>">
                      <span style="border-radius:5px;" class="delete_icon"><i  class="fa fa-trash" aria-hidden="true"></i></span>
                  </a>
                  <?php } ?>
                </td>
             </tr> 
           <?php endforeach; endif;?>  
         </tbody>
       </table>
              </div>

                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
   
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>