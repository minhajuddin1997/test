<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #333;
    }
</style>
<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Contact</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
	<section class='content'  style="overflow: auto;">
	    <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header" style="background-color: #000000;color:#fff">
              <h3 class="card-title" >Contact Form</h3>
            </div>
            <div class="card-body" style="display: block;">
              <form role="form" action="<?php echo base_url('client/tasks/add')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" class="form-control" id="name" required name="name" >
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" class="form-control" id="email" required name="email" >
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <input type="text" class="form-control" id="company" name="company" >
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" id="website" name="website" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Choose Role</label>
                        <select name="client_projects_id" class="form-control"  required="">
                          <?php $records = get_list('role'); 
                          foreach($records as $client): ?>
                            <option value='<?php echo $client->role_id; ?>'><?php echo $client->role_name; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id');?>">

                    <div class="notvisiblefile">
                    </div>

                </div>
                <input type="hidden" name="phase_id" value="">
                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Create Task</button>
                </div>

            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Other Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="start_date" required>
                <label class="form-check-label">
                  Would you like to send invitation email 
                  immediately?
                </label>
              </div>
              <br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="start_date" required>
                <label class="form-check-label">
                  Send Welcome Email.
                </label>
              </div>
            </div>
            
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
		</section>
</div>