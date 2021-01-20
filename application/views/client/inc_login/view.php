<?php
	$this->load->view('client/inc_login/header');
	$this->load->view('client/inc_login/side_nav');
	$this->load->view('client/inc_login/nav');
	isset($main_content)?$this->load->view(''.$main_content.''):'';
	$this->load->view('client/inc_login/footer');	
?>