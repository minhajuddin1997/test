  <!-- Content Wrapper. Contains page content -->
  <?php
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leads</h1>
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leads</li>
            </ol>
          </div>

        </div>
          <a class="btn btn-info" href="<?php echo base_url('/client/analytics/add'); ?>">Add Lead</a>
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

                <h3 class="card-title">All Leads</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">

                       <table class="table table-bordered table-striped" id="table_id">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Lead Name</th>
              <th>Type</th>
              <th>Status</th>
              <!--<th width="2%">Actions</th>-->
            </tr>
          </thead>
          <tbody>
            <?php
            $x = 1;
            foreach($records as $record):
            ?>
            <tr>
                <td><?php echo $x++; ?></td>
                <td><?php echo $record->lead_name; ?></td>
                <td><?php echo $record->lead_type; ?></td>
                <td><?php echo $record->status; ?></td>
            </tr>
            <?php endforeach; ?>
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