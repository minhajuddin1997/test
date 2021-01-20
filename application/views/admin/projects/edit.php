<?php if(!empty($records)): ?>

  <div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class='content'>
<div class='container float-left'>
        <form role="form" action="<?php echo site_url('admin/projects/edit/');?><?php echo $id; ?>" method="post" enctype="multipart/form-data">       
          <div class="box-body"> 
            <input type="hidden" name="client_id" value="<?php echo $records->client_id; ?>" >
            <div class="form-group">
              <label>Project name</label>
              <input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $records->project_name; ?>" required>
            </div>

            
            <div class="form-group">
              <label>Website Demo Link</label>
              <input type="text" class="form-control" id="website_url" name="website_url" value="<?php echo $records->website_url?>" >
            </div>

            <div class="form-group">
              <label>Project Type</label>
              <input type="text" class="form-control" disabled value="<?php echo get_name_by_id('department',$records->project_type);?>" required>
            </div>

            <div class="form-group">
                <label for="sel1">Select Project Manager:</label>
                <select name="project_manager_id" class="form-control" required id="sel1">
                  <?php foreach($client_records as $row): if($row->role_id == 4): ?>
                    <option value="<?php echo $row->client_id; ?>"><?php echo $row->client_name; ?></option>
                  <?php endif; endforeach; ?>
                </select>
            </div>
            <div class="form-group">
              <label>Current Status</label>
              <select class="form-control" id="delivery_status" name="delivery_status" required>
                <option value="<?php echo $records->delivery_status; ?>"><?php echo $records->delivery_status;?></option>
                <option value="Brief">Brief</option>
                <option value="Proposal">Proposal</option>
                <option value="Setup Stage">Setup Stage</option>
                <option value="In-Progress">In-Progress</option>
                <option value="Initial Delivery">Initial Delivery</option>
                <option value="Testing">Testing</option>
                <option value="Payment Pending">Payment Pending</option>
                <option value="Final Delivery">Final Delivery</option>
              </select>         
            </div>

            <div class="form-group">
              <label>Project Summary</label>
              <p><textarea class="form-control" name='project_summary' ><?php echo $records->project_summary; ?></textarea></p>
            </div>

          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>    
        </form>  
  </div>
    </section>
</div>
<?php endif;?> 
