<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projects extends Client_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
    $client_id = $this->session->userdata('client_id');
    $data = array(
      'select' => '*',
      'table' => 'client_projects',
      'where' => array('client_id' => $client_id),
    );
    $general['records'] = json_decode(json_encode($this->admin_m->get($data)));
 
    $general['main_content'] = 'client/projects/list';
    $general['permission'] = $this->permission;
    $this->load->view('client/inc/view', $general);
	}

  public function list($value){
    $table = 'client_projects';     
    $general['title'] = $value;
    $general['records'] = $this->admin_m->get_list($table,array('complete_status'=>$value, 'client_id'=>$this->session->userdata('client_id')));
    $general['permission'] = $this->permission;
    $general['main_content'] = 'client/projects/list';
    $this->load->view('client/inc/view',$general);
  }

  public function add(){
    if(!empty($_POST)){
        $table='client_projects';
        // foreach($_POST as $key => $val){           
        //       if(strpos($key ,'slug') !== false){
        //         $result = check_slug($table,$this->input->post($key));          
        //         $data[$key] = $result;          
        //       }
        //       else{
        //         $data[$key] = $this->input->post($key);  
        //       }       
        // }
        
        if(!empty($_FILES['summary_file']['name']))
        {
            $record['summary_file'] = summary_file_upload($_FILES['summary_file'],"./uploads/"."client_projects");
      
        }
        //$data['client_project_members'] = json_encode($_POST['client_project_members']);
        $data['summary_file'] = $record['summary_file'];
        if(!empty($_POST['rush']) || !empty($_POST['addons'])):
            unset($_POST['rush']);
           // unset($_POST['addons']);
        endif;
        
        $id = $this->admin_m->add_data($table,$_POST);
        echo '<pre>';
        $dd= json_decode($_POST['addons'][1]);
        print_r($dd);
        exit;
        $table2='project_additional';
        if(!empty($_POST['rush']) || !empty($_POST['addons'])):
            $datad = array(
                'client_projects_id'=>$id,
                'project_additional_feature_name'=>json_decode($_POST['addons']),
                'project_additional_feature_price'=>json_decode($_POST['addons'][1]),
            );
            $addFeatures = $this->admin_m->add_data($table2,$datad);
            $data2=array(
                'client_projects_id' => $id,
                'project_additional_feature_name' => 'rush',
                'project_additional_feature_price' => '22',
            );
            $addFeature = $this->admin_m->add_data($table2,$data2);
        endif;
        $redirect = 'client/projects/pay/'.$id;
        if(!empty($id)){        
          $this->session->set_flashdata('msg', '1');
          $this->session->set_flashdata('alert_data', 'Added Successfully');
           redirect($redirect);
        } else{
          $this->session->set_flashdata('msg', '2');
          $this->session->set_flashdata('alert_data', 'Failed To Add');
          redirect($redirect);
        } 
    } else{
        $general['packages']=$this->admin_m->get_list('packages', array('package_type' => 'addon'));
        $general['records'] = $this->admin_m->get_list('client_projects');
        $general['client_records'] = $this->admin_m->get_list('client');
        $general['main_content'] = 'client/projects/add';
        $general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
    }
  }

  public function client_search(){
    echo json_encode($_GET);exit;
    $this->db->select('*');
    $this->db->from('client');
    $this->db->like('client_name',$_GET['term']);
    $query = $this->db->get();
    $json=[];
    foreach($query->result_array() as $row){
      $json[] = $row['client_name'];
    }
    if(!empty($json)){
      //echo json_encode($json);
    }  
  }

  public function view_brief_form($id){
    $res = $this->admin_m->get_single_column('client_project_brief', array('project_brief_id'=>$id, 'client_id'=>$this->session->userdata('client_id')), 'type');
    if($res->type == 'lb'){
      $table='logo_project_brief';
    } else if($res->type =='wb'){
      $table='website_project_brief';
    } else if($res->type =='cb'){
      $table='website_project_brief';
    } else{
      $table='';
    }
    $data['table'] = $table;
    $data['where'] = array('client_id'=>$this->session->userdata('client_id'));
    $data['custom_where'] = "id = '" . $id . "'";
    $data['output_type'] = 'row';

    $data2['table'] = 'client_projects';
    $data2['select'] = 'project_name, project_type';
    $data2['where'] = array('client_id'=>$this->session->userdata('client_id'));
    $data2['custom_where'] = "project_brief_id = '" . $id . "'";
    $data2['output_type'] = 'row';

    $general['type']=$res->type;
    $general['project']=$this->admin_m->get($data2);
    $general['records']=$this->admin_m->get($data);
    $general['main_content'] = 'client/projects/view';
    $general['permission'] = $this->permission;
    $this->load->view('client/inc/view', $general);
  }
  
  public function submit_brief_form($project_id){
    $data = array(
      'select' => '*',
      'table' => 'client_projects',
      'where' => array('client_projects_id' => $project_id),
    );
    $data2=array(
      'select'=>'*',
      'table'=>'department',
    );
    $general['department']=$this->admin_m->get($data2);
    $general['records']= $this->admin_m->get($data);
    $general['permission'] = $this->permission;
    $general['main_content'] = 'client/projects/project_brief';
    $this->load->view('client/inc/view', $general);
  }
  
  public function logo_brief_submit(){
    if(!empty($_POST)){
      $data2 = array(
          'client_id'=>$_POST['client_id'],
          'logo_name'=>$_POST['logo_name'],
          'slogan'=>$_POST['slogan'],
          'logo_style'=>$_POST['logo_style'],
          'look_and_feel'=>$_POST['look_and_feel'],
          'additional_comments'=>$_POST['additional_comments'],
          'upload_brief_file'=>!empty($_POST['upload_brief_file']) ? $_POST['upload_brief_file'] : '',
      );
      $result = $this->admin_m->insert(array('table'=>'logo_project_brief','content'=>$data2));
      $result2 = $this->admin_m->insert(array('table'=>'client_project_brief','content'=> array('client_id'=>$_POST['client_id'], 'project_brief_id'=>$result,'type'=>'lb'))); 
      $result1 = $this->admin_m->update_data('client_projects',array('project_brief_id'=>$result),array('client_projects_id'=>$_POST['client_projects_id']));
      if(!empty($result1) && !empty($result) && !empty($result2)) {
          echo json_encode(1);
      }
    }
  }

  public function website_brief_submit(){ 
    if(!empty($_POST)){
        $data2 = array(
            'client_id'=>$_POST['client_id'],
            'purpose_of_web'=>$_POST['purpose_of_web'],
            'title_of_web_page'=>$_POST['title_of_web_page'],
            'brief_description'=>$_POST['brief_description'],
            'target_of_audience'=>$_POST['target_of_audience'],
            'design_preferences'=>$_POST['design_preferences'],
            'additional_comments'=>$_POST['additional_comments'],
            'have_domain_name'=>$_POST['have_domain_name'],
            'upload_brief'=>!empty($_POST['upload_brief']) ? $_POST['upload_brief'] : '',
        );
        $result = $this->admin_m->insert(array('table'=>'website_project_brief','content'=> $data2));
        $result2 = $this->admin_m->insert(array('table'=>'client_project_brief','content'=> array('client_id'=>$_POST['client_id'], 'project_brief_id'=>$result,'type'=>'wb')));
        $result1 = $this->admin_m->update_data('client_projects',array('project_brief_id'=>$result),array('client_projects_id'=>$_POST['client_projects_id']));
        if(!empty($result1) && !empty($result) && !empty($result2)) {
            echo json_encode(1);
        }
    }
  }
  
  public function get_package($id){
    $data = array(
      'select'=>'package_price',
      'table'=>'packages',
      'where'=>array('id'=>$id)
    );
    $res = $this->admin_m->get($data);
    if(!empty($res)){
      echo json_encode($res);
    }
  }
  
  public function upload_project_file($id){
    $record = summary_file_upload($_FILES['summary_file'],"./uploads/"."client_projects");
    if(!isset($record['error'])):
        $table="projects_files";
        $data=array(
            'projects_files_file'=> $record,
            'extension'=> pathinfo($record, PATHINFO_EXTENSION),
            'client_projects_id'=>$id,
        );
        $res = $this->admin_m->add_data($table,$data);
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Success');
        redirect('/client/chat/details/'.$id, 'refresh');   
    else:
        $this->session->set_flashdata('msg', '2');
        $this->session->set_flashdata('alert_data', 'Error');
        redirect('/client/chat/details/'.$id, 'refresh');   
    endif;
  }
  
  public function del_project_file($id){
  
      $this->db->where('projects_files_id', $id);
      $this->db->delete('projects_files'); 
      if($this):
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Deleted');
        redirect('/client/chat/details/'.$id, 'refresh');
      else:
        $this->session->set_flashdata('msg', '2');
        $this->session->set_flashdata('alert_data', 'Error');
        redirect('/client/chat/details/'.$id, 'refresh');   
      endif;
  }
  
  public function pay($id){
    $data = array(
      'select'=>'*',
      'table'=>'client_projects',
      'where'=>array('client_projects_id'=>$id)
    );
    $getproject_Data = $this->admin_m->get($data);
    if(!empty($getproject_Data)):
        if($id != 0 || $id !== 'NULL'){
          if(!empty($_POST)){
              require_once('application/libraries/stripe-php/init.php');
              \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
              $chargeStripe = \Stripe\Charge::create ([
                      "amount" => 100 * $_POST['package_price'],
                      "currency" => "usd",
                      "source" => $this->input->post('stripeToken'),
                      "description" => "Test payment from Brand Dynasty"
              ]);
              $chargeJson = $chargeStripe->jsonSerialize();
              if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
                      $data['table'] = 'client_package';
                      $data['content'] = array(
                          'package_id' => $payment_no,
                          'status' => 'Paid',
                          'client_id'=>$_POST['client_id']
                      );
                      $SS = $this->admin_m->insert($data);
                      $datas = array(
                          'client_payments_pay_status' => 'Paid'
                      );
                      $dd = $this->admin_m->update_data('client_intake_payments', 
                          $datas, array('payment_no' => $payment_no));
                      $this->session->set_flashdata('msg', '1');
                      $this->session->set_flashdata('alert_data', 'Payment has been made. Kindly Log In to your Dashboard');
                      redirect('/client/projects/index', 'refresh');
              }
          } else{
            $data=array(
              'select'=>'department_name',
              'table'=>'department',
              'where'=>array('department_id'=>$id),
              'output_type'=>'row'
            );
            $general['search_type']=$this->admin_m->get($data);
            if($general['search_type']->type=='lb'){
              $where='lb';
            } else if($general['search_type']->type=='wb'){
              $where='wb';
            } else if($general['search_type']->type=='cb'){
              $where='cb';
            } else {
              $where='%';
            }
            $general['features']=$this->admin_m->get_list('project_additional', array('client_projects_id'=>$id));
            $general['packages']=$this->admin_m->get_list('packages', array('package_type LIKE'=>$where, 'package_type NOT LIKE'=> 'addon'));
            $general['id']=$id;
            $general['main_content'] = 'client/payment/pay';
            $general['permission'] = $this->permission;
            $this->load->view('client/inc/view', $general);
          }
        } else{
          $this->session->set_flashdata('msg', '2');
          $this->session->set_flashdata('alert_data', 'Can not pay unless you submit Brief Form.');
          redirect('client/projects/index');
        }
    else:
        $this->session->set_flashdata('msg', '2');
        $this->session->set_flashdata('alert_data', 'Project not found.');
        redirect('client/projects/index');
    endif;
  }
}
?>