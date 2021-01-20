<div class="container-fluid" id="grad1">
  <div class="row justify-content-center mt-0">
    <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2"> <img src='https://cdn.shortpixel.ai/spai/q_lossy+ret_img/https://www.dynistybranding.com/wp-content/uploads/2020/04/cropped-cropped-logo.png'  style="margin: 0 auto;">
      <br>
      <h2><strong>Complete the Intake Form</strong></h2>
      <p>Fill all form field to go to next step</p>
      <div class="row" style="margin-top: -50px;">
        <div class="col-md-12 mx-0">
          <form id="regForm" action="<?php echo base_url('front/register/intake/'); ?><?php echo $records; ?>" method="post">
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
              <h5 id="tab_head">Complete Account Information</h5>
              <?php
                 $jsonData = json_decode(file_get_contents('https://restcountries.eu/rest/v2/all'));
                ?>
                <p>
                  <select class="form-control" name='client_country' required="">
                    <option value=''>Choose Country</option>
                    <?php foreach($jsonData as $row){ ?>
                      <option value='<?php echo $row->name; ?>' <?php if($info->client_country == $row->name): echo 'selected'; else: ''; endif; ?>>
                        <?php echo $row->name; ?>
                      </option>
                      <?php } ?>
                  </select>
                </p>
                <p>
                  <input type="text" name="client_phone_number" placeholder="Contact No." required="" value='<?php if(!empty($info->client_phone_number)): echo $info->client_phone_number; endif; ?>'> </p>
                <p>
                  <input type="text" name="client_address" placeholder="Address" required="" value='<?php if(!empty($info->client_address)): echo $info->client_address; endif; ?>'> </p>
                <!--             <p> <input type="text" name="uname" placeholder="UserName" required=""> </p> -->
                <p>
                  <input type="password" name="client_password" id="pass1" placeholder="Password" required="" value='<?php if(!empty($info->client_password)): echo $info->client_password; endif; ?>'> </p>
                <p>
                  <input type="password" name="client_password" id="confirm_pass" placeholder="Confirm Password" required="" value='<?php if(!empty($info->client_password)): echo $info->client_password; endif; ?>'>
                </p>
                <label>Choose Project Brief</label>
                <p>
                  <select class="selectpicker" id='projectBrief' style="background-color: #333; color:white;" multiple required="">
                    <option value='Logo' <?php if($logo_brief > 0): echo 'selected'; endif; ?>>Logo Brief</option>
                    <option value='Website' <?php if($web_brief > 0): echo 'selected'; endif; ?>>Website Brief</option>
                    <option value='SEO' <?php if($seo_brief > 0): echo 'selected'; endif; ?>>SEO/SMM Brief</option>
                    <option value='Creative' <?php if($creative_brief > 0): echo 'selected'; endif; ?>>Creative Brief</option>
                    <option value='Flyer' <?php if($flyer > 0): echo 'selected'; endif; ?>>Flyer Brief</option>

                  </select>
                </p>
            </div>
            <div class="tab">
              <h5 id="tab_head">Brief Forms</h5>
              <!--  <button type="button" class="btn btn-info" data-toggle="modal" id='logo_brief' data-target="#exampleModalCenter">
            Logo Brief
          </button> -->
              <div id="logo_brief">
                <h5 id="tab_head" data-toggle="modal" id='logo_brief' data-target="#exampleModalCenter" style="background: #333;cursor: pointer;">Logo Brief <p class="float-right" >
              <?php echo '(' . $logo_brief . ')'; ?>
            </p>
            </h5> </div>
              <div id="website_brief">
                <h5 id="tab_head" data-toggle="modal" id='website_brief' data-target="#exampleModalCenter2" style="background: #333;cursor: pointer;">Website Brief
            <p class="float-right" >
              <?php echo '(' . $web_brief . ')'; ?>
            </p>
            </h5> </div>
              <div id="creative_brief">
                <h5 id="tab_head" data-toggle="modal" id='seo_brief' data-target="#exampleModalCenter3" style="background: #333;cursor: pointer;">Creative Content Brief
            <p class="float-right" >
              <?php echo '(' . $creative_brief . ')'; ?>
            </p>       
            </h5> </div>
              <div id="seo_brief">
                <h5 id="tab_head" data-toggle="modal" id='seo_brief' data-target="#exampleModalCenter4" style="background: #333;cursor: pointer;">SEO/SMM       
            </h5> </div>
            </div>
            <div class="tab">
              <div id='no_packages'>
                <h5 id="tab_head">No Packages Found
                </h5>
                <p>You haven't filled any of the Project Brief Form</p>
                <div id='hidden_data'></div>
              </div>
              <div id='web_packages' class='pack' style="display: none;">
                <h5 id="tab_head">Web Packages</h5>
                <div class="row" id='row_1'>
                  <?php foreach($packages as $row => $key): if($key->package_type == 'wb'): ?>
                    <label class='col' id='pack_web_<?php echo $key->id; ?>' style='max-width: 220px;'>
                      <input type="checkbox" onChange="myFunctions(pack_web_<?php echo $key->id; ?>, this)" class='dd' id='pack_single' name='packages[]' value="<?php echo $key->id; ?>">
                      <h3><center><?php echo $key->package_name; ?></center></h3>
                      <h1><center>$<?php echo $key->package_price; ?></center></h1>
                      <CENTER>
                        <div>
                          <?php $count = json_decode($key->package_features); 
                          if(!empty($count)):
                            for($j=0; $j<5; $j++){
                                echo $count[$j] . "<br>";
                            }
                          endif;
                          ?>
                        </div>
                      </CENTER>
                      </label>
                    <?php endif; endforeach; ?>
                </div>
              </div>
              <br>
              <div id='logo_packages' class='pack' style="display: none;">
                <h5 id="tab_head">Logo Packages</h5>
                <div class="row" id='row_1'>
                  <?php foreach($packages as $row => $key): if($key->package_type == 'lb'): ?>
                    <label class='col' id='pack_<?php echo $key->id; ?>' style='max-width: 220px;' >
                      <input type="checkbox" onChange="myFunctions(pack_<?php echo $key->id; ?>, this)" class='dd' id='pack_single' name='packages[]' value="<?php echo $key->id; ?>" >
                      <h3><center><?php echo $key->package_name; ?></center></h3>
                      <h1><center>$<?php echo $key->package_price; ?></center></h1>
                      <CENTER>
                        <div>
                          <?php $count = json_decode($key->package_features); 
                          if(!empty($count)):
                            for($i=0; $i<5; $i++){
                                echo $count[$i] . "<br>";
                            }
                          endif;
                          ?>
                        </div>
                      </CENTER>
                     </label>
                    <?php endif; endforeach; ?>
                </div>
                <br> </div>
               <div id='creative_packages' class='pack' style="display: none;">
                <h5 id="tab_head">Creative Content Packages</h5>
                <div class="row" id='row_1'>
                  <?php foreach($packages as $row => $key): if($key->package_type == 'cb'): ?>
                    <label class='col' id='pack_creative_<?php echo $key->id; ?>' style='max-width: 220px;'>
                      <input type="checkbox" onChange="myFunctions(pack_creative_<?php echo $key->id; ?>, this)" class='dd' id='pack_single' name='packages[]' value="<?php echo $key->id; ?>">
                      <h3><center><?php echo $key->package_name; ?></center></h3>
                      <h1><center>$<?php echo $key->package_price; ?></center></h1> 
                      <CENTER>
                        <div>
                          <?php $count = json_decode($key->package_features); 
                          if(!empty($count)):
                            for($i=0; $i<5; $i++){
                                echo $count[$i] . "<br>";
                            }
                          endif;
                          ?>
                        </div>
                      </CENTER>
                      </label>
                    <?php endif; endforeach; ?>
                </div>
                <br> </div>
                <div id='seo_packages' class='pack' style="display: none;">
                 <h5 id="tab_head">SEO/SMM Packages</h5>
                <div class="row" id='row_1'>
                  <?php foreach($packages as $row => $key): if($key->package_type == 'sb'): ?>
                    <label class='col' id='pack_seo_<?php echo $key->id; ?>' style='max-width: 220px;'>
                      <input type="checkbox"  onChange="myFunctions(pack_seo_<?php echo $key->id; ?>, this)" class='dd' id='pack_single' name='packages[]' value="<?php echo $key->id; ?>">
                      <h3><center><?php echo $key->package_name; ?></center></h3>
                      <h1><center>$<?php echo $key->package_price; ?></center></h1> 
                      <CENTER>
                        <div>
                          <?php $count = json_decode($key->package_features); 
                          if(!empty($count)):
                            for($i=0; $i<5; $i++){
                                echo $count[$i] . "<br>";
                            }
                          endif;
                          ?>
                        </div>
                      </CENTER>
                     </label>
                    <?php endif; endforeach; ?>
                </div>
                <br> </div>  
            </div>
            <div class="tab">
              <div style="margin: 0 auto;text-align:center;">
                <h5 id="tab_head">Choose any one Option</h2>
                                         
                                         <label>
                                          <input type="radio" id="test1" name="finish" value="pay" checked>
                                            <img style="padding:2rem;" src="https://st2.depositphotos.com/5266903/8783/v/950/depositphotos_87836152-stock-illustration-approve-payments-flat-icon.jpg" width="200">
                                            <center><p style="padding: 5px;">Pay Now</p></center>
                                        </label>

                                        <label>
                                          <input type="radio" id="test2" name="finish" value="consult">
                                            <img  style="padding:2rem;" src="https://swanson-apts.com/wp-content/uploads/2018/06/Man-Office-Icon.png" width="200">
                                            <center><p style="padding: 5px;">Book a Consultation</p></center>
                                        </label>
                            
                                </div>
    
  </div>
        <br> 
  <div style="overflow:auto;">
    <div style="margin: 0 auto;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

                    </div>
                </div>
        </div>
    </div>
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
                <form id="logo_brief_form" method="POST">
                  <input type="hidden" name="client_id" value="<?php echo $records; ?>">
                  <h5 id="tab_head2">Project Information</h5>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Project Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name *" required> </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Project Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="project_type" required>
                        <option value="">Select Project Type</option>
                        <?php foreach($department as $row => $key): ?>
                          <option value="<?php echo $key->department_id; ?>">
                            <?php echo $key->department_name; ?>
                          </option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <h5 id="tab_head2">Design Specification</h5>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Name of Logo</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="logo_name" id="logoname" placeholder="Exact Name To Be Appeared On Logo *" required> </div>
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
                      <select class="form-control" name="logo_style" required>
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
                      <input type="text" class="form-control" id="looknfeel" placeholder="Look And Feel *" name="look_and_feel" required> </div>
                  </div>
                  <div class="form-group row">
                    <label for="material" class="col-sm-4 col-form-label">Additional Comments*</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment" name="additional_comments" placeholder="Additional" rows="3" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="material" class="col-sm-4 col-form-label">Upload Brief:</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="upload_brief_file" id="upload_brief_file" required>
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
              <input type="hidden" name="client_id" value="<?php echo $records; ?>">
              <h5 id="tab_head">Project Information</h5>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Project Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name *" required> </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Project Type</label>
                <div class="col-sm-8">
                  <select class="form-control" name="project_type" required>
                    <option value="">Select Project Type</option>
                    <?php foreach($department as $row => $key): ?>
                      <option value="<?php echo $key->department_id; ?>">
                        <?php echo $key->department_name; ?>
                      </option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <h5 id="tab_head"> Specification</h5>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Content Tone</label>
                <div class="col-sm-8">
                  <select class="form-control" name="content_tone" required>
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
                  <select class="form-control" name="content_manner" required>
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
                  <textarea class="form-control" id="business_objectives" name="  business_objectives" rows="3" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Business Description *</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="business_description" name="business_description" rows="3" required></textarea>
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
                  <textarea class="form-control" id="unique_selling_point" name="unique_selling_point" rows="3" required></textarea>
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
                      <input type="file" class="form-control" name="upload_brief" id="upload_brief" required>
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
              <form id="website_brief_form" method="POST">
                <input type="hidden" name="client_id" value="<?php echo $records; ?>">
                <h5 id="tab_head">Project Information</h5>
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
                <h5 id="tab_head">Design Specification</h5>
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