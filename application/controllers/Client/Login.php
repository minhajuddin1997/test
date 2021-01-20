<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login	extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
	}
	public function index(){
        if (!empty($_POST)){
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $result = $this->admin_m->get_list('client', array('client_email' => $email));
            if ($result){
                foreach ($result as $row){
                    $id = $row->client_id;
                    $pass = $row->client_password;
                    $email = $row->client_email;
                    $image = $row->client_image;
                    $name = $row->client_name;
                    $role_id = $row->role_id;
                   // $phone = $row->user_phone_number;
                    $client_login_detail = $row->client_login_detail;
                }
            // if ($this->encryption->decrypt($pass) == $password){
                
                if ($pass == $password && !empty($role_id) && $client_login_detail == 'enable'){
                        $getLoginData = array(
                            'select'=>'login_times',
                            'table'=>'client',
                            'where'=>array('client_id'=>$id),
                            'output_type' => 'row'
                        );
                        $val = $this->admin_m->get($getLoginData);
                        $total = $val->login_times + 1;
                        $session_data = array(
                            'client_id' => $id,
                            'client_email' => $email,
                            'client_name' => $name,
                            'client_image' => $image,
                            'online_status' => 'yes',
                            'role_id' => $role_id,
                        );
                        $this->session->set_userdata($session_data);
                        $data3 = array('online_status' => 'yes', 'last_login' => date('Y-m-d H:i:s'), 'login_times'=>$total);
                        $this->admin_m->update_data('client', $data3, array('client_id' => $id));
                        $this->session->set_flashdata('msg', '1');
                        $this->session->set_flashdata('alert_data', 'Login Successfull.');
    
                        redirect('client/dashboard');
                    } else{
                        $this->session->set_flashdata('msg', '2');
                        $this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
                        redirect('client/login');
                    }
            } else{
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
                redirect('client/login');
            }

        } else{
            if(!$this->session->userdata('client_id')){
                $general['data'] = $this->uri->segment(1);
                $general['developer'] = $this->admin_m->get_list('developer');
                $general['main_content'] = 'client/login';
                $this->load->view('client/inc_login/view', $general);
            } else{
                redirect('client/dashboard');
            }
        }
  
	}

    public function logout(){
        if($this->session->userdata('client_id')){
            $data3 = array('online_status' => 'no');
            $this->admin_m->update_data('client', $data3, array('client_id' => $this->session->userdata('client_id')));
            $this->session->unset_userdata('client_id');

            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'You have been logged out.');
            redirect('client/login');
        }
    }
}
?>