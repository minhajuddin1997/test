<div class="content-wrapper" style="min-height: 1244.06px;">
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Submit Brief Form</h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Submit Brief Form</li>
        </ol>
      </div>
    </div>
    <hr>
  </div><!-- /.container-fluid -->
</section>

<section class='content'>

<div class='container float-left' style="color:white;">

  <div id="logo_brief">
                <h5 id="tab_head2" data-toggle="modal" id='logo_brief' data-target="#exampleModalCenter" style="background: #333;cursor: pointer;">Logo Brief 
               </h5> </div>
              <div id="website_brief">
                <h5 id="tab_head2" data-toggle="modal" id='website_brief' data-target="#exampleModalCenter2" style="background: #333;cursor: pointer;">Website Brief
        
            </h5> </div>
              <div id="creative_brief">
                <h5 id="tab_head2" data-toggle="modal" id='seo_brief' data-target="#exampleModalCenter3" style="background: #333;cursor: pointer;">Creative Content Brief
                
            </h5> </div>
              <div id="seo_brief">
                <h5 id="tab_head2" data-toggle="modal" id='seo_brief' data-target="#exampleModalCenter4" style="background: #333;cursor: pointer;">SEO/SMM       
            </h5> </div>

</div>
</section>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Logo Brief</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
              </div>
              <div class="modal-body">
       
                  <h5 id="tab_head2">Project Information</h5>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Project Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name *" value="<?php echo $records[0]['project_name']; ?>" required=""> </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Project Type</label>
                    <div class="col-sm-8">
                      <p>
                        <?php 
                        foreach($department as $row){
                          if($row['department_id'] == $records[0]['project_type']){
                              echo $row['department_name'];
                          }
                        }
                        ?>                        
                      </p>
                    </div>
                  </div>
                  <form id="logo_brief_form" method="POST">
                          <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>">
                          <input type="hidden" name="client_projects_id" value="<?php echo $records[0]['client_projects_id']; ?>">
                          <h5 id="tab_head2">Design Specification</h5>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name of Logo</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="logo_name" id="logoname" placeholder="Exact Name To Be Appeared On Logo *" required=""> </div>
                          </div>
                          <div class="form-group row">
                            <label for="material" class="col-sm-4 col-form-label">Slogan (If Any)</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Slogan (If Any)">
                              <br> </div>
                          </div>
                          <div class="form-group row">
                            <label for="material" class="col-sm-4 col-form-label">Select Style of Logo</label>
                            <div class="col-sm-8">
                              <select class="form-control" name="logo_style" required="">
                                <option value="">Select Style of Logo</option>
                                <option value="Modern">Modern</option>
                                <option value="Hi-Tec">Hi-Tec</option>
                                <option value="Contemporary">Contemporary</option>
                                <option value="Funny">Funny</option>
                                <option value="Antique">Antique</option>
                                <option value="Corporate">Corporate</option>
                                <option value="Other">Other</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="material" class="col-sm-4 col-form-label">Look And Feel *</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="looknfeel" placeholder="Look And Feel *" name="look_and_feel" required=""> </div>
                          </div>
                          <div class="form-group row">
                            <label for="material" class="col-sm-4 col-form-label">Additional Comments*</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" id="additionalcomment" name="additional_comments" placeholder="Additional" rows="3" required=""></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="material" class="col-sm-4 col-form-label">Upload Brief:</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" name="upload_brief_file" id="upload_brief_file">
                              <!--     <input type="button" class='btn btn-info' name='upload_file' id='upload_file' > -->
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Upload Brief Form</button>
                      </div>
              </form>
            </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 150%;" role="document">
          <div class="modal-content" style="overflow-y: scroll !important;height:90vh !important;">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Creative Content Brief</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <form id="creative_brief_form" method="POST">
              <input type="hidden" name="client_id" value="">
              <h5 id="tab_head2">Project Information</h5>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Project Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name *" required=""> </div>
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
              <h5 id="tab_head2"> Specification</h5>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Content Tone</label>
                <div class="col-sm-8">
                  <select class="form-control" name="content_tone" required="">
                    <option value="">Select Content Tone</option>
                    <option value="Formal and professional">Formal and professional</option>
                    <option value="Warm and accessible">Warm and accessible</option>
                    <option value="Conversational">Conversational</option>
                    <option value="Authoritative">Authoritative</option>
                    <option value="Lively">Lively</option>
                    <option value="Serious">Serious</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Content Manner</label>
                <div class="col-sm-8">
                  <select class="form-control" name="content_manner" required="">
                    <option value="">Select Content Manner</option>
                    <option value="Helpful">Helpful</option>
                    <option value="Simple">Simple</option>
                    <option value="Friendly">Friendly</option>
                    <option value="Sympathetic">Sympathetic</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label"> Business Objectives: *</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="business_objectives" name="  business_objectives" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Business Description *</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="business_description" name="business_description" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Testimonials</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="testimonials" name="testimonials" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Target audience:</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="target_of_audience" name="target_of_audience" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Unique Selling Point *</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="unique_selling_point" name="unique_selling_point" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Word Count</label>
                <div class="col-sm-8">
                  <input type='text' class="form-control" id="word_count" name="word_count">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Upload Brief:</label>
                <div class="col-sm-8">
                      <input type="file" class="form-control" name="upload_brief" id="upload_brief">
                </div>
              </div>
              <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Upload Brief Form</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 150%;" role="document">
          <div class="modal-content" style="overflow-y: scroll !important;height:90vh !important;">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Website Brief</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              
                <h5 id="tab_head2">Project Information</h5>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Project Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name *" value="<?php echo $records[0]['project_name']; ?>" required=""> </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Project Type</label>
                  <div class="col-sm-8">
                       <p>
                        <?php 
                        foreach($department as $row){
                          if($row['department_id'] == $records[0]['project_type']){
                              echo $row['department_name'];
                          }
                        }
                        ?>                        
                      </p>
                  </div>
                </div>
                <h5 id="tab_head2">Design Specification</h5>
                <form id="website_brief_form" method="POST">
                <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>">
                <input type="hidden" name="client_projects_id" value="<?php echo $records[0]['client_projects_id']; ?>">
                <div class="form-group row">
                  <label for="additionalcomment" class="col-sm-4 col-form-label">Purpose of your website: *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="purpose_of_web" name="purpose_of_web" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="additionalcomment" class="col-sm-4 col-form-label">Title of your WebPages: (E.g.: Company Profile, Contact us etc.) *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="title_of_web_page" name="title_of_web_page" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="brief_description" class="col-sm-4 col-form-label">Please give a brief description of your business: (What type of products or services does your company supply? etc...) *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="brief_description" name="brief_description" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="target_of_audience" class="col-sm-4 col-form-label">Target audience of your website:</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="target_of_audience" name="target_of_audience" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="design_preferences" class="col-sm-4 col-form-label">Do you have any specific design, preferences? *</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="design_preferences" name="design_preferences" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="additional_comments" class="col-sm-4 col-form-label">Additional comments?</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="additional_comments" name="additional_comments" rows="3"></textarea>
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
                <p class="notifiied-p"><span class="red-tn">Note :</span> We will send you a "Page under construction" template on your respective domain name, very soon. Meanwhile, our professional designers will be working on your custom website design. It will get uploaded as soon as you approve the final design.</p>
                <br> </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Upload Brief Form</button>
            </div>
            </form>
          </div>
        </div>
      </div>