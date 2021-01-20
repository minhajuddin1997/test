<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends Admin_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function details($id){
	   $data = array(
	       'select'=>"*",
	       'table'=>'client_projects',
	       'where'=>array('client_projects_id'=>$id),
	       'output_type'=>'row'
	    );
	    
	     $commentData = array(
	       'select'=>"*",
	       'table'=>'comments',
	       'where'=>array('project_id'=>$id),
	    );
	    
	    $general['comments'] = $this->admin_m->get($commentData);
	    $general['record'] = $this->admin_m->get($data);
        $general['main_content'] = 'admin/chat/view';
        $general['permission'] = $this->permission;
        $this->load->view('admin/inc/view', $general);
	}
	
    public function upload_muntiimage($table,$field,$id)
	{		
		$config['upload_path'] = './uploads/'.$table.'';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size']     = '0';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);		
		$files = $_FILES;
		$cpt = count($_FILES[$field]['name']);
		$cpt;
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['f']['name']= $files[$field]['name'][$i];
			$_FILES['f']['type']= $files[$field]['type'][$i];
			$_FILES['f']['tmp_name']= $files[$field]['tmp_name'][$i];
			$_FILES['f']['error']= $files[$field]['error'][$i];
			$_FILES['f']['size']= $files[$field]['size'][$i]; 
			if($this->upload->do_upload('f')){
				
				$file_detail = $this->upload->data();
				$data1['comments_images_img'] = $file_detail['file_name'];
				$data1['comments_id'] = $id;
				$result = $this->admin_m->add_data('comments_images',$data1);	
				
			}else{						
				if(strpos($this->upload->display_errors(), 'did not select') !== false){
					return 1;
				}else{
					return 1;
				}
			}
		}		
		return 1;
	}
	
	public function reply_comment(){
    	$data = array(
			'project_id' => $this->input->post('project_id'),
			'sender_id' => $this->input->post('sender_id'),
			'comments_text' => $this->input->post('comments_text'),
		);

		$return_id = $this->admin_m->add_data('comments',$data);

// 		$clientData = $this->admin_m->get_list_single('client_projects',array('client_projects_id'=>$this->input->post('project_id')));
		//$clientToMail = $clientData->client_id;
		
		if($return_id)
		{


			if(!empty($_FILES))
			{
				foreach($_FILES as $key => $val)  
				{  
					$this->upload_muntiimage('comments_images',$key,$return_id);
				}
			}

// 			if(!empty($_FILES))
// 			{
// 				foreach($_FILES as $keys => $val)  
// 				{  
// 					$this->upload_multifile('comments_files',$keys,$return_id);
// 				}
// 			}

			$this->session->set_flashdata('msg', '1');
			$this->session->set_flashdata('alert_data', 'Comment Successfull');
			
// 			redirect($_SERVER['HTTP_REFERER']);
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