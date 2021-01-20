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
            <h1>Add Lead</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leads</li>
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
              <h3 class="card-title" >Upload Leads</h3>
            </div>
            <div class="card-body" style="display: block;">
              <form role="form" action="<?php echo base_url('client/analytics/add')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">

                    <div class="form-group">
                        <label>File </label>
                        <input type="file" name="lead_file" id="lead_file" class="form-control" accept=".pdf, .docx, .pptx, .txt, .xlsx, .rar, .zip, .xlsm, .xls, .csv, .xlsb, .xlw, xltx"  required="">
                    </div>
                    <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id');?>">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Add Lead</button>
                </div>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        </div>
		</section>
</div>