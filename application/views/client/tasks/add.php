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
            <h1>Create Tasks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tasks</li>
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
              <h3 class="card-title" >Task Form</h3>
            </div>
            <div class="card-body" style="display: block;">
              <form role="form" action="<?php echo base_url('client/tasks/add')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="task_name" required name="task_name" >
                    </div>
                    <div class="form-group">
                        <label>Choose Project</label>
                        <select name="client_projects_id" class="form-control"  required="">
                          <?php foreach($records as $client): ?>
                            <option value='<?php echo $client->client_projects_id; ?>'><?php echo $client->project_name; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id');?>">
                    
                    <div class="form-group">
                        <label>Task Summary</label>
                        <textarea class="form-control editor" rows="3" id="description" name="description"><?php echo !empty($record->description)?$record->description:''?></textarea>
                    </div>
                <div class="form-group">
                    <label>Priority</label>
                    <select name="priority" class="form-control">
                        <option value="">Choose Priority</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>

                    </select>
                 </div>
                 <div class="form-group">
                    <label>Status</label>
                    <select name="priority" class="form-control">
                        <option value="">Choose Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                        <option value="Stopped">Stopped</option>
                    </select>
                 </div>

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
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" required>
              </div>
              <div class="form-group">
                <label for="project_due_date">Estimated Due Date</label>
                <input type="date" class="form-control" name="due_date">
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