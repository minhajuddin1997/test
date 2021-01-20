<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends Client_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function details($id){
	    $res = $this->db->select('projects_files.*, client_projects.*')
        ->from('client_projects')
        ->join('projects_files', 'projects_files.client_projects_id = ' . $id, 'left')
        ->where_in('client_projects.client_projects_id', $id)
        ->get();
        $data = array(
          'select'=>'*',
          'table'=>'comments',
          'where'=>array('project_id'=>$id)
        );
        $data2 = array(
           'select' => '*',
           'table' => 'projects_files',
           'where'=> array('client_projects_id'=>$id)
        );
        $general['comments'] = $this->admin_m->get($data);
        $general['files'] = $this->admin_m->get($data2);
	    $general['record'] = $res->result();
        $general['main_content'] = 'client/chat/view';
        $general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
	}
	
	public function reply_comment(){
    	$data = array(
			'project_id' => $this->input->post('project_id'),
			'sender_id' => $this->input->post('sender_id'),
			'comments_text' => $this->input->post('comments_text'),
		);

		$return_id = $this->admin_m->add_data('comments',$data);
		$clientData = $this->admin_m->get_list_single('client_projects',array('client_projects_id'=>$this->input->post('project_id')));
		$clientToMail = $clientData->client_id;
		
		
		if($return_id)
		{
// 			$section['body'] = '<table>';
// 			$section['body'] .='<tr><td>Admin Name: '.get_name_by_id("user",$this->session->userdata('user_id')).'<br><td></tr>';
// 			$section['body'] .='<tr><td>Project Name: '.get_value_by_id("client_projects",$_POST['project_id'],'project_name').'<br><td></tr>';
// 			$section['body'] .='<tr><td>Comment on project: '.$_POST['comments_text'].'<br><td></tr>';
// 			$section['body'] .='<tr><td><br>Use Following link to login into your dashboard</td></tr>';
// 			$section['body'] .='<tr><td><br>'.base_url("admin").'<br></td></tr>';
// 			$section['body'] .='<tr><td><br>This is a computer generated invoice and does not require signature.</td></tr>';
// 			$section['body'].= '</table>';
// 			$section['subject'] = 'New comment added by '.get_name_by_id("client",$_POST['sender_id']);
// 			$body = $this->load->view('email/template',$section, TRUE);
// 			$result = send_email(get_value_by_id("client",$clientToMail,'client_email'),'New comment on project',$body);

// 			if(!empty($_FILES))
// 			{
// 				foreach($_FILES as $key => $val)  
// 				{  
// 					$this->upload_muntiimage('comments_images',$key,$return_id);
// 				}
// 			}

// 			if(!empty($_FILES))
// 			{
// 				foreach($_FILES as $keys => $val)  
// 				{  
// 					$this->upload_multifile('comments_files',$keys,$return_id);
// 				}
// 			}

			$this->session->set_flashdata('msg', '1');
			$this->session->set_flashdata('alert_data', 'Comment Successfull');
			
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->session->set_flashdata('msg', '2');
			$this->session->set_flashdata('alert_data', 'Comment Failed');
			redirect($_SERVER['HTTP_REFERER']);
		}
	
	}
}
?>