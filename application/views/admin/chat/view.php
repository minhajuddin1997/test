<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid ">
        <div class="row mb-3">
            
          <div class="col-sm-6">
            <h1 style='font-size:35px;'>Project <span style='font-size:20px !important;'>Details</span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class='content'  style="overflow: auto;">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <!--<div class="card-tools">-->
          <!--  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">-->
          <!--    <i class="fas fa-minus"></i></button>-->
          <!--  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">-->
          <!--    <i class="fas fa-times"></i></button>-->
          <!--</div>-->
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Project Package</span>
                      <span class="info-box-number text-center text-muted mb-0">Web</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">20 <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <?php 
                    foreach($comments as $row): ?>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url() . '/uploads/client/' . get_value_by_id('client', $row['sender_id'], 'client_image'); ?>" alt="user image" >
                        
                        <span class="username">
                          <a href="#"><?php 
                          $check = get_single_field('users',array('user_id' =>$row['sender_id'] , 'user_type' => 'admin'),'user_type');
                          if($check->user_type == 'admin'){
                            echo '<span style="color:green;">'.get_value_by_id_new('users','user_name', array('user_id'=>$row['sender_id'])).' [Administrator]</span> '; 
                          } else{
                             echo get_name_by_id('client',$row['sender_id']); 
                          }
                          
                          ?></a>
                        </span>
                        <span class="description">Shared publicly - <?php echo $row['comments_date']; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php echo $row['comments_text']; ?>
                      </p>

                      <!--<p>-->
                      <!--  <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>-->
                      <!--</p>-->
                    </div>
                    <?php endforeach; ?>
                    		<form method="post" action="<?php echo base_url('admin/chat/reply_comment')?>" enctype="multipart/form-data" >
					<div class="form-group">
						<label>Reply to this thread</label>
						<textarea class=" form-control editor" rows="3" id="comments_text" name="comments_text" required></textarea>
					</div>
					<input type="hidden" name="sender_id" value="<?php echo $this->session->userdata('user_id'); ?>">
					<input type="hidden" name="project_id" value="<?php echo $record->client_projects_id;?>">
					
					<div style="height:60px;">
					    
					    	<button type="submit" class="btn btn-primary mb-14">Post Comment</button>
					    
                    <div style="float:right"><button id="showimgupload" style="border-color: #e39d21;color: #fff;background: #e39d21;font-size: 12px;" type="button" class="btn btn-primary"><b>Add Images</b></button>
                    <button id="showfileupload" style="border-color: #09af3b;color: #fff;background: #09af3b;font-size: 12px;" type="button" class="btn btn-primary "><b>Add Files</b></button>
                    
                    </div>
                    
                    </div>
                    
                    <div class="showcommentimage">
					</div>
					
					<div class="notvisiblefile">
					</div>

				

				</form>
				
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-info"><i class="fas fa-paint-brush"></i> <?php echo $record->project_name; ?></h3>
              <p class="text-muted">
                  <?php echo $record->project_summary; ?>
              </p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block"><?php echo get_value_by_id('client', $record->client_id, 'client_company'); ?></b>
                </p>
                <p class="text-sm">Project Manager
                  <b class="d-block"><?php echo get_name_by_id('client', $record->client_id); ?></b>
                </p>
                 <p class="text-sm">Project Team Members
                  <ul class="list-inline new-img-list"><li class="list-inline-item">
                    <?php
                        $data = json_decode($record->client_project_members);
                         foreach($data as $row){
                            $getName = get_name_by_id('client',$row);
                            $ss = get_value_by_id('client', $row, 'client_image'); ?>
                            <li style="margin-right:0.3rem;"><img data-toggle="tooltip" data-placement="top" title="<?php echo $getName; ?>" class="table-avatar" src="<?php echo base_url(); ?>uploads/client/<?php echo $ss; ?>"></li>
                         <?php }
                    ?>
                    </ul>
                </p>
                 <p class="text-sm">Project Type
                  <b class="d-block"><?php echo get_name_by_id('department', $record->project_type); ?></b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <!--<li>-->
                <!--  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>-->
                <!--</li>-->
              </ul>
              <div class="text-center mt-5 mb-3">
                  <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Custom Upload
                </label>
                <input id="file-upload" type="file"/>
                <input type="button" class="btn btn-sm btn-primary" id="file_upload_project" value="Add files">
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

		</section>
</div>
<script>
    $(document).on('click', '#showimgupload', function () {
                            var linkvar = "<?php echo base_url('assets/img/placeholder.png')?>";
                            $(".showcommentimage").append('<div class="form-group"><label>Upload Images</label><div class="input-group-btn"><div class="multi-image-upload"><img src="' + linkvar + '"><div class="file-btn"><input type="file" id="support_images_img" name="support_images_img[]"><label class="btn btn-info">Upload</label></div></div></div></div>');
                            $('#showimgupload').remove();
                        });
</script>
