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
            $result = $this->admin_m->get_list('users', array('user_email' => $email));
            if ($result){
                foreach ($result as $row){
                    $id = $row->user_id;
                    $pass = $row->user_pass;
                    $email = $row->user_email;
                    $image = $row->user_image;
                    $name = $row->user_name;
                    $role_id = $row->role_id;
                   // $phone = $row->user_phone_number;
               //     $client_login_detail = $row->client_login_detail;
                }

            if ($pass == $password){
                    $session_data = array(
                        'user_id' => $id,
                        'user_email' => $email,
                        'user_name' => $name,
                        'user_image' => $image,
                        'online_status' => 'yes',
                        'role_id' => $role_id,
                    );
              
                    $this->session->set_userdata($session_data);

                    // $section['body'] = '<table>';
                    // $section['body'] .= '<tr><td>User Profile Service.<br><br> you have been logged on with the your profile for the system, if its not you, contact your administrator.<td></tr>';
                    // $section['body'] .= '<tr><td><br>Client Name:' . $name . '</td></tr>';
                    // $section['body'] .= '<tr><td><br>' . base_url("") . '<br><br></td></tr>';
                    // $section['body'] .= '<tr><td><br>This is a computer generated email and does not require a reply.</td></tr>';
                    // $section['body'] .= '</table>';
                    // $section['subject'] = 'User logged in into Pluto Projects Dashboard';
                    // $body = $this->load->view('email/template', $section, TRUE);
                    // //send_email($this->second,'User logged in into Pluto Projects Dashboard',$body);
                    // $result = send_email($this->oip_email, 'User logged in into Pluto Projects Dashboard', $body);


                    $data3 = array('online_status' => 'yes', 'last_login' => date('Y-m-d H:i:s'));
                    $this->admin_m->update_data('users', $data3, array('user_id' => $id));
                    $this->session->set_flashdata('msg', '1');
                    $this->session->set_flashdata('alert_data', 'Login Successfull.');

                    redirect('admin/dashboard');
                } else{
                    $this->session->set_flashdata('msg', '2');
                    $this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
                    redirect('admin/login');
                }
            } else{
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Invalidss Email Or Password.');
                redirect('admin/login');
            }

        } else{
            if(!$this->session->userdata('user_id')){
                $general['data'] = $this->uri->segment(1);
                $general['developer'] = $this->admin_m->get_list('developer');
                $general['main_content'] = 'admin/login';
                $this->load->view('admin/inc_login/view', $general);
            } else {
                redirect('admin/dashboard');
            }
        }
  
	}

    public function logout(){
        if($this->session->userdata('user_id')){
            $data3 = array('online_status' => 'no');
            $this->admin_m->update_data('users', $data3, array('user_id' => $this->session->userdata('user_id')));
            $this->session->unset_userdata('user_id');

            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'You have been logged out.');
            redirect('admin/login');
        }
    }
    public function not_found(){
        $general['main_content'] = 'admin/not_found';
        $this->load->view('admin/inc_login/view', $general);
    }
}
?>