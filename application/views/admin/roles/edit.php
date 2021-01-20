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
          <a class="btn btn-info" href="<?php echo base_url('admin/roles/add'); ?>">Create New Role</a>
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
                  <form role="form" action="<?php echo base_url('admin/roles/edit'); ?>/<?php echo $records; ?>
"
                  method="post" enctype="multipart/form-data">
                <div class="box-body">


                    <div class="form-group">
                        <label>Role Name (Required)</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" value="<?php echo !empty($permission[0]['role_name'])?$permission[0]['role_name']:'' ?>" required>
                        <?php echo form_error('role_name', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <?php

                        $permission = json_decode($permission[0]['role_permission']);

                    ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <?php echo form_error('role_permission[]', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Modules</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Users</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createUser',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createUser"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateUser',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateUser"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewUser',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewUser"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteUser',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteUser"></td>
                                    </tr>
                                    <tr>
                                        <td>Roles</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createRoles',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createRoles"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('editRoles',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="editRoles"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewRoles',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewRoles"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteRoles',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteRoles"></td>
                                    </tr>
                                    <tr>
                                        <td>Client</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createClient',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createClient"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateClient',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateClient"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewClient',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewClient"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteClient',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteClient"></td>
                                    </tr>
                                    <tr>
                                        <td>CRM</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createCRM',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createCRM"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateCRM',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateCRM"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewCRM',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewCRM"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteCRM',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteCRM"></td>
                                    </tr>
                                      <tr>
                                        <td>Circles</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createCircle',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createCircle"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateCircle',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateCircle"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewCircle',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewCircle"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteCircle',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteCircle"></td>
                                    </tr>
                                     <tr>
                                        <td>Market Place</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewMarketPlace',$permission) ? 'checked' : '') ?> id="role_permission" value="viewMarketPlace"></td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing Analytics</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewMarketAnalytics',$permission) ? 'checked' : '') ?> id="role_permission" value="viewMarketAnalytics"></td>
                                        <td>-</td>
                                    </tr>
                           <!--          <tr>
                                        <td>Marketing Analytics</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php //echo (in_array('createDesignation',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createDesignation"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php //echo (in_array('updateDesignation',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateDesignation"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php //echo (in_array('viewDesignation',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewDesignation"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php //echo (in_array('deleteDesignation',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteDesignation"></td>
                                    </tr> -->
                                    <tr>
                                        <td>File Management</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createFileManagement',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createFileManagement"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateFileManagement',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateFileManagement"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewFileManagement',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewFileManagement"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteFileManagement',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteFileManagement"></td>
                                    </tr>
                                    <tr>
                                        <td>Client Projects</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createClientProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createClientProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateClientProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateClientProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewClientProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewClientProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteClientProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteClientProjects"></td>
                                    </tr>
                                    <tr>
                                        <td>Assign Projects</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createAssignProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createAssignProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateAssignProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateAssignProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewAssignProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewAssignProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteAssignProjects',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteAssignProjects"></td>
                                    </tr>
                                    <tr>
                                        <td>Assign Resources</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createAssignResources',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createAssignResources"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateAssignResources',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateAssignResources"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewAssignResources',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewAssignResources"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteAssignResources',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteAssignResources"></td>
                                    </tr>
          
                                    <tr>
                                        <td>Payment</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('createPayment',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="createPayment"></td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewPayment',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewPayment"></td>
                                        <td> - </td>
                                    </tr>
             
                                    <tr>
                                        <td>Support</td>
                                        <td> -</td>
                                        <td> -</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewSupport',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="viewSupport"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('deleteSupport',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="deleteSupport"></td>
                                    </tr>
       <!--                              <tr>
                                        <td>Developer</td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" <?php //echo (in_array('updateDeveloper',$permission) ? 'checked' : '') ?> id="role_permission"
                                                   value="updateDeveloper"></td>
                                        <td> - </td>
                                        <td> - </td>
                                    </tr> -->
                                    <tr>
                                        <td>Brand Settings</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Profile</td>
                                        <td> -</td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('updateProfile',$permission) ? 'checked' : '') ?>
                                           id="role_permission"
                                                   value="updateProfile"></td>
                                        <td><input type="checkbox" name="role_permission[]" <?php echo (in_array('viewProfile',$permission) ? 'checked' : '') ?>
                                           id="role_permission"
                                                   value="viewProfile"></td>
                                        <td> -</td>
                                    </tr>
                                    <tr>
                                        <td>Analytics</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" <?php echo (in_array('viewAnalytics',$permission) ? 'checked' : '') ?> value="viewAnalytics"></td>
                                        <td> - </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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