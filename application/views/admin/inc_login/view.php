<?php
	$this->load->view('admin/inc_login/header');
	$this->load->view('admin/inc_login/side_nav');
	$this->load->view('admin/inc_login/nav');
	isset($main_content)?$this->load->view(''.$main_content.''):'';
	$this->load->view('admin/inc_login/footer');	
?>