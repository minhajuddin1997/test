<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Developer	extends Admin_Controller {
	public function index(){
      if(!empty($_POST)){
          $content = array(
              'developer_nav_color' => $this->input->post('developer_nav_color'),
              'developer_nav_gradient' => $this->input->post('developer_nav_gradient'),
              'front_nav_gradient' => $this->input->post('front_nav_gradient'),
              'front_nav_color' => $this->input->post('front_nav_color'),
              'default_status'=>empty($this->input->post('default_status')) ? '0' : '1',
          );
          $res = $this->admin_m->update_data('developer', $content, array('developer_id' => '1'));
          if($res){
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated Successfully');
            redirect('admin/developer');
          }
      }else{
          $general['records'] = $this->admin_m->get_list('developer');
          $general['main_content'] = 'admin/developer/edit';
          $general['permission'] = $this->permission;
          $this->load->view('admin/inc/view', $general);
      }
	}

    public function photo_upload($val){
        $path = './uploads/developer';
        $image = image_file_upload($_FILES[$val],$path);
        if($image['status'] == 'error'){
          $this->session->set_flashdata('msg', '2');
          $this->session->set_flashdata('alert_data', 'Error Uploading File');
          redirect('admin/developer');
        } else {
          $this->admin_m->update_data('developer', array($val=>$image), array('developer_id' => '1'));      
          $this->session->set_flashdata('msg', '1');
          $this->session->set_flashdata('alert_data', 'Uploaded!');
          redirect('admin/developer');
        }
    }
}
?>