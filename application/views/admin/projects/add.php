<div class="content-wrapper" style="min-height: 1244.06px;">
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Project</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Projects</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class='content'>

	<div class='container float-left'>
		<form role="form" id='projectFrm' action="<?php echo base_url('/admin/projects/create'); ?>" method="post" enctype="multipart/form-data">    <div class="box-body">
			<div class="form-group">
                <label for="sel1">Select Client:</label>
                <select name="client_id" class="form-control" required id="sel1">
                <option value="">Please Select</option>
                <?php foreach(get_list('client') as $row): ?>
                <option value="<?php echo $row->client_id; ?>" ><?php echo $row->client_name; ?></option>                   
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sel1">Select Project Manager:</label>
                <select name="project_manager_id" class="form-control" required id="sel1">
                  <option value="">Please Select</option>
                  <?php foreach(get_list('client', array('role_id'=>4)) as $row): ?>
                  <option value="<?php echo $row->client_id; ?>" ><?php echo $row->client_name; ?></option>  
                  <?php endforeach; ?>             
                </select>
            </div>
                <input type="hidden" value="Brief" name="delivery_status">
                <input type="hidden" value="11" name="uploaded_month">
			<div class="form-group">
				<label>Project Name</label>
				<input type="text" class="form-control" id="project_name" required name="project_name" >
			</div>
			
			<div class="form-group">
				<label>Project Type: </label>
				<select id='dept' class="form-control" id="project_type" name="project_type" required>
				<option value="" >Please Select</option>
				<?php foreach(get_list('department') as $row): ?>
              	<option value="<?php echo $row->department_id; ?>" ><?php echo $row->department_name; ?></option>  
              	<?php endforeach; ?>  	
				</select>         
			</div> 
			<div class="form-group" id="duration" style="display: none;">
				<label>Select Duration:</label> 
                <select class="form-control" name="duration_plan" id="duration_plan">
                        <option value="12">12 Months</option>
                    
                </select>
			</div> 
			<div class="form-group">
				<label>Project Summary</label>
				<textarea class="editor form-control" rows="3" id="project_summary" name="project_summary" required></textarea>
			</div>
			</div>
			<div class="box-footer">
				<button type="submit" id='projBtn' class="btn btn-primary">Submit</button>
			</div>    
		</form>  
		</div>
	</section>
</div>
