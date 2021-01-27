 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Dynasti</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->

<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/adminlte.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/pace.min.js" ></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

    <!--Data Table-->

<script>

$('.custom-file-upload').on("change", function(){ 
        alert('s');
    }
);


</script>
<script type="text/javascript">
    $(function () {

    $('#table_id').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

$(document).ready(function() {
 
    $('.js-example-basic-multiple').select2();
        $("body").on('change','.multi-image-upload :file',function(){
          
          if($(this).attr('id') == 'summary_file' || $(this).attr('id') == 'support_files_file' || $(this).attr('id') == 'comments_files_file'){
            var file = $(this).val();
            var fileType = file.split('.').pop();
          }else{
            var file = this.files[0];
            var fileType = file["type"];
          }
          if($(this).attr('id') == 'summary_file' || $(this).attr('id') == 'support_files_file' || $(this).attr('id') == 'comments_files_file'){
            var ValidImageTypes = ["image/jpg","zip","pdf","xls","xlsm","pptx","txt","rar"];
          }else{
            var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
          }

          console.log(file);
          if ($.inArray(fileType, ValidImageTypes) < 0) {
            toastr.error("Invalid File Format");
          }else{
            if($(this).attr('id') == 'summary_file' || $(this).attr('id') == 'support_files_file' || $(this).attr('id') == 'comments_files_file'){
                var id = $(this).attr('id');
                var name = document.getElementById(id); 
                console.log(name.files.item(0).name);
                $("#file_name").html('Selected file: '+name.files.item(0).name);
                
            }else{
            var temp = $(this).parents('.multi-image-upload:last').clone();  
            $(this).parents('.input-group-btn').append(temp).find('input:last').val('');
            $(this).parents('.multi-image-upload').prepend('<i class="fa fa-times" aria-hidden="true"></i>');
            $(this).parents('.file-btn').siblings('img').attr('src',URL.createObjectURL(this.files[0]));      
            $(this).siblings('label').remove();
            }
          }
           $(".multi-image-upload").on('click','i',function(){    
              $(this).parents('.multi-image-upload').remove();
          })
        })
});

$("#logo_brief_form").on('submit', function(event){
  event.preventDefault();
  $("#finish").css('display','block');
  $.ajax({
    url: "<?php echo base_url('client/projects/logo_brief_submit'); ?>",
    type: "POST",
    data: $(this).serialize(),
    dataType: 'JSON',
    success: function(res){
      console.log(res);
      if(res == 1){
          toastr.success('Logo Brief Submitted');
          $('#exampleModalCenter').modal('hide');
      }
    }
  });
});
$("#website_brief_form").on('submit', function(event){
  event.preventDefault();
  $("#finish").css('display','block');
  $.ajax({
    url: "<?php echo base_url('client/projects/website_brief_submit'); ?>",
    type: "POST",
    data: $(this).serialize(),
    dataType: 'JSON',
    success: function(res){
            console.log(res);

      if(res == 1){
          toastr.success('Website Brief Submitted');
          $('#exampleModalCenter2').modal('hide');
      }
    }
  });
});

$(".dd").on('click',function(){
  let id = $(this).val();
  var sum=0;
  $.ajax({
    url: "<?php echo base_url('client/projects/get_package'); ?>/"+id,
    type: "POST",
    data: $(this).serialize(),
    dataType: 'JSON',
    success: function(res){
      console.log(fruits);
      $("#package").val(res[0].package_price);
    }
  });
});
window.onload = function(){
  var $form = $(".require-validation");
                          console.log("token");

  $('form.require-validation').bind('submit', function (e) {
    var $form = $(".require-validation"),
      inputSelector = ['input[type=email]', 'input[type=password]',
        'input[type=text]', 'input[type=file]',
        'textarea'
      ].join(', '),
      $inputs = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid = true;
    $errorMessage.addClass('hide');

    $('.has-error').removeClass('has-error');
    $inputs.each(function (i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));

      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }

  });

  function stripeResponseHandler(status, response) {

    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      var token = response['id'];
      

      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
      $form.get(0).submit();
    }
  }

}
</script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar/main.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-bootstrap/main.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
 
    $("#when").on('click',function(){
       console.log($("#project_type").val()); 
    });
    function dateCheck(from,to,check) {
    
        var fDate,lDate,cDate;
        fDate = Date.parse(from);
        lDate = Date.parse(to);
        cDate = Date.parse(check);
    
        if((cDate <= lDate && cDate >= fDate)) {
            return true;
        }
        return false;
    }
    var dates = ["12/01/2020", "12/15/2020"];

    // $('input[name="project_due_date"]').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     minYear: 1901,
    //     beforeShowDay: function(d) {
    //       var a = new Date(2012, 3, 10); // April 10, 2012
    //       var b = new Date(2012, 3, 20); // April 20, 2012
    //       return [true, a <= d && d <= b ? "my-class" : ""];
    //     }
    //     // maxYear: parseInt(moment().format('YYYY'),10)
    //   }, function(start, end, label) {
    //     $("#bir").on('change',function(){
    //         var years = moment().diff(start, 'years');
    //         if(dateCheck("12/01/2020", "12/15/2020",$(this).val()))
    //             toastr.success("Available");
    //         else
    //             toastr.error("Not Available");
    //     });
            
    // });


        (function() {
 
        // $input_field = $('#summary_file');
        // $("#summary_file").on('change',function(){
        //     if ( !(/\.(pdf|docx|xls|xlsm|pptx|txt|zip|rar)$/i).test( $input_field.val() )) {
        //   toastr.error('File Not allowed');
        //     $('#summary_file').val() == '';

        //   return false;
        //     }else{
        //         var name = document.getElementById('summary_file'); 
        //         console.log(name.files.item(0).name);
        //         $("#file_name").html('Selected file: '+name.files.item(0).name);
        //         return true;
        //     }
        // });
        
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();

        var canvas = document.getElementById("sig-canvas");
        var ctx = canvas.getContext("2d");
        ctx.strokeStyle = "#222222";
        ctx.lineWidth = 4;

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("mousedown", function(e) {
            drawing = true;
            lastPos = getMousePos(canvas, e);
        }, false);

        canvas.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);

        canvas.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas, e);
        }, false);

        // Add touch event support for mobile
        canvas.addEventListener("touchstart", function(e) {

        }, false);

        canvas.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var me = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(me);
        }, false);

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var me = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(me);
        }, false);

        canvas.addEventListener("touchend", function(e) {
            var me = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(me);
        }, false);

        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            }
        }

        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            }
        }

        function renderCanvas() {
            if (drawing) {
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.lineTo(mousePos.x, mousePos.y);
                ctx.stroke();
                lastPos = mousePos;
            }
        }

        // Prevent scrolling when touching the canvas
        document.body.addEventListener("touchstart", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchend", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchmove", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);

        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

        function clearCanvas() {
            canvas.width = canvas.width;
        }

        // Set up the UI
        var sigText = document.getElementById("sig-dataUrl");
        var sigImage = document.getElementById("sig-image");
        var clearBtn = document.getElementById("sig-clearBtn");
        var submitBtn = document.getElementById("sig-submitBtn");
        clearBtn.addEventListener("click", function(e) {
            clearCanvas();
            sigText.innerHTML = "Data URL for your signature will go here!";
            
           // sigImage.setAttribute("src", "");
        }, false);
        submitBtn.addEventListener("click", function(e) {
            var dataUrl = canvas.toDataURL();
            sigText.innerHTML = dataUrl;
            $("#sig_image").html('<img id="sig-image" src="'+ dataUrl +'" alt="Your signature will go here!"/>');
            // sigImage.setAttribute("src", dataUrl);
        }, false);

    })();
    
    
    $("#rush").change(function() {
    if(this.checked) {
        $("#payment").css('display','block');
        $("#payment").show();
    } else{
        $("#payment").css('display','none');
        $("#payment").hide();
    }
});
    
</script>
</body>
</html>
