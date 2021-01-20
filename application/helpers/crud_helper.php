<?php
error_reporting(1);
if(!function_exists('send_email')){
	function send_email($send_to,$subject,$body){
		$ci =& get_instance();
		//$config['mailtype'] ='html';
		$config = array(
             'protocol'  => 'SMTP',
             'smtp_host' => 'smtp.gmail.com',
             'smtp_port' => '465',
             'smtp_user' => 'support@dynistybranding.com',
             'mailtype'  => 'html', 
             'starttls'  => true,
             'charset'   => 'iso-8859-1'
         );
		$ci->email->initialize($config);    
   		$ci->email->set_newline("\r\n");

		$ci->email->set_header('Header1', 'Email Information');
		$ci->email->from("support@dynistybranding.com ","Email from Dynisty Brandings");
		$ci->email->to($send_to);		
		$ci->email->subject($subject);
		$ci->email->message($body);
		$ci->email->send();
	}
}
if (!function_exists('get_single_field'))
{
	function get_single_field($tabel="",$where="",$field="")		
	{	
		$ci =& get_instance();
		$result = $ci->admin_m->get_single_column($tabel,$where,$field);
		if($result){			
			return $result;
		}else{
			return FALSE;
		}	
	}	
}
if (!function_exists('get_list'))
{
	function get_list($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="")
	{		
		$ci =& get_instance();
		$records = $ci->admin_m->get_list($tabel,$where,$limit,$order_col,$order_by,$like);
		if($records){	
			return $records;
		}else{
			return  FALSE;
		}
			
	}
}
if (!function_exists('get_name_by_id'))
{
	function get_name_by_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->admin_m->get_list($table,$table.'_id='.$id);
		if($temp){			
			$name = $table.'_name';
			foreach($temp as $tp){
				$result = $tp->$name;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}

if (!function_exists('get_name_by_role_id'))
{
	function get_name_by_role_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->admin_m->get_list($table,$table.'role_id='.$id);
		if($temp){			
			$name = $table.'_name';
			foreach($temp as $tp){
				$result = $tp->$name;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}

if(!function_exists('image_file_upload')){	
	function image_file_upload($file, $path){   
		$_FILES['upload_brief_file']['name']= $file['name'];
		$_FILES['upload_brief_file']['type']= $file['type'];
		$_FILES['upload_brief_file']['tmp_name']= $file['tmp_name'];
		$_FILES['upload_brief_file']['error']= $file['error'];
		$_FILES['upload_brief_file']['size']= $file['size']; 
	
		$ci =& get_instance();
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png|jfif';
		$config['max_width'] = '400000';
		$config['max_height'] = '400000';
		$ci->load->library('upload', $config);
		$ci->upload->initialize($config);
		if(!$ci->upload->do_upload('upload_brief_file')){ 

			$error = array('error' => $ci->upload->display_errors());
			$error['status'] = 'error';
			return $error;
		} else{
			$file_detail = $ci->upload->data();
			return	$file_detail['file_name'];
		}
		return FALSE;
	}
}

if (!function_exists('get_value_by_id'))
{
    function get_value_by_id($table,$id,$field)
    {            
        $ci =& get_instance();
        $temp = $ci->admin_m->get_value_by_id($table,$id,$field);
        if($temp){          
            $result = $temp->$field;   
            return $result;
        }else{
            return FALSE;
        } 
    }
}
if (!function_exists('get_value_by_id_new'))
{
    function get_value_by_id_new($table,$field,$where)
    {            
        $ci =& get_instance();
        $temp = $ci->admin_m->get_value_by_id_new($table,$field,$where);
        if($temp){          
            $result = $temp->$field;   
            return $result;
        }else{
            return FALSE;
        } 
    }
}

if(!function_exists('brief_file_upload')){	
	function brief_file_upload($file){   

		$_FILES['upload_brief_file']['name']= $file['name'];
		$_FILES['upload_brief_file']['type']= $file['type'];
		$_FILES['upload_brief_file']['tmp_name']= $file['tmp_name'];
		$_FILES['upload_brief_file']['error']= $file['error'];
		$_FILES['upload_brief_file']['size']= $file['size']; 
	
		$ci =& get_instance();
		$config['upload_path'] = './uploads/register';
		$config['allowed_types'] = 'pdf|docx|pptx|txt|xlsx|rar|zip|xlsm|xls|csv|xlsb|xlw|xltx';
		$config['max_width'] = '400000';
		$config['max_height'] = '400000';
		$ci->load->library('upload', $config);
		$ci->upload->initialize($config);
		if(!$ci->upload->do_upload('upload_brief_file')){ 

			$error = array('error' => $ci->upload->display_errors());
			$error['status'] = 'error';
			return $error;
		}
		else
		{
			$file_detail = $ci->upload->data();
			return $file_detail['file_name'];
		}
		return FALSE;
	}
}	


if(!function_exists('summary_file_upload')){	
	function summary_file_upload($image,$path){  
		$error = array();     
		$_FILES['summary_file']['name']= $image['name'];
		$_FILES['summary_file']['type']= $image['type'];
		$_FILES['summary_file']['tmp_name']= $image['tmp_name'];
		$_FILES['summary_file']['error']= $image['error'];
		$_FILES['summary_file']['size']= $image['size']; 
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}
		$ci =& get_instance();
		$config['upload_path'] = ''.$path.'';
		$config['allowed_types'] = 'jpg|pdf|docx|pptx|txt|xlsx|rar|zip|xlsm|xls|csv|xlsb|xlw|xltx';
		$config['max_width'] = '400000';
		$config['max_height'] = '400000';
		$ci->load->library('upload', $config);
		$ci->upload->initialize($config);
		if(!$ci->upload->do_upload('summary_file')){ 

			$error = array('error' => $ci->upload->display_errors());
			$error['status'] = 'error';
			return $error;
            
		}
		else
		{
			$file_detail = $ci->upload->data();				
			return	$file_detail['file_name'];			
		}
		return FALSE;
	}
}

if(!function_exists('lead_file_upload')){	
	function lead_file_upload($image,$path){  
		$error = array();     
		$_FILES['lead_file']['name']= $image['name'];
		$_FILES['lead_file']['type']= $image['type'];
		$_FILES['lead_file']['tmp_name']= $image['tmp_name'];
		$_FILES['lead_file']['error']= $image['error'];
		$_FILES['lead_file']['size']= $image['size']; 
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}
		$ci =& get_instance();
		$config['upload_path'] = ''.$path.'';
		$config['allowed_types'] = 'xlsx|xlsm|xls|csv|xlsb|xlw|xltx';
		$config['max_width'] = '400000';
		$config['max_height'] = '400000';
		$ci->load->library('upload', $config);
		$ci->upload->initialize($config);
		$count=0;
        $fp = fopen($_FILES['lead_file']['tmp_name'],'r') or die("can't open file");
        echo '<pre>';
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['lead_name'] = $csv_line[0];//remove if you want to have primary key,
                $insert_csv['status'] = $csv_line[1];
                $insert_csv['lead_type'] = $csv_line[2];
                $insert_csv['upload_year'] = isset($csv_line[3]) ? $csv_line[3] : date('Y');
                $insert_csv['upload_month'] = isset($csv_line[4]) ? $csv_line[4] : date('m');
                $results[$j] = array(
                    'lead_name' => $csv_line[0]
                );
            }
            $dddd[] = $insert_csv;
            $i++;
            $data = array(
                'lead_name' => $insert_csv['lead_name'],
                'status' => $insert_csv['status'],
                'lead_type' => $insert_csv['lead_type'],
                'upload_year' => $insert_csv['lead_year'],
                'upload_month' => $insert_csv['lead_month'],                
            );
        }     
 
        fclose($fp) or die("can't close file");
        $data['success']="success";
        
		if(!$ci->upload->do_upload('lead_file')){ 
          
			$error = array('error' => $ci->upload->display_errors());

			$error['status'] = 'error';
			return $error;
            
		}
		else
		{
			$file_detail = $ci->upload->data();				
			return	$dddd;			
		}
 		return FALSE;
	}
}
?>