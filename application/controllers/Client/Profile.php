<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Client_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index($id){
	    $data = array(
	       'select'=>'*',
	       'table'=>'client',
	       'where' => array('client_id' => $this->session->userdata('client_id')),
	       'output_type'=>'row'
	    );
	    $general['id']=$id;
	    $general['records']=$this->admin_m->get($data);
        $general['main_content'] = 'client/profile/view';
        $this->load->view('client/inc/view', $general);
	}
    
    public function edit($id){
	    if(!empty($_POST)){
	   		$path = './uploads/client';
	        if(!empty($_FILES['client_image']['name'])){
	            $image_profile = image_file_upload($_FILES['client_image'], $path);
	            $_POST['client_image'] =  $image_profile;
	       }
	        if(!empty($_FILES['client_cover_image']['name'])){
	            $image_cover = image_file_upload($_FILES['client_cover_image'], $path);
	            $_POST['client_cover_image'] = $image_cover;
	        }
            if($image_profile['status'] == 'error' || $image_cover['status'] == 'error'){
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Error Uploading File');
            }
           $res = $this->admin_m->update_data('client', $_POST, array('client_id' => $id));
           if($res){
              $this->session->set_flashdata('msg', '1');
              $this->session->set_flashdata('alert_data', 'Profile Settings Updated');
              return redirect('client/profile/index/'.$id);
           } else{
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Error in Updating');
           }
	    } else{
    	    $general['id']=$id;
            $general['main_content'] = 'client/profile/view';
            $this->load->view('client/inc/view', $general);
	    }
	}
}
?>