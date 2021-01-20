<div class="content-wrapper">
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
      <a class="btn btn-info" href="<?php echo base_url('/admin/roles/create'); ?>">Create New Role</a>
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
            <form role="form" action="<?php echo base_url('admin/roles/add') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="box-body">

                    <div class="form-group">
                        <label>Role Name (Required)</label>
                        <input type="text" class="form-control" id="role_name"  name="role_name" value="<?php echo set_value('role_name'); ?>" required>
                        <?php echo form_error('role_name', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Permissions</h4>
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
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createUser"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateUser"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewUser"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteUser"></td>
                                    </tr>
                                    <tr>
                                        <td>Roles</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createRole"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateRole"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewRole"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteRole"></td>
                                    </tr>
                                    <tr>
                                        <td>Client</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createClient"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateClient"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewClient"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteClient"></td>
                                    </tr>
                                    <tr>
                                        <td>CRM</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createCRM"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateCRM"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewCRM"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteCRM"></td>
                                    </tr>
                                    <tr>
                                        <td>Circles</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createCircle"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateCircle"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewCircle"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteCircle"></td>
                                    </tr>
                                    <tr>
                                        <td>Market Place</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewMarketPlace"></td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing Analytics</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewMarketAnalytics"></td>
                                        <td>-</td>
                                    </tr>
                                       <tr>
                                        <td>File Management</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission"
                                        value="createFileManagement"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission"
                                        value="updateFileManagement"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission"
                                        value="viewFileManagement"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission"
                                        value="deleteFileManagement"></td>
                                    </tr>
                                  <!--   <tr>
                                        <td>Development Status</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createDevelopmentStatus"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateDevelopmentStatus"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewDevelopmentStatus"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteDevelopmentStatus"></td>
                                    </tr> -->
                                    <tr>
                                        <td>Client Projects</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createClientProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateClientProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewClientProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteClientProjects"></td>
                                    </tr>
                                    <tr>
                                        <td>Assign Projects</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createAssignProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateAssignProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewAssignProjects"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteAssignProjects"></td>
                                    </tr>
                               <!--      <tr>
                                        <td>Assign Resources</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createAssignResources"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateAssignResources"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewAssignResources"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteAssignResources"></td>
                                    </tr> -->
                              <!--       <tr>
                                        <td>KPI</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createKpi"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateKpi"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewKpi"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteKpi"></td>
                                    </tr> -->
                        <!--             <tr>
                                        <td>Domain</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createDomain"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateDomain"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewDomain"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteDomain"></td>
                                    </tr>
                                    <tr>
                                        <td>Domain Targets</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createDomainTarget"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateDomainTarget"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewDomainTarget"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteDomainTarget"></td>
                                    </tr> -->
                                    <tr>
                                        <td>Payment</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createPayment"></td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewPayment"></td>
                                        <td> - </td>
                                    </tr>
                                  <!--   <tr>
                                        <td>Refund</td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="createRefund"></td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                    </tr> -->
                                    <tr>
                                        <td>Support</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewSupport"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="deleteSupport"></td>
                                    </tr>
                              <!--       <tr>
                                        <td>Developer</td>
                                        <td> - </td>
                                        <td>-</td>
                                        <td> - </td>
                                        <td> - </td>
                                    </tr> -->
                                    <tr>
                                        <td>Brand Setting</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Profile</td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="updateProfile"></td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewProfile"></td>
                                        <td> - </td>
                                    </tr>
                                    <tr>
                                        <td>Analytics</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td><input type="checkbox" name="role_permission[]" id="role_permission" value="viewAnalytics"></td>
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