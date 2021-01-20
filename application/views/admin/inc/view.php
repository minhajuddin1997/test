<?php
	$this->load->view('admin/inc/header');
	$this->load->view('admin/inc/nav');
	$data['permission'] = $permission;
	$this->load->view('admin/inc/side_nav', $data);
	isset($main_content)?$this->load->view(''.$main_content.''):'';
	$this->load->view('admin/inc/footer');	
?>