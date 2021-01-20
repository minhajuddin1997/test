  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>

        </div>
                <hr style="border-top: 1px solid #504444;" >
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card-header -->
              <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-header" style="background-color: #E6B86A;color:#000000">
                <h3 class="card-title">Brief Form</h3>
              </div>
              <div class="card-body">
                              <?php if(!empty($records)): 
                    if($type == 'lb'){ 
                  ?>
                    <h5>Project Information</h5>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Project Name</label>
                      <div class="col-sm-8">
                        <input type='text' value='<?php echo $project->project_name; ?>'>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Project Type</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="project_type" required="">
                          <option value="">Select Project Type</option>
                          <?php foreach($department as $row => $key): ?>
                            <option value="<?php echo $key->department_id; ?>">
                              <?php echo $key->department_name; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <h5>Design Specification</h5>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Name of Logo</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo $records->logo_name; ?>"> </div>
                    </div>
                    <div class="form-group row">
                      <label for="material" class="col-sm-4 col-form-label">Slogan (If Any)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Slogan (If Any)" value="<?php echo $records->slogan; ?>">
                        <br> </div>
                    </div>
                    <div class="form-group row">
                      <label for="material" class="col-sm-4 col-form-label">Select Style of Logo</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="logo_style" required="">
                          <option value="<?php echo $records->logo_style; ?>"><?php echo $records->logo_style; ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="material" class="col-sm-4 col-form-label">Look And Feel *</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="looknfeel" placeholder="Look And Feel *" name="look_and_feel" value="<?php echo $records->look_and_feel; ?>"> </div>
                    </div>
                    <div class="form-group row">
                      <label for="material" class="col-sm-4 col-form-label">Additional Comments*</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" id="additionalcomment" name="additional_comments" placeholder="Additional" rows="3" value=""><?php echo $records->additional_comments; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="material" class="col-sm-4 col-form-label">Upload Brief:</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="upload_brief_file" id="upload_brief_file">
                        <!--     <input type="button" class='btn btn-info' name='upload_file' id='upload_file' > -->
                      </div>
                    </div>
                  <?php } 
                  if($type == 'wb'){ ?>
                <h5 id="tab_head">Project Information</h5>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Project Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $project->project_name; ?>"> </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Project Type</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="project_type" required="">
                        <option value="<?php echo $project->project_name; ?>">
                          <?php echo $project->project_type; ?>
                        </option>
                    </select>
                  </div>
                </div>
                <h5 id="tab_head">Design Specification</h5>
                <div class="form-group row">
                  <label for="additionalcomment" class="col-sm-4 col-form-label">Purpose of your website: *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="purpose_of_web" name="purpose_of_web" rows="3"><?php echo $records->purpose_of_web; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="additionalcomment" class="col-sm-4 col-form-label">Title of your WebPages: (E.g.: Company Profile, Contact us etc.) *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="title_of_web_page" name="title_of_web_page" rows="3"><?php echo $records->title_of_web_page; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="brief_description" class="col-sm-4 col-form-label">Please give a brief description of your business: (What type of products or services does your company supply? etc...) *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="brief_description" name="brief_description" rows="3"><?php echo $records->brief_description; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="target_of_audience" class="col-sm-4 col-form-label">Target audience of your website:</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="target_of_audience" name="target_of_audience" rows="3"><?php echo $records->target_of_audience; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="design_preferences" class="col-sm-4 col-form-label">Do you have any specific design, preferences? *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="design_preferences" name="design_preferences" rows="3"><?php echo $records->design_preferences; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="additional_comments" class="col-sm-4 col-form-label">Additional comments?</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="additional_comments" name="additional_comments" rows="3"><?php echo $records->additional_comments; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="material1" class="col-sm-4 col-form-label">Upload Brief:</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="upload_brief" id="upload_brief"> </div>
                </div>
                <br>
                <h5 id="tab_head">Domain & Web Hosting Details</h5>
                <p class="notifiied-p">Please give us a few details about the domain name and hosting of the website.</p>
                <div class="form-group row radio-tn">
                  <label for="ihave" class="col-sm-4 col-form-label">Do you have a Domain Name?: *</label>
                  <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                      <label class="radio-inline">
                        <input type="radio" id="yesydomname" name="have_domain_name" value="Yes" checked>Yes </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <label class="radio-inline">
                        <input type="radio" id="nodomname" name="have_domain_name" value="No">No </label>
                    </div>
                  </div>
                </div>
                <!--        <div class="form-group row radio-tn">
                                  <label for="ihave" class="col-sm-4 col-form-label">Do you want us to provide hosting for your website?: *</label>
                                  <div class="col-sm-8">
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="wanthostyes" name="need_web_hosting "  value="Yes"   class="custom-control-input">
                                        <label class="custom-control-label" for="wanthostyes">Yes</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="wanthostno" name="need_web_hosting  " value="No" class="custom-control-input">
                                        <label class="custom-control-label" for="wanthostno">No</label>
                                      </div>
                                  </div>
                              </div> -->
          
                  <?php }

                endif; ?>
              </div>
            </div>
          </div>

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