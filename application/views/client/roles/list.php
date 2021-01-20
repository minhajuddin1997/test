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
          <a class="btn btn-info" href="<?php echo base_url('/client/roles/add'); ?>">Create New Role</a>
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
            <?php if(in_array('editRoles', $this->permission) || in_array('deleteRoles', $this->permission)): ?>
                <th>Actions</th>
            <?php endif; ?>
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
                <?php if(in_array('editRoles', $this->permission) || in_array('deleteRoles', $this->permission)): ?>
                <td>
                  <?php if(in_array('editRoles', $this->permission)): ?>
                    <a href="<?php echo site_url('client/roles/edit/'.$record->role_id.'');?>"><span style="border-radius:5px;" class="edit_icon"><i  class="fa fa-edit" aria-hidden="true"></i></span></a>
                  <?php endif; ?>
                  <?php if(in_array('deleteRoles', $this->permission)): ?>
                    <?php 
                    if($record->role_id == 1 || $record->role_id == 2 || $record->role_id == 3 || $record->role_id == 4){ 
                    
                     } else {?>
                    <a href="<?php echo site_url('client/roles/delete/'.$record->role_id.'');?>"><span style="border-radius:5px;" class="delete_icon"><i  class="fa fa-trash" aria-hidden="true"></i></span></a>
                    <?php } ?>
                  <?php endif; ?>
                </td>
                <?php endif; ?>
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