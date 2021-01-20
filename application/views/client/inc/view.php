<?php
	$this->load->view('client/inc/header');
	$this->load->view('client/inc/nav');
	$data['permission'] = $permission;
	$this->load->view('client/inc/side_nav', $data);
	isset($main_content)?$this->load->view(''.$main_content.''):'';
	$this->load->view('client/inc/footer');	
?>