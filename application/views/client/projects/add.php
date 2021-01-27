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
            <h1>Create Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
	<section class='content'  style="overflow: auto;">
	<div class="row">
    <div class="col-md-6">
     <div class="card collapsed-card">
       <div class="card-header" >
         <h3 class="card-title">Project Form</h3>
         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
           </button>
         </div>
       </div>
       <div class="card-body" >
             <form role="form" action="<?php echo base_url('client/projects/add')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" class="form-control" id="project_name" required name="project_name" >
                    </div>

                    <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id');?>">
                    <input type="hidden" name="delivery_status" value="Brief">


                    <div class="form-group">
                        <label>Project Type: </label>
                        <select class="form-control" id="project_type" name="project_type" required>
                            <?php $departments = get_list('main_department'); ?>
                            <option value="">Please Select</option>
                            <?php if(!empty($departments)): foreach($departments as $row):?>
                                <option value="<?php echo $row->main_department_id?>"><?php echo $row->main_department_name ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>

                    <div class="form-group" id="sub_project_type_main">
                        <label>Sub Project Type: </label>
                        <select class="form-control" id="sub_project_type" name="sub_project_type" required>
                       
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Project Summary</label>
                        <textarea class="form-control editor" rows="3" id="project_summary" name="project_summary"><?php echo !empty($record->project_summary)?$record->project_summary:''?></textarea>
                    </div>

                    <input type="hidden" name="uploaded_month" value="<?php echo date("m") ?>">

                    <div class="form-group">
                        <label>Upload Summary File</label>
                        <div class="form-group">
                            <label><p>Only these file format should be accepted .pdf, .docx, .pptx, .txt, .xlsx, .rar, .zip, .xlsm, .xls, .csv, .xlsb, .xlw, xltx</p>
                                 <span id="file_name"></span>
                            </label><div class="input-group-btn btn btn-info"><div class="multi-image-upload"><div class="file-btn"><input type="file" id="summary_file" name="summary_file" accept=".pdf, .docx, .pptx, .txt, .xlsx, .rar, .zip, .xlsm, .xls, .csv, .xlsb, .xlw, xltx" >

                            </div></div></div></div>
                       <!--  <div class="input-group-btn">
                            <div class="multi-image-upload"> -->
                                   <!--    <button id="showfileupload" style="border-color: #09af3b;color: #fff;background: #09af3b;font-size: 12px;" type="button" class="btn btn-primary "><b>Add Files</b></button> -->
                      <!--              <img src="'+linkvar+'">
                                <div class="file-btn">
                                    <input type="file" id="summary_file"  name="summary_file">
                                    <p>Only these file format should be accepted .pdf, .docx, .pptx, .txt, .xlsx, .rar, .zip, .xlsm, .xls, .csv, .xlsb, .xlw, xltx</p>
                                    <label class="btn btn-info">Upload</label>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="notvisiblefile">
                    </div>
                    
                    <div id="questionHtml"></div>
                    <div class="form-group" style="border: 1px dashed #E6B86A;border-radius: 20px;">
                        <canvas id="sig-canvas" width="500" height="100" required>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-default" id="sig-submitBtn">Submit Signature</button>
                        <button type="button" class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                    </div>

                    <div class="form-group">
                        <textarea style="display: none" id="sig-dataUrl" name="signature_path" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group" id='sig_image'>

                    </div>
                </div>

      
       </div>
     </div>
    </div>
    </div>

	<div class="row">
                    <div class="col-md-6">

     <div class="card collapsed-card">

       <div class="card-header" >
         <h3 class="card-title">When do you want this?</h3>
         <div class="card-tools">
           <button type="button" class="btn btn-tool" id="when" data-card-widget="collapse" data-toggle="collapse" data-target="#toggleDemo"><i class="fas fa-plus" ></i>
           </button>
         </div>
       </div>

        <div class="card-body">
            <div class="form-group">

                  <label>Date range:</label>
                  <small>Available dates are highlighted.</small>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input id="datepicker" name="client_projects_due_date" id='bir'>
                    <!-- <center><input type="text" id='bir' name="project_due_date" value="12/01/2020 - 12/15/2020" /></center> -->
                  </div>
                  <!-- /.input group -->
            </div>
            
                            <div class="form-group">
    
                      <label>Need it done on Rush basis?</label>
                      <div class="input-group">
                        <center><input type="checkbox" id='rush' name="rush" value="rush" ></center>
                      </div>
                      <!-- /.input group -->
                </div>
        </div>
     </div>
    </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
         <div class="card collapsed-card">
    
           <div class="card-header" >
             <h3 class="card-title">Additional Features (Optional)</h3>
             <div class="card-tools">
               <button type="button" class="btn btn-tool" id="when" data-card-widget="collapse" data-toggle="collapse" data-target="#toggleDemo"><i class="fas fa-plus" ></i>
               </button>
             </div>
           </div>
    
            <div class="card-body">
                <div class="form-group">
                    <div id='packages' class='pack'>
                      <div class="row" id='row_1'>
                        <?php $i=0; foreach($packages as $row => $key): ++$i; ?>
                          <label class='col'  id='pack_<?php echo $i; ?>' style='max-width: 350px;'>
                            <?php $data = array($key->package_name,$key->package_price); ?>
                            <input type="checkbox"  onChange="myFunctions(pack_<?php echo $i; ?>, this)" class='dd' id='pack_single' name='addons[]' value='<?php echo json_encode($data); ?>'>
                            <h3><center><?php echo $key->package_name; ?></center></h3>
                            <h1><center>$<?php echo $key->package_price; ?></center></h1> </label>
                          <?php endforeach; ?>
                      </div>
                    </div>
                </div>
                

            </div>
         </div>
        </div>
    </div>

              <div class="box-footer">
                    <button type="submit" id="submit_project" class="btn btn-info">Submit</button>
                </div>
                </form>
</section>
</div>
















<!-- Modal -->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" style="width: 150%;" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body">
                <form role="form" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_bbpGR0QxhGaiNwq94HzFyQbT" id="payment-form" >
                        <div class="form-row row required">
                              <label class="control-label">Name on Card</label> <input class="form-control"  type="text">
                        </div>
                        <div class="form-row row required">
                                <label class="control-label">Card Number</label> <input autocomplete="off" class="form-control card-number" size="20" type="text">
                          
                        </div>
                        <div class="form-row row">
                            <div class="col-xs-12 col-md-4 form-group cvc required">
                                <label class="control-label">CVC</label> <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text">
                            </div>
                            <div class="col-xs-12 col-md-4 form-group expiration required">
                                <label class="control-label">Expiration Month</label> <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text">
                            </div>
                            <div class="col-xs-12 col-md-4 form-group expiration required">
                                <label class="control-label">Expiration Year</label> <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text">
                            </div>
                        </div>
  
                        <div class="form-row row">
                            <div class="col-md-12 error form-group hide">
                                <div class="alert-danger alert">Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                        <input type='hidden' name='package_price' id='package' >
                       <!--  <input type='hidden' name='client_amount' value='<?php echo $client_amount; ?>'>
                        <input type='hidden' name='client_email' value='<?php echo $email->client_email; ?>'>
                        <input type='hidden' name='client_id' value='<?php echo $client_id; ?>'> -->
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                </form>
  </div>
</div>
</div>
</div>
<script>
$("#sub_project_type_main").css('display','none');
$("#project_type").on('change',function(){
    $("#sub_project_type_main").css('display','block');
    let value = $(this).val();
    $("#sub_project_type").empty();
    $.ajax({
      url: "<?php echo base_url('client/projects/get_sub_project_type'); ?>",
      type: "GET",
      data: {id: value},
      dataType: 'JSON',
      success: function(res){
        if(res.length > 0){
          for(var i = 0; i < res.length; i++){
              $("#sub_project_type")
              .append('<option value="'+res[i].department_id+'">'+res[i].department_name+ '</option>');
          }
        } else{
          toastr.error('Not found');
        }
      }
    });
});

</script>