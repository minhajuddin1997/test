<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Client <?php echo !empty($main_content) ? ucwords(explode('/',$main_content)[1]) : ''; ?> | Dynisty Brandings</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <script src="<?php echo base_url();?>assets/front/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <style>
    .login_logo {
      max-width:250px;
    }
    .btn-primary {
      background: #E6B86A;
      border: 1px solid #E6B86A;
    }
    .btn-primary:hover{
      background: #e09009;
      border: 1px solid #e09009;
    }
    a {
      color: #000000;
    }
    a:hover{
      color: #333;
    }
  </style>
</head>
<body class="hold-transition login-page" <?php 
        if(!empty($developer[0]->developer_login_background))
        { 
        ?>
        style="background:url('<?php echo base_url('uploads/developer/').$developer[0]->developer_login_background; ?>'); background-repeat:no-repeat;background-size:cover;" 
        <?php } 
        ?>>
    <?php if($this->session->flashdata('msg') == 1):?>
      <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
      <?php elseif($this->session->flashdata('msg') == 2):?>
        <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php endif;?>