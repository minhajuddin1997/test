<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Roles	extends Admin_Controller {
  public function __construct(){
        parent::__construct();
  }
	public function index(){
   //   $ss = $this->admin_m->get_single_column('users', array('user_id' => $this->session->userdata('user_id')), 'last_login')
      $general['records'] = $this->admin_m->get_list('role');
      $general['main_content'] = 'admin/roles/list';
      $general['permission'] = $this->permission;
      $this->load->view('admin/inc/view', $general);
	}
  public function edit($id){
   //   $ss = $this->admin_m->get_single_column('users', array('user_id' => $this->session->userdata('user_id')), 'last_login')
      if(!empty($_POST)){
         $this->form_validation->set_rules('role_name','Role Name','trim|required');
            $this->form_validation->set_rules('role_permission[]','Permissions','trim|required');
            if($this->form_validation->run() == TRUE) {
                $content = [
                    'role_name' => $this->input->post('role_name'),
                    'role_permission' => json_encode($this->input->post('role_permission')),
                ];

                $rr = $this->admin_m->update_data('role',$content, array('role_id' => $id));
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Updated Successfully');
                return redirect('admin/roles','refresh');
            } else{
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Role Already Exists');
                return redirect('admin/roles','refresh');
            }

      } else{
        $data = array(
          'select' => 'role_permission, role_name',
          'table' => 'role',
          'where' => array('role_id' => $id),
        );
        $general['records'] = $id;
        $general['permission'] = $this->admin_m->get($data);
        $general['main_content'] = 'admin/roles/edit';
        $this->load->view('admin/inc/view', $general);
     }
  }
  public function add(){
      $table='role';
      if(!empty($_POST)){
          $this->form_validation->set_rules('role_name','Role Name','trim|required|is_unique[role.role_name]');
          $this->form_validation->set_rules('role_permission[]','Permissions','trim|required');
          if($this->form_validation->run() == TRUE) {
              $content = [
                  'role_name' => $this->input->post('role_name'),
                  'role_permission' => json_encode($this->input->post('role_permission')),
              ];
              $this->db->insert('role',$content);
              $this->session->set_flashdata('msg', '1');
              $this->session->set_flashdata('alert_data', 'Added Successfully');
              return redirect('admin/roles','refresh');
          } else{
              $this->session->set_flashdata('msg', '2');
              $this->session->set_flashdata('alert_data', 'Role Already Exists');
              return redirect('admin/roles','refresh');
          }
      } else{
        $data = array(
            'select' => 'role_permission, role_name',
            'table' => 'role',
        );
        $general['permission'] = $this->admin_m->get($data);
        $general['main_content'] = 'admin/roles/add';
        $this->load->view('admin/inc/view', $general);
      }
  }
  public function delete($id){      
    $result = $this->db->delete('role',array('role_id' => $id));
    if($result){
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Deleted Successfully.');
    } else{
        $this->session->set_flashdata('msg', '2');
        $this->session->set_flashdata('alert_data', 'Delete Failed');
    }
    redirect('admin/roles','refresh');
        
  }
}
?>