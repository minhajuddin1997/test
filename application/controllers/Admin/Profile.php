<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Admin_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index($id){
	    $data = array(
	       'select'=>'*',
	       'table'=>'users',
	       'where' => array('user_id' => $this->session->userdata('user_id')),
	       'output_type'=>'row'
	    );
	    $general['id']=$id;
	    $general['records']=$this->admin_m->get($data);
        $general['main_content'] = 'admin/profile/view';
        $this->load->view('admin/inc/view', $general);
	}
    
    public function get_client_profile($id){
	    $data = array(
	       'select'=>'*',
	       'table'=>'client',
	       'where' => array('client_id' => $id),
	       'output_type'=>'row'
	    );
	    $general['id']=$id;
	    $general['records']=$this->admin_m->get($data);
        $general['main_content'] = 'admin/profile/client_view';
        $this->load->view('admin/inc/view', $general);
	}
	
	public function edit_client($id){
	    if(!empty($_POST)){
	        if(!empty($_FILES['client_image']['name'])){
	            $path = './uploads/client';
	            $image_profile = image_file_upload($_FILES['client_image'], $path);
	            $_POST['client_image'] =  $image_profile;
	        }
	        if(!empty($_FILES['client_cover_image']['name'])){
	            $path = './uploads/client';
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
              return redirect('admin/profile/get_client_profile/'.$id);
           } else{
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Error in Updating');
           }
	    } else{
    	    $general['id']=$id;
            $general['main_content'] = 'admin/profile/client_view';
            $this->load->view('admin/inc/view', $general);
	    }
	}
    
    public function edit($id){
	    if(!empty($_POST)){
	        if(!empty($_FILES['user_image']['name'])){
	            $image_profile = image_file_upload($_FILES['user_image']);
	            $_POST['user_image'] =  $image_profile;
	        }
	        if(!empty($_FILES['user_cover_image']['name'])){
	            $image_cover = image_file_upload($_FILES['user_cover_image']);
	            $_POST['user_cover_image'] = $image_cover;
	        }
            
            if($image_profile['status'] == 'error' || $image_cover['status'] == 'error'){
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Error Uploading File');
            }
           $res = $this->admin_m->update_data('users', $_POST, array('user_id' => $id));
           if($res){
              $this->session->set_flashdata('msg', '1');
              $this->session->set_flashdata('alert_data', 'Profile Settings Updated');
              return redirect('admin/profile/index/'.$id);
           } else{
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Error in Updating');
           }
	    } else{
    	    $general['id']=$id;
            $general['main_content'] = 'admin/profile/view';
            $this->load->view('admin/inc/view', $general);
	    }
	}
	
	public function account_status(){
	    if(!empty($_GET)){
	        $status = $_GET['status'];
	        $res = $this->admin_m->update_data('client',array('client_status'=>$status), array('client_id'=>$_GET['id']));
	        if(!empty($res)){
	            echo json_encode($res);
	        }
	    }
	}

}
?>