<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Roles extends Client_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (in_array('viewRoles', $this->permission))
        {
            $general['records'] = $this->admin_m->get_list('role');
            $general['main_content'] = 'client/roles/list';
            $general['permission'] = $this->permission;
            $this->load->view('client/inc/view', $general);
        }
        else
        {
            redirect('client/dashboard');
        }
    }
    
    public function edit($id)
    {
        if (in_array('editRoles', $this->permission))
        {
            if (!empty($_POST))
            {
                $this->form_validation
                    ->set_rules('role_name', 'Role Name', 'trim|required');
                $this->form_validation
                    ->set_rules('role_permission[]', 'Permissions', 'trim|required');
                if ($this ->form_validation->run() == true)
                {
                    $content = ['role_name' => $this
                        ->input
                        ->post('role_name') , 'role_permission' => json_encode($this
                        ->input
                        ->post('role_permission')) , ];

                    $rr = $this
                        ->admin_m
                        ->update_data('role', $content, array(
                        'role_id' => $id
                    ));
                    $this
                        ->session
                        ->set_flashdata('msg', '1');
                    $this
                        ->session
                        ->set_flashdata('alert_data', 'Updated Successfully');
                    return redirect('client/roles', 'refresh');
                }
                else
                {
                    $this
                        ->session
                        ->set_flashdata('msg', '2');
                    $this
                        ->session
                        ->set_flashdata('alert_data', 'Role Already Exists');
                    return redirect('client/roles', 'refresh');
                }
            }
            else
            {
                $data = array(
                    'select' => 'role_permission, role_name',
                    'table' => 'role',
                    'where' => array(
                        'role_id' => $id
                    ) ,
                );
                $general['permission'] = $this
                    ->admin_m
                    ->get($data);
                $general['main_content'] = 'client/roles/edit';
                $this
                    ->load
                    ->view('client/inc/view', $general);
            }
        }
        else
        {
            redirect('client/dashboard');
        }
    }
    public function add()
    {
        if (in_array('createRoles', $this->permission))
        {
            $table = 'role';
            if (!empty($_POST))
            {
                $this->form_validation
                    ->set_rules('role_name', 'Role Name', 'trim|required|is_unique[role.role_name]');
                $this->form_validation
                    ->set_rules('role_permission[]', 'Permissions', 'trim|required');
                if ($this->form_validation->run() == true){
                    $content = ['role_name' => $this
                        ->input
                        ->post('role_name') , 'role_permission' => json_encode($this
                        ->input
                        ->post('role_permission')) , ];
                    $this
                        ->db
                        ->insert('role', $content);
                    $this
                        ->session
                        ->set_flashdata('msg', '1');
                    $this
                        ->session
                        ->set_flashdata('alert_data', 'Added Successfully');
                    return redirect('client/roles', 'refresh');
                } else{
                    $this
                        ->session
                        ->set_flashdata('msg', '2');
                    $this
                        ->session
                        ->set_flashdata('alert_data', 'Role Already Exists');
                    return redirect('client/roles', 'refresh');
                }
            } else{
                $data = array(
                    'select' => 'role_permission, role_name',
                    'table' => 'role',
                );
                $general['permission'] = $this
                    ->admin_m
                    ->get($data);
                $general['main_content'] = 'client/roles/add';
                $this
                    ->load
                    ->view('client/inc/view', $general);
            }
        } else{
            redirect('client/dashboard');
        }
    }
    public function delete($id)
    {
        if (in_array('deleteRoles', $this->permission))
        {
            $result = $this
                ->db
                ->delete('role', array(
                'role_id' => $id
            ));
            if ($result)
            {
                $this
                    ->session
                    ->set_flashdata('msg', '1');
                $this
                    ->session
                    ->set_flashdata('alert_data', 'Deleted Successfully.');
            }
            else
            {
                $this
                    ->session
                    ->set_flashdata('msg', '2');
                $this
                    ->session
                    ->set_flashdata('alert_data', 'Delete Failed');
            }
            redirect('client/roles', 'refresh');
        }
        else
        {
            redirect('client/dashboard');
        }
    }
}
?>
