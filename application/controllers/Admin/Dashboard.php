<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard	extends Admin_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index(){
      $ss = $this->admin_m->get_single_column('users', array('user_id' => $this->session->userdata('user_id')), 'last_login');
      if(!empty($ss)){
          $general['main_content'] = 'admin/dashboard';
          $general['permission'] = $this->permission;
          $this->load->view('admin/inc/view', $general);
      } else{
          $general['main_content'] = 'onetime';
          $this->load->view('admin/inc/view', $general);
      }
	}

  public function edit($table){     
    if($this->session->userdata('user_active')){
      $id = $this->uri->segment(3);
      $table_id = $table.'_id ';
      $data['records'] = $this->admin_m->get_list($table,array($table_id => $id));
      $data['main_content'] = 'admin/'.$table.'/edit';
      $general = $data + $this->general();    
      $this->load->view('admin/inc/view',$general);
    } else{
      redirect('login');
    }     
  }
  
}
?>