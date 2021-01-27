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
                      <span class="info-box-number text-center text-muted mb-0">-</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">- <span>
                    </span></span></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <?php foreach($comments as $row): ?>
                    <div class="post">
                      <div class="user-block">
                         <?php  $icon = !empty(get_value_by_id('client', $row['sender_id'], 'client_image')) ? get_value_by_id('client', $row['sender_id'], 'client_image')
                        : 'user-icon.png'; ?>
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url() . '/uploads/client/' . $icon; ?>" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo get_name_by_id('client', $row['sender_id']); ?></a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
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
                    		<form method="post" action="<?php echo base_url('client/chat/reply_comment')?>" enctype="multipart/form-data" >
					<div class="form-group">
						<label>Reply to this thread</label>
						<textarea class=" form-control editor" rows="3" id="comments_text" name="comments_text" required></textarea>
					</div>
					<input type="hidden" name="sender_id" value="<?php echo $this->session->userdata('client_id'); ?>">
					<input type="hidden" name="project_id" value="<?php echo $record[0]->client_projects_id; ?>">
					
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
              <h3 class="text-info"><i class="fas fa-paint-brush"></i> <?php echo $record[0]->project_name; ?></h3>
              <p class="text-muted">
                  <?php echo $record[0]->project_summary; ?>
              </p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block"><?php echo !empty(get_value_by_id('client', $record[0]->client_id, 'client_company')) ? get_value_by_id('client', $record[0]->client_id, 'client_company') : 'Not Provided'; ?></b>
                </p>
                <p class="text-sm">Project Manager
                  <b class="d-block">
                  <?php 
                      $val = get_value_by_id('client_projects', $record[0]->client_projects_id, 'project_manager_id'); 
                      echo !empty(get_name_by_id('client',$val)) ? get_name_by_id('client',$val) : 'Not Assigned';
                      ?>
                  </b>
                </p>
                 <p class="text-sm">Project Team Members
                    <?php
                        $data = json_decode($record[0]->client_project_members);
                        if(!empty($data)){ ?>
                        <ul class="list-inline new-img-list"><li class="list-inline-item">
                        <?php
                         foreach($data as $row){
                            $getName = get_name_by_id('client',$row);
                            $ss = get_value_by_id('client', $row, 'client_image'); ?>
                            <li style="margin-right:0.3rem;"><img data-toggle="tooltip" data-placement="top" title="<?php echo $getName; ?>" class="table-avatar" src="<?php echo base_url(); ?>uploads/client/<?php echo $ss; ?>"></li>
                         <?php }
                        ?>
                        </ul>
                        <?php
                          } else {
                            echo '<b class="d-block">Not Assigned</b>';
                        }
                    ?>
                    
                    </p>
                 <p class="text-sm">Project Type
                  <b class="d-block"><?php echo get_name_by_id('department', $record[0]->project_type); ?></b>
                </p>
              </div>
             <h5 class="mt-5 text-muted">Summary File</h5>
              <?php
                if(!empty($record[0]->summary_file)): ?>
                    <i class="far fa-fw fa-file-<?php 
                        if(pathinfo($record[0]->summary_file, PATHINFO_EXTENSION) == 'pdf'):
                            echo 'pdf';
                        elseif(pathinfo($record[0]->summary_file, PATHINFO_EXTENSION) == 'docx'):
                            echo 'word';
                        elseif(pathinfo($record[0]->summary_file, PATHINFO_EXTENSION) == 'png'):
                            echo 'image';
                        endif;
                    ?>"></i><a href="" class="btn-link text-secondary"><?php echo $record[0]->summary_file; ?></a>
                  
              <?php else:
                echo 'Not Found';   
               endif;
              ?>
              <h5 class="mt-5 text-muted">Project Files</h5>
              <ul class="list-unstyled">
                <?php if(!empty($files)): 
                    foreach($files as $row):
                    ?>
                    <li>
                      <a href='<?php echo base_url("client/projects/del_project_file/"); ?><?php echo $row["projects_files_id"]; ?>'><span class='far fa-trash-alt float-right'></span></a>
                      <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-<?php 
                            if($row['extension'] == 'pdf'):
                                echo 'pdf';
                            elseif($row['extension'] == 'docx'):
                                echo 'word';
                            elseif($row['extension'] == 'png'):
                                echo 'image';
                            endif;
                        ?>
                    "></i><?php echo $row['projects_files_file']; ?></a>
                    </li>
                    <?php 
                    endforeach;
                else: 
                    echo 'Not Found';
                endif; ?> 
              </ul>
              <div class="text-center mt-5 mb-3">
                <form method="post" action="<?php echo base_url('client/projects/upload_project_file/'); ?><?php echo $record[0]->client_projects_id; ?>" enctype="multipart/form-data">
                <input type="file" name="summary_file"/>
                <button type="submit" class="btn btn-sm btn-warning">Upload</button>
                </form>
                <div id="response"></div>
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
    
// jQuery('document').ready(function(){
//     var input = document.getElementById("file");
//     var id_new = document.getElementById('client_projects_id').value;
//     var formdata = false;
//     if (window.FormData) {
//         formdata = new FormData();
//     }
//     input.addEventListener("change", function (evt) {
//         var i = 0, len = this.files.length, img, reader, file;
//         for ( ; i < len; i++ ) {
//             file = this.files[i];
//             if (!!file.type.match(/image.*/) || !!file.type.match(/document.*/)) {
//                 if ( window.FileReader ) {
//                     reader = new FileReader();
//                     reader.onloadend = function (e) {
//                         //showUploadedItem(e.target.result, file.fileName);
//                     };
//                     reader.readAsDataURL(file);
//                 }

//                 if (formdata) {
//                     formdata.append("client_projects_id", id_new);
//                     formdata.append("summary_file", file);
//                     formdata.append("extra",'extra-data');
//                 }

//                 if (formdata) {
//                     jQuery('div#response').html('<br /><img src="https://www.india.com/wp-content/uploads/2014/07/ajax-loader.gif"/>');
//                     jQuery.ajax({
//                         url: "",
//                         type: "POST",
//                         data: formdata,
//                         processData: false,
//                         contentType: false,
//                         success: function (res) {
//                             if(res == 1){
//                                 toastr.success("File Uploaded!");
//                                 jQuery('div#response').html("Successfully uploaded");
//                             } else{
//                                 toastr.error("Invalid File Format");
//                             }
//                         }
//                     });
//                 }
//             }
//             else
//             {
//                 alert('Not a vaild image!');
//             }
//         }

//     }, false);
// });
</script>

