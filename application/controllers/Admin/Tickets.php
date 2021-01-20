<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tickets extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = $this->admin_m->get_list('tickets');
        $general['records'] = $result;
        $general['main_content'] = 'admin/tickets/list';
        $general['permission'] = $this->permission;
        $this->load->view('admin/inc/view', $general);
    }
    
    public function add()
    {
        if(!empty($_POST))
        {
            $_POST['generated_by'] = $this->session->userdata('client_id');
            $rand = 'TICK' . strtoupper(substr(uniqid(sha1(time())),0,5));
            $_POST['ticket_no'] = $rand;
            $email = get_value_by_id('client',$this->session->userdata('client_id'), 'client_email');
            if(!empty($email)):
                $section['body'] = '<table>';
                $section['body'] .= '<tr><td>Thank you for reaching out to Dynisty Brandings<td></tr>';
                $section['body'] .= '<tr><td><br>A New Ticket has been opened with the reference ID of '.$rand.'.</td></tr>';
                $section['body'] .= '<tr><td><br><i>This is a computer generated email and does not require a reply.</i></td></tr>';
                $section['body'] .= '</table>';
                $section['subject'] = 'A Ticket has been generated';
                $body = $this->load->view('email/template', $section, TRUE);
                $result = send_email($email, 'Dynisty Brandings: Ticket has been generated.', $body);
            endif;
            $path = './uploads/tickets';
            $file = summary_file_upload($_FILES['attachment_file'],$path);
            $_POST['attachment_file'] = $file;
            $res = $this->admin_m->add_data('tickets', $_POST);
            if($res):
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Ticket has been opened.');
                redirect('client/tickets');
            else:
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'An error occured.');
            endif;
        } 
        else
        {
            $general['main_content'] = 'client/tickets/create';
            $general['permission'] = $this->permission;
            $this->load->view('client/inc/view', $general);
        }
    }
    
    public function edit($id)
    {
        if(!empty($_POST))
        {
            $_POST['generated_by'] = $this->session->userdata('client_id');
            $rand = 'TICK' . strtoupper(substr(uniqid(sha1(time())),0,5));
            $_POST['ticket_no'] = $rand;
            $email = get_value_by_id('client',$this->session->userdata('client_id'), 'client_email');
            if(!empty($email)):
                $section['body'] = '<table>';
                $section['body'] .= '<tr><td>Thank you for reaching out to Dynisty Brandings<td></tr>';
                $section['body'] .= '<tr><td><br>A New Ticket has been opened with the reference ID of '.$rand.'.</td></tr>';
                $section['body'] .= '<tr><td><br><i>This is a computer generated email and does not require a reply.</i></td></tr>';
                $section['body'] .= '</table>';
                $section['subject'] = 'A Ticket has been generated';
                $body = $this->load->view('email/template', $section, TRUE);
                $result = send_email($email, 'Dynisty Brandings: Ticket has been generated.', $body);
            endif;
            $path = './uploads/tickets';
            $file = summary_file_upload($_FILES['attachment_file'],$path);
            $_POST['attachment_file'] = $file;
            $res = $this->admin_m->add_data('tickets', $_POST);
            if($res):
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Ticket has been opened.');
                redirect('client/tickets');
            else:
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'An error occured.');
            endif;
        } 
        else
        {
            $data = array(
              'table'=>'tickets',
              'where'=>array('id' => $id)
            );
            $general['record'] = $this->admin_m->get($data);
            $general['main_content'] = 'admin/tickets/edit';
            $general['permission'] = $this->permission;
            $this->load->view('admin/inc/view', $general);
        }
    }
    
    public function convert_to_answered($id)
    {
        $data = array(
          'status' => 'Answered',
        );
        $res = $this->admin_m->update_data('tickets', $data, array('id'=>$id));
        if($res):
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated.');
            redirect('admin/tickets');
        else:
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Error.');
            redirect('admin/tickets');
        endif;
    }
    
    public function convert_to_open($id)
    {
        $data = array(
          'status' => 'Open',
        );
        $res = $this->admin_m->update_data('tickets', $data, array('id'=>$id));
        if($res):
            $this->session->set_flashdata('msg', '1');
            $this->session->set_flashdata('alert_data', 'Updated.');
            redirect('admin/tickets');
        else:
            $this->session->set_flashdata('msg', '2');
            $this->session->set_flashdata('alert_data', 'Error.');
            redirect('admin/tickets');
        endif;
    }
    
        
    public function answer()
    {
        if(!empty($_POST)):
            $res = $this->admin_m->add();
            if($res):
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Answered.');
                redirect("admin/tickets");
        else:
        
        endif;
    }
}
?>
