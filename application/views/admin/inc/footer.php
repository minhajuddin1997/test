 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Dynasti</a>.</strong>
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

<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/js/pace.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/ekko-lightbox/ekko-lightbox.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script type="text/javascript">

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
    
    window.onload = function(){
        if($("#default_scheme").prop("checked")){
          $(this).val('1');
          $("#tab_colors").attr('disabled','disabled');
          $("#developer_nav_color").attr('disabled','disabled');
          $("#developer_nav_gradient").attr('disabled','disabled');
          $("#front_nav_color").attr('disabled','disabled');
          $("#front_nav_gradient").attr('disabled','disabled');
          $("#font_scheme").attr('disabled','disabled');
          $("#link_colors").attr('disabled','disabled');
        } else {
          $(this).val('0');
        }
    }

    $("#default_scheme").on('click',function(){
        if($(this).prop("checked")){
          $(this).val('1');
          $(this).attr('checked','checked');
          $("#tab_colors").attr('disabled','disabled');
          $("#developer_nav_color").attr('disabled','disabled');
          $("#developer_nav_gradient").attr('disabled','disabled');
          $("#front_nav_color").attr('disabled','disabled');
          $("#front_nav_gradient").attr('disabled','disabled');
          $("#font_scheme").attr('disabled','disabled');
          $("#link_colors").attr('disabled','disabled');
        } else {
          $(this).val('0');
          $(this).removeAttr('checked');
          $("#tab_colors").removeAttr('disabled','disabled');
          $("#developer_nav_color").removeAttr('disabled','disabled');
          $("#developer_nav_gradient").removeAttr('disabled','disabled');
          $("#front_nav_color").removeAttr('disabled','disabled');
          $("#front_nav_gradient").removeAttr('disabled','disabled');
          $("#font_scheme").removeAttr('disabled','disabled');
          $("#link_colors").removeAttr('disabled','disabled');
        }
    });

  
    $(document).ready(function(){
        // DATA TABLE
        $('#table_id').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
        // FILE UPLOAD
        $("body").on('change','.multi-image-upload :file',function(){
          
          if($(this).attr('id') == 'summary_file' || $(this).attr('id') == 'support_files_file' || $(this).attr('id') == 'comments_files_file'){
            var file = $(this).val();
            var fileType = file.split('.').pop();
          }else{
            var file = this.files[0];
            var fileType = file["type"];
          }
          if($(this).attr('id') == 'summary_file' || $(this).attr('id') == 'support_files_file' || $(this).attr('id') == 'comments_files_file'){
            var ValidImageTypes = ["docx","zip","pdf","xls","xlsm","pptx","txt","rar"];
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
        });
        // ACCOUNT STATUS
        $(".custom-control-input").on('change',function(){
            var status;
            var client_id = $(this).attr('id');
            if ($(this).is(':checked')) {
                status = 1;
            } else {
                status = 0;
            }
            var url = "<?php echo base_url(); ?>" + "admin/profile/account_status?id="+client_id+'&status='+status;
            $.ajax({
              type: "GET",
              url: url,
              dataType: "JSON",
              success: function (data) {
                 if(data){
                  toastr.success('Status Updated');
                 } else {
                  toastr.error('Error');
                 }
              }
          });
        });
        // PAYMENT DUE
        $(".payment_due").on('change',function(){
            var payment_due;
            var client_id = $(this).data('id');
            if ($(this).is(':checked')) {
                payment_due = 'Yes';
            } else {
                payment_due = 'No';
            }
            var url = "<?php echo base_url(); ?>" + "admin/projects/payment_due?id="+client_id+'&status='+payment_due;
            $.ajax({
              type: "GET",
              url: url,
              dataType: "JSON",
              success: function (data) {
                 if(data){
                  toastr.success('Status Updated');
                 } else {
                  toastr.error('Error');
                 }
              }
            });
        });
    });
      

</script>

</body>
</html>
