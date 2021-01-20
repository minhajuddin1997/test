<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projects	extends Admin_Controller {

	public function index(){
    $general['title'] = 'All';
    $general['records'] = $this->admin_m->get_list('client_projects',array('client_projects_status'=>1));
    $general['main_content'] = 'admin/projects/list';
    $general['permission'] = $this->permission;
    $this->load->view('admin/inc/view', $general);
	}

  public function create(){
    if(!empty($_POST)){
      $table='client_projects'; 
      $id = $this->admin_m->add_data($table, $_POST);
      if(!empty($id)){        
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Added Successfully');
      } else{
        $this->session->set_flashdata('msg', '2');
        $this->session->set_flashdata('alert_data', 'Failed To Add');
        $data['main_content'] = 'admin/client/add';
        $general = $data + $this->general();    
        $this->load->view('admin/inc/view',$general);
      } 
      if($this->uri->segment(2) != "client"){
        redirect('admin/projects','refresh');
      }
    } else{
      $general['records'] = $this->admin_m->get_list('client_projects');
      $general['main_content'] = 'admin/projects/add';
      $general['permission'] = $this->permission;
      $this->load->view('admin/inc/view', $general);
    }
  }

  public function del($id){
    $data = $this->admin_m->update_data('client_projects', array('client_projects_status'=>0), array('client_projects_id'=>$id));
    if($data){
      $this->session->set_flashdata('msg', '1');
      $this->session->set_flashdata('alert_data', 'Deleted Successfully');
      redirect('admin/projects');
    }
  }

  public function edit($id){
    if(!empty($_POST)){
      $data = $this->admin_m->update_data('client_projects', $_POST, array('client_projects_id'=>$id));
      if($data){
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Updated Successfully');
        redirect('admin/projects');
      } else{
        $this->session->set_flashdata('msg', '2');
        $this->session->set_flashdata('alert_data', 'Error');
      }
    } else{
      $table = 'client_projects';  
      $data = array(
        'select'=>'*',
        'table'=>$table,
        'where'=>array('client_projects_id'=>$id),
        'output_type'=>'row'
      );
      $data2 = array(
        'table'=>'client',
      );   
      $general['id']=$id;
      $general['client_records']=$this->admin_m->get_list($data2);
      $general['records'] = $this->admin_m->get($data);
      $general['permission'] = $this->permission;
      $general['main_content'] = 'admin/projects/edit';
      $this->load->view('admin/inc/view',$general);
    }
  }

  public function convert_to_completed($id){
    $data = array(
      'complete_status' => 'pending'
    );
    $result = $this->admin_m->update_data('client_projects',$data,array('client_projects_id'=>$id));
    if($result){
       $this->session->set_flashdata('msg', '1');
       $this->session->set_flashdata('alert_data', 'Added Successfully');
      return redirect('admin/projects');
    } else{
       $this->session->set_flashdata('msg', '2');
       $this->session->set_flashdata('alert_data', 'Error');
    }
  }

  public function convert_to_pending($id){
    $data = array(
      'complete_status' => 'completed'
    );
    $result = $this->admin_m->update_data('client_projects',$data,array('client_projects_id'=>$id));
    if($result){
       $this->session->set_flashdata('msg', '1');
       $this->session->set_flashdata('alert_data', 'Updated Successfully');
       return redirect('admin/projects');
    } else{
       $this->session->set_flashdata('msg', '2');
       $this->session->set_flashdata('alert_data', 'Error');
    }
  }

  public function payment_due(){
    $data = array(
      'payment_due' => ($_GET['status'] == 'Yes') ? 'Yes' : 'No',
    );
    $result = $this->admin_m->update_data('client_projects',$data,array('client_projects_id'=>$_GET['id']));
    if($result){
      echo json_encode(1);
    } else{
      echo json_encode(0);
    }
  }

  public function list($value){
    $table = 'client_projects';     
    $general['title'] = $value;
    $general['records'] = $this->admin_m->get_list($table,array('complete_status'=>$value));
    $general['permission'] = $this->permission;
    $general['main_content'] = 'admin/projects/list';
    $this->load->view('admin/inc/view',$general);
  }

}
?>