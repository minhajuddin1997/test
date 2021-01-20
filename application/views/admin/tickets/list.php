  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
              <li class="breadcrumb-item active">Tickets</li>
            </ol>
          </div>

        </div>
          <?php if(in_array('createClientProjects', $permission) ) {  ?>
          <a class="btn btn-info" href="<?php echo base_url('/admin/tickets/add'); ?>">Create New</a>
          <?php } ?>
                <hr style="border-top: 1px solid #504444;" >
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <h3 class="card-title">Ticket History</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">

                       <table class="table table-bordered table-striped" id="table_id">
          <thead>
            <tr>
              <th width='3%'>S.No</th>
              <th width='6%'>Ticket No</th>
              <th width='5%'>Client</th>
              <th width='14%'>Subject</th>
              <th width='15%'>Message</th>
              <th width='7%'>Attachment</th>
              <th width='9%'>Generated At</th>
              <th width='8%'>Status</th>
              <th width="5%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(!empty($records)):
              $x = 1;
              foreach($records as $record):  ?>
                <tr>
                    <td><?php echo $x++; ?></td>
                    <td><?php echo $record->ticket_no; ?></td>
                    <td><?php echo get_name_by_id('client', $record->generated_by); ?></td>
                    <td><?php echo $record->subject; ?></td>
                    <td><?php echo $record->message; ?></td>
                    <td>
                    <?php if(!empty($record->attachment_file)): ?>
                        <i class="far fa-fw 
                        <?php 
                        $ext = pathinfo($record->attachment_file, PATHINFO_EXTENSION);
                        if($ext == 'docx' || $ext == 'DOCX' || $ext == 'xlsb' || $ext == 'xlsb' || $ext == 'xlw' || $ext == 'xltx' || $ext == 'xlsx' ||  $ext == 'pptx'){
                            echo 'fa-file-word';
                        } else if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){ 
                            echo 'fa-image'; 
                        } else if($ext == 'pdf' || $ext == 'PDF'){
                            echo 'fa-file-pdf';
                        } else {
                            echo '-';
                        }
                        ?>" 
                        ></i><?php echo $record->attachment_file; ?>
                    <?php else: echo '-'; endif; ?>    
                    </td>
                    <td><?php echo $record->generated_at; ?></td>
                    <td>
                    <?php if($record->status == 'Open'): ?>
                        <a href="<?php echo site_url('admin/tickets/convert_to_answered/'.$record->id.'');?>"><span style="background:#d4784e;border-radius:5px;padding:0.4rem;color:white;" class="view_icon">
                        <i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Open</span></a>
                    <?php else: ?>
                        <a href="<?php echo site_url('admin/tickets/convert_to_open/'.$record->id.'');?>"><span style="background:green;border-radius:5px;padding:0.4rem;color:white;" class="view_icon">
                        <i class="fa fa-check"></i>&nbsp;&nbsp;Answered</span></a>
                    <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo site_url('admin/tickets/answer/'.$record->id.'');?>"><span style="border-radius:5px;" class="reply_icon"><i class="fa fa-reply" aria-hidden="true"></i></span></a>
                        <a href="<?php echo site_url('admin/tickets/edit/'.$record->id.'');?>"><span style="border-radius:5px;" class="edit_icon"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                        <a href="<?php echo site_url('admin/tickets/del/'.$record->id.'');?>"><span style="border-radius:5px;" class="delete_icon"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                    </td>
                </tr>
             <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>