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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/ekko-lightbox/ekko-lightbox.css">
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
     <script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    </script>
  <style>
    /*.image-upload label {*/
    /*position: relative;*/
    /*}*/

    /*.image-upload input[type=file] {*/
    /*    width: 69px;*/
    /*    height: 34px;*/
    /*    position: absolute;*/
    /*    z-index: 999;*/
    /*    opacity: 0;*/
    /*}*/
    
    /*.image-upload  i.fa.fa-times {*/
    /*    position: absolute;*/
    /*    top: -10px;*/
    /*    left: 135px;*/
    /*    font-size: 14px;    */
    /*    cursor: pointer;*/
    /*}*/
    
    .multi-image-upload img {
        width: 130px;
        height: auto;
        max-height: 250px;
        overflow: hidden;
    }
    
    .multi-image-upload label {
        position: relative;
    }
    
    .multi-image-upload input[type=file] {
        width: 69px;
        height: 34px;
        position: absolute;
        z-index: 999;
        opacity: 0;
    }
    
    .multi-image-upload  i.fa.fa-times {
        position: absolute;
        top: -10px;
        left: 135px;
        font-size: 14px;    
        cursor: pointer;
    }
    
    .multi-image-upload {
        display: inline-block;
        margin-right: 30px;
        vertical-align: middle;
        position: relative;
    }
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
        color: #000000;
    }
    #table_id td{
      text-align:center;
    }
    #table_id tr{
      text-align:center;
    }
    .btn-info:hover{
      background:#e09009;
      border: 1px solid #e09009;
      color: #000000;
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
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
  <?php if($this->session->flashdata('msg') == 1):?>
    <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php elseif($this->session->flashdata('msg') == 2):?>
      <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
  <?php endif;?>