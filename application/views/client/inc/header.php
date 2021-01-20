<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo !empty($main_content) ? ucwords(explode('/',$main_content)[1]) : ''; ?> | <?php echo $this->setting->settings_site_title; ?></title>
  <!--Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/custom.css?v=<?php echo rand() * 32; ?>">
  <link rel='stylesheet' href='<?php echo base_url(); ?>assets/admin/assets/css/pace-theme-flat-top.css' >
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/dist/css/adminlte.min.css">
  <script src="<?php echo base_url();?>assets/front/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
	
	  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/fullcalendar-bootstrap/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/daterangepicker/daterangepicker.css">

  <script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
 

    $('input[type=checkbox]').each(function(){
      if($(this).is(':checked')){
          $(this).parent().parent().css('backgroundColor','#e8a127');
      }else{
          $(this).parent().parent().css('backgroundColor','#fff');
      }
    });

    function myFunctions(x, _this) {
      if (_this.checked) {
        x.style.backgroundColor = '#e8a127';
      } else  {
        x.style.backgroundColor = '#E6B86A';
      }
    }
  </script>
  <style>
/*  input[type="file"] {*/
/*    display: none;*/
/*}*/
/*.custom-file-upload {*/
/*    border: 1px solid #ccc;*/
/*    display: inline-block;*/
/*    padding: 6px 12px;*/
/*    cursor: pointer;*/
/*}*/
   .table-avatar  {
        border-radius: 50%;
        display: inline;
        width: 2.5rem;
        
    }
    .table-avatar:hover  {
        cursor:pointer;
    }
    .new-img-list {
        display: flex;
        align-items: center;
    }

    .new-img-list img {
        width: 50px;
    }
    .btn-info{
        background: #E6B86A;
        border: 1px solid #E6B86A;
    }
    .btn-info:hover{
      background:#e09009;
        border: 1px solid #e09009;
    }
    #packages .col input[type=checkbox] {
      display: none;
    }
    .pack .col {
      background: #E6B86A;
      padding: 3rem;
      margin:5px;
      border-radius:15px;
    }
    .pack .col:hover{
      cursor: pointer;
          transition: all .5s;
      background:#e3a43b;
    }
     a {
      color: #000000;
    }
    a:hover{
      color: #333;
    }
       .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #E6B86A;
      color:#000000;
    }
    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
      background-color: #E6B86A;
      color:#000000;
    }
    .page-item.active .page-link{
      background-color: #E6B86A;
      color:#000000;
      border: 1px solid #E6B86A;
    }
    .page-item .page-link:hover{
      background-color: #ffc107;
      color:#000000;
      border: 1px solid #ffc107;
    }
    #tab_head2{
      background: #E6B86A;color:white;padding:1rem;margin-bottom:2rem;
    }

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <?php if($this->session->flashdata('msg') == 1):?>
      <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
      <?php elseif($this->session->flashdata('msg') == 2):?>
        <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php endif;?>