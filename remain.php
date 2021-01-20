  <form id="msform" name="msform"> 

                     
                            <!-- progressbar -->
                           <ul id="progressbar" >
                                <li class="active fas fa-user" ><strong style="font-family: Times New Roman;">Account</strong></li>
                                <li class="fas fa-project-diagram"></i><strong style="  font-family: Times New Roman;">Project Brief</strong></li>
                                <li class="fas fa-list"><strong style="font-family: Times New Roman;">Choose Package</strong></li>
                                <li class="fas fa-check"><strong style="font-family: Times New Roman;">Finish</strong></li>
                            </ul> 
                            <br>
                            <fieldset class='tabss' id='first'> 
                                <div class="form-card" id="firstForm">
                                    <h5 id="tab_head">Complete Account Information</h5> <br>
                                    <input type="text" name="phno" placeholder="Contact No." required=""> 
                                    <input type="email" name="email" placeholder="Email Id" id="emailss" required="">
                                     <input type="text" name="uname" placeholder="UserName" required=""> 
                                     <input type="password" name="pwd" placeholder="Password" required=""> 
                                     <input type="password" name="cpwd" placeholder="Confirm Password" required="">
                                     <center>
                                     <div class='row' style="margin: 0 auto;">

                                    <select class="selectpicker" style="background-color: #333; color:white;" multiple data-live-search="true">
                                      <option>Logo Brief</option>
                                      <option>Website Brief</option>
                                      <option>SEO/SMM Brief</option>
                                      <option>Creative Content Brief</option>
                                      <option>I want All!</option>
                                    </select>
                                    </div>
                                  </center>
                                </div> 
                                                                <div class="form-card" id="firstForm">

                                       <h5 id="tab_head">Business Details</h5>
                    <div class="form-group row">
                    <label for="company" class="col-sm-4 col-form-label">Company *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="company" name='company' >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="industry" class="col-sm-4 col-form-label">Industry *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="industry" name='industry' >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="briefdesc" class="col-sm-4 col-form-label">A Brief Description About Your Business</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="briefdesc" rows="3" name='briefdesc'></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="yourtarget" class="col-sm-4 col-form-label">Your Target Audience</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="yourtarget" name="yourtarget">
                    </div>
                    </div>
                  </div>
                                <input type="button" name="next" style="width:30%;" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset class='tabss' id='second'>
                                <div class="form-card" id="">
                                    <h2 class="fs-title">Mention Project Brief</h2> 
                                    <div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item" style="width:50%;" id="website_brief">
            <a href="#home" class="nav-link" data-toggle="tab">Website Brief</a>
        </li>
        <li class="nav-item" style="width:50%;" id="logo_brief">
            <a href="#profile" class="nav-link" data-toggle="tab">Logo Brief</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade" id="home">
            <br>
            <h5 id="tab_head">Design Specification</h5>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">Kindly state the purpose of your website: (Is it a selling/informative website or a personal blog? etc.) *</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment1" name="additionalcomment1" rows="3" ></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">As per the navigation of your website, kindly state the title of your WebPages: (E.g.: Company Profile, Contact us etc.) *</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment2"  name="additionalcomment2" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">What type of overall feeling would you like to project with your new Website Domain? (Corporate, fun, high-tech, etc...) Leave this field blank if you would like us to make this determination.</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment3" name="additionalcomment3" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">Please give a brief description of your business: (What type of products or services does your company supply? etc...) *</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment4" name="additionalcomment4" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">State the target audience of your website:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment5"  name="additionalcomment5" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">Do you have any specific design, preferences? If yes, please mention a reference: (If you have any particular likes or dislikes regarding any competitor's website etc.) *</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment6"  name="additionalcomment6" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="additionalcomment" class="col-sm-4 col-form-label">Do you have any additional comments?</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="additionalcomment7"  name="additionalcomment7" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="material1" class="col-sm-4 col-form-label">Upload Brief:</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="upload_brief_file" id="upload_brief_file">

                    </div>
                    </div>
                    <br>
            <h5 id="tab_head">Domain & Web Hosting Details</h5>
                    <p class="notifiied-p">Please give us a few details about the domain name and hosting of the website.</p>
                    <div class="form-group row radio-tn">
                        <label for="ihave" class="col-sm-4 col-form-label">Do you have a Domain Name?: *</label>
                        <div class="col-sm-8">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="yesydomname" name="nodomname1" value="Yes" class="custom-control-input">
                              <label class="custom-control-label" for="yesydomname">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="nodomname" name="nodomname1"  value="No" class="custom-control-input">
                              <label class="custom-control-label" for="nodomname">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row radio-tn">
                        <label for="ihave" class="col-sm-4 col-form-label">Do you want us to provide hosting for your website?: *</label>
                        <div class="col-sm-8">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="wanthostyes" name="wanthostyes1"  value="Yes"   class="custom-control-input">
                              <label class="custom-control-label" for="wanthostyes">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="wanthostno" name="wanthostyes1" value="No" class="custom-control-input">
                              <label class="custom-control-label" for="wanthostno">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="company" class="col-sm-4 col-form-label">Company *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="company" name='company' >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="industry" class="col-sm-4 col-form-label">Industry *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="industry" name='industry' >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="briefdesc" class="col-sm-4 col-form-label">A Brief Description About Your Business</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="briefdesc" rows="3" name='briefdesc'></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="yourtarget" class="col-sm-4 col-form-label">Your Target Audience</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="yourtarget" name="yourtarget">
                    </div>
                    </div>
                    <p class="notifiied-p"><span class="red-tn">Note :</span> We will send you a "Page under construction" template on your respective domain name, very soon. Meanwhile, our professional designers will be working on your custom website design. It will get uploaded as soon as you approve the final design.</p>
                    <br>
        
        </div>
        <div class="tab-pane fade" id="profile">
            <br>
            <h5 id="tab_head">Design Specification</h5>
             <div class="form-group row">
                <label for="material" class="col-sm-4 col-form-label">Name of Logo</label>
                <div class="col-sm-8">
                   <input type="text" class="form-control" name="logoname" id="logoname" placeholder="Exact Name To Be Appeared On Logo *" >
               </div>
            </div>
            <div class="form-group row">
              <label for="material" class="col-sm-4 col-form-label">Slogan (If Any)</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Slogan (If Any)"><br>
              </div>
            </div>
            <div class="form-group row">
              <label for="material" class="col-sm-4 col-form-label">Select Style of Logo</label>
              <div class="col-sm-8">
            <select class="form-control" id="styleoflogo" name="styleoflogo" >
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
                <input type="text" class="form-control" id="looknfeel" placeholder="Look And Feel *" name="looknfeel">
              </div>
            </div>
            <div class="form-group row">
              <label for="material" class="col-sm-4 col-form-label">Additional Comments*</label>
              <div class="col-sm-8">
                <textarea class="form-control" id="additionalcomment" name="additionalcomment" placeholder="Additional" rows="3"></textarea>
              </div>
            </div>
                    <div class="form-group row">
                    <label for="material" class="col-sm-4 col-form-label">Upload Brief:</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="upload_brief_file" id="upload_brief_file">
                      <input type="button" class='btn btn-info' name='upload_file' id='upload_file' >
                    </div>
                    </div>
             
             
              
                
   
        </div>
       
    </div>
</div>
                                </div> <input type="button" name="previous" style="width:30%;" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" id="project_brief" class="next action-button" style="width:30%;" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class='form-card'> 
      <div id='web_packages' >
                <h5 id="tab_head">Web Packages
                </h5>
    <div class="row" id='row_1'>
      <div class="col" id='web_package_1' style="background:#e6e4df; padding:3rem;color:black;">
          <input type="hidden" id='web_package_1' name='web_package_1'>
          <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
      <div class="col" id='web_package_2' style="background:#E6B86A;padding:3rem;color:white;">
        <input type="hidden" id='web_package_2' name='web_package_2'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
      <div class="col" id='web_package_3' style="background-color:#e6e4df;padding:3rem;color:black;">
        <input type="hidden" id='web_package_3' name='web_package_3'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
    </div>
    <div class="row" id='row_2'>
       <div class="col" id='web_package_4' style="background-color: #E6B86A; padding:3rem;color:white;">
        <input type="hidden" id='web_package_4' name='web_package_4'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
        </div>
       <div class="col" id='web_package_5' style="background-color:#e6e4df;padding:3rem;color:black;">
        <input type="hidden" id='web_package_5' name='web_package_5'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
      <div class="col" id='web_package_6' style="background-color:#E6B86A;padding:3rem;color:white;">
        <input type="hidden" id='web_package_6' name='web_package_6'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
    </div>
</div>
    <br>
      <div id='logo_packages'>

               <h5 id="tab_head">Logo Packages</h5>

    <div class="row" id='row_1' >
      <div class="col" id='logo_package_1' style="background-color:#E6B86A; padding:3rem;color:white;">
        <input type="hidden" id='logo_package_1' name='logo_package_1'>
          <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
      <div class="col" id='logo_package_2' style="background-color:#e6e4df;padding:3rem;color:black;">
         <input type="hidden" id='logo_package_2' name='logo_package_2' value='logo_package_2'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
      <div class="col" id='logo_package_3' style="background-color:#E6B86A;padding:3rem;color:white;">
         <input type="hidden" id='logo_package_3' name='logo_package_3' value='logo_package_3'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
    </div>
    <div class="row" id='row_2'>
       <div class="col" id='logo_package_4' style="background-color: #e6e4df; padding:3rem;color:black;">
        <input type="hidden" id='logo_package_4' name='logo_package_4' value='logo_package_4' >
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
        </div>
       <div class="col" id='logo_package_5' style="background-color:#E6B86A;padding:3rem;color:white;">
        <input type="hidden" id='logo_package_5' name='logo_package_5' value='logo_package_5' >
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
      <div class="col" id='logo_package_6' style="background-color: #e6e4df;padding:3rem;color:black;">
                <input type="hidden" id='logo_package_6' name='logo_package_6' value='logo_package_6'>
        <h1><center>$125</center></h1>
          <ul>
          <li>Ecommerce</li>
          <li>CRM</li>
          <li>CMS</li>
          </ul>
      </div>
    </div>

    <br>
  </div>
</div>
                               <input type="button" name="previous" style="width:30%;" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" style="width:30%;" value="Next Step" />
                            </fieldset>
                            <fieldset>
                               <div class="form-card"  style="margin: 0 auto;text-align:center;">
                                    <h5 id="tab_head">Choose any one Option</h2>
                                         
                                         <label>
                                          <input type="radio" id="test1" name="finish" value="pay" checked>
                                            <img  style="padding:2rem;" src="https://st2.depositphotos.com/5266903/8783/v/950/depositphotos_87836152-stock-illustration-approve-payments-flat-icon.jpg" width="200">
                                            <p style="padding: 5px;">Pay Now</p>
                                        </label>

                                        <label>
                                          <input type="radio" id="test2" name="finish" value="consult">
                                            <img  style="padding:2rem;" src="https://swanson-apts.com/wp-content/uploads/2018/06/Man-Office-Icon.png" width="200">
                                            <p style="padding: 5px;">Book a Consultation</p>
                                        </label>
                            
                                </div>
                                <input type="button" name="previous" style="width:30%;" class="previous action-button-previous" value="Previous" /> 

                                <input type="submit" name="submit" style="width:30%;" class="next action-button" value="Confirm" /> 
                               
                            </fieldset>
                         
                        </form>

                            <fieldset id="finish" style="display: none;padding:2rem;">
                               <div class="form-card" >
                                  <h2 class="fs-title text-center">Finish</h2> <br><br>
                                  <div class="row justify-content-center">
                                      <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                  </div> <br><br>
                                  <div class="row justify-content-center">
                                      <div class="col-7 text-center">
                                          <h5>You Have Successfully Signed Up</h5>
                                          <center><h5><a href='<?php echo base_url(); ?>front/register/pay' >Make Payment</a></h5></center><a href='' >
                                      </div>
                                  </div>
                              </div>
                            </fieldset>