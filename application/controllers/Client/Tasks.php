<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tasks extends Client_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $client_id = $this->session->userdata('client_id');
        $data = array(
          'select' => '*',
          'table' => 'projects_tasks',
          'where' => array('client_id' => $client_id,'task_status'=>1),
        );
        $general['records'] = json_decode(json_encode($this->admin_m->get($data)));
     
        $general['main_content'] = 'client/tasks/list';
        $general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
	}

    public function edit($id){
        if(!empty($_POST)):
            $table='projects_tasks';
            foreach($_POST as $key => $val){           
                  if(strpos($key ,'slug') !== false){
                    $result = check_slug($table,$this->input->post($key));          
                    $data[$key] = $result;          
                  }
                  else{
                    $data[$key] = $this->input->post($key);  
                  }       
            }
            $result = $this->admin_m->update_data($table,$data,array('projects_tasks_id'=>$id));
            if($result):
              $this->session->set_flashdata('msg', '1');
              $this->session->set_flashdata('alert_data', 'Updated Successfully');
              redirect('client/tasks');
            else:
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Error');
              redirect('client/tasks');
            endif;
        else:
            $general['records'] = $this->admin_m->get(array('table' =>'projects_tasks', 'where' => array('projects_tasks_id'=> $id), 'output_type'=>'row'));
            $general['main_content'] = 'client/tasks/edit';
            $general['permission'] = $this->permission;
            $this->load->view('client/inc/view', $general);
        endif;
    }
    
    public function delete($id){
        $result = $this->admin_m->update_data('projects_tasks',array('task_status'=>0),array('projects_tasks_id'=>$id));
        if($result):
          $this->session->set_flashdata('msg', '1');
          $this->session->set_flashdata('alert_data', 'Deleted Successfully');
          redirect('client/tasks');
        else:
          $this->session->set_flashdata('msg', '2');
          $this->session->set_flashdata('alert_data', 'Error');
          redirect('client/tasks');
        endif;
    }
  public function add(){
    if(!empty($_POST)){
        $table='projects_tasks';
        foreach($_POST as $key => $val){           
              if(strpos($key ,'slug') !== false){
                $result = check_slug($table,$this->input->post($key));          
                $data[$key] = $result;          
              }
              else{
                $data[$key] = $this->input->post($key);  
              }       
        }
  
        $id = $this->admin_m->add_data($table,$data);
    
        if(!empty($id)){        
          $this->session->set_flashdata('msg', '1');
          $this->session->set_flashdata('alert_data', 'Added Successfully');
           redirect('client/tasks');
        } else{
          $this->session->set_flashdata('msg', '2');
          $this->session->set_flashdata('alert_data', 'Failed To Add');
          redirect('client/tasks');
        } 
    } else{
        $general['records'] = $this->admin_m->get_list('client_projects', array('client_id'=> $this->session->userdata('client_id')));
        $general['client_records'] = $this->admin_m->get_list('client');
        $general['main_content'] = 'client/tasks/add';
        $general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
    }
  }

}
?>