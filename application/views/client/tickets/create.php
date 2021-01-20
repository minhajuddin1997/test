<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class='content'  style="overflow: auto;">
<div class="container float-left">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card">
          <div class="card-header"  style="background:#E6B86A">
            <h3 class="card-title" >Create Ticket</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?php echo base_url('client/tickets/add'); ?>" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label>Subject *</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Mention Subject" required>
              </div>
              <div class="form-group">
                <label>Choose Department *</label>
                <select class="form-control" id="Department" name="department" required> 
                    <?php $data = get_list('department');
                    foreach($data as $row):
                        echo '<option value="' .$row->department_id. '" >' . $row->department_name . '</option>';
                    endforeach;
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Message *</label>
                <textarea class="form-control" id="message" name="message" rows="8" required>
                </textarea>
              </div>
               <div class="form-group">
                    <label>Attachment</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="attachment_file" id="attachment_file" style="cursor:pointer;">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->


        </div>
        <!-- /.card -->

    </div>
	</section>
</div>
