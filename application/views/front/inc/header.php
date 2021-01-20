<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo !empty($main_content) ? ucwords(explode('/',$main_content)[1]) : ''; ?> | Dynisty Brandings</title>
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
  
  <script>
    $('input[type=checkbox]').each(function(){
      if($(this).is(':checked')){
          $(this).parent().parent().css('backgroundColor','#e3a43b');
          $(this).parent().parent().css('borderColor','#636159');
      }else{
          $(this).parent().parent().css('backgroundColor','#fff');
          $(this).parent().parent().css('borderColor','#E6B86A');
      }
    });

    function myFunctions(x, _this) {
      if (_this.checked) {
        x.style.backgroundColor = '#e8a127';
        x.style.borderColor = '#636159';
      } else  {
        x.style.backgroundColor = '#fff';
        x.style.borderColor = '#E6B86A';
      }
    }

</script>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');
    #logo_packages .col input[type=checkbox] {
      display: none;
    }
     #web_packages .col input[type=checkbox] {
      display: none;
    }
     #creative_packages .col input[type=checkbox] {
      display: none;
    }
     #seo_packages .col input[type=checkbox] {
      display: none;
    }
    .pack .col {
      background: #fff;
      padding-top: 0.6rem;
      margin:5px;
      border-radius:4px;
      height:300px;
      border: 2px dashed #E6B86A;
      transition: all .5s;
    }
    .pack .col:hover{
      cursor: pointer;
      transition: all .5s;
      height:300px;
    }
    label{
      text-align:left;
    }
   h1,h2,h3 {
    font-family: Times New Roman !important;
    color: #000000;
   }
   input, label{
     font-family: Raleway !important;
    color: #000000;
   }
   * {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}
#nextBtn{
  background-color: #E6B86A;
}
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

#projectBrief .bootstrap-select > .dropdown-toggle.bs-placeholder:hover{
  color: white;
  padding: 5rem !important;
  background-color: #E6B86A !important;

}
.filter-option{
  background: #E6B86A;
  padding:1.2rem !important;
  width: 100% !important;
  color: #000000;
}
.filter-option-inner-inner{
  margin-top: -15px;
  color:white;
}
.filter-option-inner-inner:after{
  content: "!";
}


#test1 { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}
#test1 + img {
  cursor: pointer;
  border: 1.5px solid #c9c9c9;
  border-radius: 10px;
}
#test1:checked + img {
  border: 1.5px solid #cf8e0c;
  border-radius: 10px;
}

#test2 { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}
#test2 + img {
  cursor: pointer;
  border: 1px solid #c9c9c9;
  border-radius: 10px;
}
#test2:checked + img {
  border: 1px solid #cf8e0c;
  border-radius: 10px;
}

.main {
  font-size: 120%;
  color: red;
}
.btn-link{
  color:#E6B86A;
  font-weight: 999;
}

* {
    margin: 0;
    padding: 0;

}
body {


}
h2{
  font-family: Times New Roman;
}
html {
    height: 100%;
    background: #e6e5e3;
}

.btn_custom {
  background: #E6B86A;
  border: 1px solid #E6B86A;
}
.btn_custom:hover {
    background: #eda326;
      border: 1px solid #eda326;
}
.btn_custom a {
  color:white;
}
#grad1 {
    background-color: : #9C27B0;
    background-image: linear-gradient(180deg, #e6e5e3, #e6e5e3);
    height:100vh;
    font-family: Raleway, Times New Roman !important;
}


#tab_head{
  background: url('<?php echo base_url(); ?>/uploads/developer/tab_head.jpg');color:white;padding:1rem;margin-bottom:2rem;
}

#tab_head2{
  background: #E6B86A;color:white;padding:1rem;margin-bottom:2rem;
}

</style>
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/18c13782b94c9819b3ddf1d49/42ee4e9b7fe762b04485b0cab.js");</script>
</head>
<body class="hold-transition login-page" >
    <?php if($this->session->flashdata('msg') == 1):?>
      <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
      <?php elseif($this->session->flashdata('msg') == 2):?>
        <script>toastr.error('<?php echo $this->session->flashdata('alert_data');?>');</script>
    <?php endif;?>