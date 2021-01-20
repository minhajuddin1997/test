<?php if(!empty($records)): foreach($records as $record): ?>
    <div class="content-wrapper" style="min-height: 1244.06px;">
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

              <div style="background:url('https://localhost/dev/assets/img/modelhead.jpg');" class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a new media or select current</h5>
                <hr>
                <div class="form-group">
                    <label>Import To Media Library</label>
                    <div class="input-group-btn">
                       <div class="image-upload">                      
                          <img  src="https://localhost/dev/assets/img/placeholder.png">
                          <div class="file-btn">
                            <form id="imageupload" action="https://localhost/dev/admin/photo_upload">
                                <input type="file" id="selectedimage" name="selectedimage" required>
                                <label class="btn btn-info changeabletext">Upload</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>
  </div>
</div>
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Main Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
  <div class="container-fluid">

    <div class="row">
          <div class="col-md-6">

            <div class="card card-danger" >
              <div class="card-header" style="background-color: #E6B86A;color:#000000">
                <h3 class="card-title" >Colors</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
          <form action="<?php echo base_url('admin/developer'); ?>" method="post">
          <div class="form-group">
            <label>Navigation Upper Gradient Colour</label>
            <input type="color" class="form-control" id="developer_nav_color" name="developer_nav_color" value="<?php echo !empty($record->developer_nav_color)?$record->developer_nav_color:''?>" required>
            <?php echo form_error('developer_nav_color'); ?>
          </div>

          <div class="form-group">
            <label>Navigation Lower Gradient Colour</label>
            <input type="color" class="form-control" id="developer_nav_gradient" name="developer_nav_gradient" value="<?php echo !empty($record->developer_nav_gradient)?$record->developer_nav_gradient:''?>" required>
            <?php echo form_error('developer_nav_gradient'); ?>
          </div>
                  <!-- /.input group -->
           
        
          <div class="form-group">
            <label>Front Navigation Upper Gradient Colour</label>
            <input type="color" class="form-control" id="front_nav_color" name="front_nav_color" value="<?php echo !empty($record->front_nav_color)?$record->front_nav_color:''?>" required>
            <?php echo form_error('front_nav_color'); ?>
          </div>

          <div class="form-group">
            <label>Front Navigation Lower Gradient Colour</label>
            <input type="color" class="form-control" id="front_nav_gradient" name="front_nav_gradient" value="<?php echo !empty($record->front_nav_gradient)?$record->front_nav_gradient:''?>" required>
            <?php echo form_error('front_nav_gradient'); ?>
          </div>
                   <div class="form-group">
                    <label>
                    Choose Font
                  </label>
                  <select id="font_scheme" class="form-control select2">
                    <option value='Arial' >Arial</option>
                    <option value='Raleway' >Raleway</option>

                  </select>
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>
                    Link Colors
                  </label>
                  <input type="color" class="form-control" id="link_colors" name="" value="" required>
            <?php echo form_error('developer_nav_color'); ?>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- time Picker -->
                <div class="form-group">
                    <label>
                    Tab Colors
                  </label>
                  <input type="color" class="form-control" id="tab_colors" name="" value="" required>

            <?php echo form_error('developer_nav_color'); ?>
                  <!-- /.form group -->
                </div>
                <div class="form-group">
                <div class="checkbox">
                  <label><input type="checkbox" id="default_scheme" name="default_status" <?php echo ($record->default_status) ? 'checked' :''; ?>>&nbsp;&nbsp; Set Default Color Scheme</label>
                </div>
              </div>
                <!-- /.form group -->

                <!-- /.form group -->

                 <div class="form-group">
              
                  <input type="submit" class="btn btn-info" name="submit" value="Update">

                  <!-- /.form group -->
                </div>
                <!-- /.form group -->
          </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->

          </div>
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header" style="background-color: #E6B86A;color:#000000">
                <h3 class="card-title">Site Images</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                    <label>Login Page Background Image<br/> (<span class="text-danger">IMAGE SHOULD BE 708px in WIDTH and 472px IN HEIGHT</span>)</label>
                    <div class="input-group-btn">
                      <div class="image-upload" >                      
                        <img class="imgpath" src="<?php echo !empty($record->developer_login_background)?base_url('uploads/developer/').$record->developer_login_background:base_url('assets/img/placeholder.png')?>" style="width:100px;height:100px;border: 1px solid #E6B86A;">
                        <div class="file-btn">
                          <form action="<?php echo base_url("admin/developer/photo_upload");?>/developer_login_background" method="POST" enctype="multipart/form-data">
                            <input type="file" id="developer_login_background" name="developer_login_background" value="<?php echo $record->developer_login_background;?>" readonly>
                            <input type="submit" id="developer_login_background" name='Upload' class="btn btn-info" value='Upload'>
                          </form>
                        </div>
                      </div>
                    </div>
                    <?php echo form_error("front_content_image"); ?>
                </div>  

            <div class="form-group">
                <label>Panel Background Image<br/> (<span class="text-danger">Use Good Quality Images</span>)</label>
                <div class="input-group-btn">
                  <div class="image-upload">                      
                    <img class="imgpath" src="<?php echo !empty($record->front_login_back)?base_url('uploads/developer/').$record->front_login_back:base_url('assets/img/placeholder.png')?>" style="width:100px;height:100px;border: 1px solid #E6B86A;">
                    <div class="file-btn">
                      <input type="file" name="front_login_back" value="<?php echo $record->front_login_back;?>" readonly>
                      <input type="submit" name='Upload' class="btn btn-info" value='Upload'>
                    </div>
                  </div>
                </div>
                <?php echo form_error("front_login_back"); ?>
             </div>
            <div class="form-group">
                <label>Site Logo</label><br/>
                <div class="input-group-btn">
                  <div class="image-upload">                      
                    <img class="imgpath" src="<?php echo !empty($record->front_login_back)?base_url('uploads/developer/').$record->site_logo:base_url('assets/img/placeholder.png')?>" style="width:100px;height:100px;border: 1px solid #E6B86A;">
                    <div class="file-btn">
                    <form action="<?php echo base_url("admin/developer/photo_upload");?>/site_logo" method="POST" enctype="multipart/form-data">
                      <input type="file" name="site_logo" value="<?php echo $record->site_logo;?>" readonly>
                      <input type="submit" name='Upload' class="btn btn-info" value='Upload'>
                    </form>
                    </div>
                  </div>
                </div>
                <?php echo form_error("front_login_back"); ?>
             </div>
            
            <div class="form-group">
                <label>Favicon</label><br/>
                <div class="input-group-btn">
                  <div class="image-upload">                      
                    <img class="imgpath" src="<?php echo !empty($record->front_login_back)?base_url('uploads/settings/').$record->site_logo:base_url('assets/img/placeholder.png')?>" style="width:50px;height:50px;border: 1px solid #E6B86A;">
                    <div class="file-btn">
                    <form action="<?php echo base_url("admin/developer/photo_upload");?>/site_logo" method="POST" enctype="multipart/form-data">
                      <input type="file" name="site_logo" value="<?php echo $record->site_logo;?>" readonly>
                      <input type="submit" name='Upload' class="btn btn-info" value='Upload'>
                    </form>
                    </div>
                  </div>
                </div>
                <?php echo form_error("front_login_back"); ?>
             </div>
            </div>
            </div>
        
          </div>

        </div>
    
  </div>
</section>
</div>
<?php endforeach; endif;?> 