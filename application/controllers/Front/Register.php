<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        if(!empty($_POST)){
            $web = filter_var($_POST['client_website'], FILTER_VALIDATE_URL);
            if(empty($web)){
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Website URL is not valid.');
                redirect('front/register');
                exit;
            }
            $this->form_validation->set_rules('client_email','Email','required|is_unique[client.client_email]',  array(
                'is_unique'     => 'A User is already registered with this E-mail : %s',
            ));
            $this->form_validation->set_rules('client_website','Website','required');
            $this->form_validation->set_rules('client_company','Company','required');
            $this->form_validation->set_rules('client_name','Client Name','trim|required|min_length[4]|max_length[40]');
            if(!$this->form_validation->run() == false){
                $email = $this->input->post('client_email', TRUE);
                $full_name = $this->input->post('client_name', TRUE);
                $result = $this->admin_m->add_data('client', $_POST);
                if($result){
                    $section['body'] = '<table>';
                    $section['body'] .= '<tr><td>Dear ' . $full_name . ',<br><br> You have registered at Dynasty Brandings. Please Complete the registration by clicking the link below.<td></tr>';
                    $section['body'] .= '<tr><td><br>Name: ' . $full_name . '</td></tr>';
                    $section['body'] .= '<tr><td><br>Email: ' . $email . '</td></tr>';
                    $section['body'] .= '<tr><td><br>Company: ' . $_POST['client_company'] . '</td></tr>';
                    $section['body'] .= '<tr><td><br>Website: ' . $_POST['client_website'] . '</td></tr>';
                    $section['body'] .= '<tr><td><br>Link to Follow: ' . base_url('front/register/intake/') .$result. '<br><br></td></tr>';
                    $section['body'] .= '<tr><td><br>This is a computer generated email and does not require a reply.</td></tr>';
                    $section['body'] .= '</table>';
                    // $section['subject'] = 'Complete Dynasty Registeration';
                    $body = $this->load->view('email/template', $section, TRUE);
                    $result = send_email($email, 'User Registration at Dynisty Brandings', $body);
                    $this->session->set_flashdata('msg', '1');
                    $this->session->set_flashdata('alert_data', 'A Confirmation Email has been sent to your Account');

                    return redirect('front/register');
                    }else{
                        $this->session->set_flashdata('msg', '2');
                        $this->session->set_flashdata('alert_data', 'Error in inserting data.');
                        return redirect('front/register');
                    }
            } else{
                $unique_error = strpos(validation_errors(),"A User");
                if(!empty($unique_error)){
                    $error = 'A User is already registered with this E-mail';
                } else{
                    $error = 'Invalid';
                }
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', $error);
                redirect('front/register');
            }
        } else{
            $general['developer'] = $this->admin_m->get(array('table'=>'developer', 'output_type'=>'row'));
            $general['data'] = $this->uri->segment(1);
            $general['main_content'] = 'front/register';
            $this->load->view('front/inc/view', $general);
        }
    }
    public function pay_success(){
        $general = array(
                'email'=> $this->admin_m->get_single_column('client',
                array('client_id'=>$value), 'client_email'),
                'client_amount'=>$checkPayment[0]['client_payments_amount'],
                'client_id'=>$value,
                'payment_no'=>$payment_no,
                'data'=>$this->uri->segment(1),
            );
        $general['main_content'] = 'front/payment_success';
        $this->load->view('front/inc/view', $general);
    }
    public function pay($value, $payment_no){
        if(!empty($_POST)){
            require_once('application/libraries/stripe-php/init.php');
            \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
            $chargeStripe = \Stripe\Charge::create ([
                    "amount" => 100 * $_POST['client_amount'],
                    "currency" => "usd",
                    "source" => $this->input->post('stripeToken'),
                    "description" => "Test payment from Brand Dynasty"
            ]);
            $chargeJson = $chargeStripe->jsonSerialize();
            $client_email = $_POST['client_email'];
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
                $updateLogin = $this->admin_m->update_data('client',array('client_login_detail'=>'enable'), array('client_id'=>$value));
                $dd = $this->admin_m->update_data('client_intake_payments', 
                    $datas, array('payment_no' => $payment_no));
                $getBrief = $this->admin_m->get(array('table'=>'client_project_brief', 'select'=>'project_brief_id','where'=>array('client_id'=>$value)));
                foreach($getBrief as $row){
                    $dd = $this->admin_m->update_data('client_projects', 
                    array('payment_due'=>'No'), array('project_brief_id' => $row['project_brief_id']));
                }
                
                $section['body'] = '<table>';
                $section['body'] .= '<tr><td><h2><center>Thank you for boarding at Dynisty Brandings</center></h2></td></tr>';
                $section['body'] .= "<tr><td><br><center>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled 
                it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.</center></td></tr>";
                $section['body'] .= "<tr><td><br><a href='#' >Training Demo</a><br><br></td></tr>";
                $section['body'] .= '<tr><td><br>This is a computer generated email and does not require a reply.</td></tr>';
                $section['body'] .= '</table>';
                // $section['subject'] = 'Complete Dynasty Registeration';
                $body = $this->load->view('email/template', $section, TRUE);
                $result = send_email($client_email, 'Thank You! Registration Successfull.', $body);
                
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Payment has been made. Kindly Log In to your Dashboard');
                redirect('front/register/pay_success', 'refresh');
            }
        } else{ 
            $data['table'] = 'client_intake_payments';
            $data['where'] = array('client_id'=>$value);
            $data['custom_where'] = "payment_no = '" . $payment_no . "'";
            $data['where'] = "client_payments_pay_status = '".'Hold'."'";
            $checkPayment = $this->admin_m->get($data); 
            if($checkPayment){ 
                $general = array(
                    'email'=> $this->admin_m->get_single_column('client',
                    array('client_id'=>$value), 'client_email'),
                    'client_amount'=>$checkPayment[0]['client_payments_amount'],
                    'client_id'=>$value,
                    'payment_no'=>$payment_no,
                    'data'=>$this->uri->segment(1),
                );
                $general['main_content'] = 'front/pay';
                $this->load->view('front/inc/view', $general);
            } else{
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Expired URL or Payment Already Made');
                redirect('front/register', 'refresh');
            }
        }
    }

    public function intake_upload(){ 
        $image = brief_file_upload($_FILES['upload_brief_file']);
        echo json_encode($image);
    }

    public function creative_brief_submit(){
        if(!empty($_POST)){
            $data2 = array(
                'client_id'=>$_POST['client_id'],
                'content_tone'=>$_POST['content_tone'],
                'content_manner'=>$_POST['content_manner'],
                'business_objectives'=>$_POST['business_objectives'],
                'business_description'=>$_POST['business_description'],
                'testimonials'=>$_POST['testimonials'],
                'target_of_audience'=>$_POST['target_of_audience'],
                'unique_selling_point'=>$_POST['unique_selling_point'],
                'word_count'=>$_POST['word_count'],
                'upload_brief'=>!empty($_FILES['upload_brief']['name']) ? $_FILES['upload_brief']['name'] : '',
            );
            
            $file = brief_file_upload($_FILES['upload_brief']);
            if(!empty($file['status'])){
                if($file['status'] == 'error'){
                    $file_status = 0;   
                }
            } else{
                $file_status = 1;
            }
            if($file_status == 1):
                $data = array(
                    'client_id'=>$_POST['client_id'],
                    'project_name'=>$_POST['project_name'],
                    'project_type'=>$_POST['project_type'],
                    'project_brief_id'=>$result,
                    'delivery_status'=>'In-Progress'
                );  
                $result1 = $this->admin_m->insert(array('table'=>'client_projects', 'content'=>$data));
                $result2 = $this->admin_m->insert(array('table'=>'client_project_brief', 
                'content'=> array('client_id'=>$_POST['client_id'], 'client_project_id'=>$result1, 
                'data' => json_encode($data2) ,'type'=>'cb')));
                $result3 = $this->admin_m->update_data('client_projects', array('project_brief_id'=>$result2), array('client_projects_id'=>$result1));
                if(!empty($result1) && !empty($result2) && !empty($result3) && $file_status == 1) {
                    echo json_encode(1);
                } else{
                    echo json_encode(0);
                }
            else:
                echo json_encode(0);
            endif;
        }
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
                'upload_brief_file'=>!empty($_FILES['upload_brief_file']['name']) ? $_FILES['upload_brief_file']['name'] : '',
            );

            $file = brief_file_upload($_FILES['upload_brief_file']);
            if(!empty($file['status'])){
                if($file['status'] == 'error'){
                    $file_status = 0;   
                }
            } else{
                $file_status = 1;
            }
            if($file_status == 1):
                $data = array(
                    'client_id'=>$_POST['client_id'],
                    'project_name'=>$_POST['project_name'],
                    'project_type'=>$_POST['project_type'],
                    'project_brief_id'=>$result,
                    'delivery_status'=>'In-Progress'
                );  
                $result1 = $this->admin_m->insert(array('table'=>'client_projects', 'content'=>$data));
                $result2 = $this->admin_m->insert(array('table'=>'client_project_brief','content'=> array('client_id'=>$_POST['client_id'], 'client_project_id'=>$result1, 
                'data' => json_encode($data2) ,'type'=>'lb')));
                $result3 = $this->admin_m->update_data('client_projects', array('project_brief_id'=>$result2), array('client_projects_id'=>$result1));
                if(!empty($result1) && !empty($result2) && !empty($result3) && $file_status == 1) {
                    echo json_encode(1);
                } else{
                    echo json_encode(0);
                }
            else:
                echo json_encode(0);
            endif;
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
                'upload_brief'=>!empty($_FILES['upload_brief']) ? $_FILES['upload_brief'] : '',
            );
            
            $file = brief_file_upload($_FILES['upload_brief']);
            if(!empty($file['status'])){
                if($file['status'] == 'error'){
                    $file_status = 0;   
                }
            } else{
                $file_status = 1;
            }
            
            if($file_status == 1):
                $data = array(
                    'client_id'=>$_POST['client_id'],
                    'project_name'=>$_POST['project_name'],
                    'project_type'=>$_POST['project_type'],
                    'project_brief_id'=>$result,
                    'delivery_status'=>'In-Progress'
                );  
                $result1 = $this->admin_m->insert(array('table'=>'client_projects','content'=>$data));
                $result2 = $this->admin_m->insert(array('table'=>'client_project_brief',
                'content'=> array('client_id'=>$_POST['client_id'], 'client_project_id'=>$result1, 
                'data' => json_encode($data2) ,'type'=>'wb')));
                $result3 = $this->admin_m->update_data('client_projects', array('project_brief_id'=>$result2), array('client_projects_id'=>$result1));
                if(!empty($result1) && !empty($result3) && !empty($result2) && $file_status == 1) {
                    echo json_encode(1);
                } else{
                    echo json_encode(0);
                }
            else:
                echo json_encode(0);
            endif;
        }
    }

    public function get_logo_packages($val){
        $data = array(
            'select' => '*',
            'table' => 'client_project_brief',
            'where' => array('client_id' => $val, 'type'=>'lb')
        );
        $result = $this->admin_m->get($data);
        if(!empty($result)){
            echo json_encode($result);
        }
    }

    public function get_creative_packages($val){
        $data = array(
            'select' => '*',
            'table' => 'client_project_brief',
            'where' => array('client_id' => $val, 'type'=>'cb')
        );
        $result = $this->admin_m->get($data);
        if(!empty($result)){
            echo json_encode($result);
        }
    }

    public function get_website_packages($val){
        $data = array(
            'select' => '*',
            'table' => 'client_project_brief',
            'where' => array('client_id' => $val, 'type'=>'wb')
        );
        $result = $this->admin_m->get($data);
        if(!empty($result)){
            echo json_encode($result);
        }
    }

    public function intake($value){
        if(!empty($_POST)){
            $data = array(
                'select' => '*',
                'table' => 'client',
                'where' => array('client_id' => $value)
            );
            $getStagingClient = $this->admin_m->get($data);
            foreach($getStagingClient as $row){
                $client_name = $row['client_name'];
                $client_email = $row['client_email'];
                $client_date = $row['client_date'];
            }
            if($_POST['finish'] == 'consult' || $_POST['finish'] == 'pay'){
                $_POST['client_login_detail'] = 'enable';
            } else{
                $_POST['client_login_detail'] = 'disable';
            }
            if($_POST['finish'] == 'consult'){
                $_POST['role_id'] = '3';
            } else{
                $_POST['role_id'] = '2';
            }
            $data = array(
                'client_phone_number' => $_POST['client_phone_number'],
                'client_password' => $_POST['client_password'],
                'client_login_detail' => $_POST['client_login_detail'],
                'client_country' => $_POST['client_country'],
                'client_address' => $_POST['client_address'],
                'role_id' => $_POST['role_id'],
            );
            $sum =0;
            foreach($_POST['packages'] as $row):
                $price = $this->admin_m->get_single_column('packages',
                    array('id'=>$row),'package_price');
                $sum += $price->package_price;
            endforeach;
            $rand = strtoupper(substr(uniqid(sha1(time())),0,5));
            $insertinClientPayment['table'] = 'client_intake_payments';
            $insertinClientPayment['content'] = array(
                'client_id' => $value,
                'payment_no' => $rand,
                'client_payments_amount' => $sum,
                'uploaded_month' => date('m'),
                'year' => date('y'),
                'client_payments_pay_status' => 'Hold'
            );
            $insert = $this->admin_m->insert($insertinClientPayment);
            $insertDataClient = $this->admin_m->update_data('client', $data, array('client_id'=>$value));
            if($_POST['finish'] == 'consult'){
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Success! You have been registered as Prospect.');
                redirect('client/login');
                exit;
            }

            if($insertDataClient && $insert){
                redirect('front/register/pay/'.$value.'/'.$rand);
            } else{
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Error occured');
                redirect('front/register/intake');
            }
        } else{
            $data = array(
                'table' => 'client',
                'where' => array('client_id' => $value)
            );
            $res = $this->admin_m->get($data);
            if(!empty($res)){
                $general['logo_brief']=$this->admin_m->getCount(array('table'=>'client_project_brief', 'where'=>array('client_id'=>$value,'type'=>'lb')));
                $general['web_brief']=$this->admin_m->getCount(array('table'=>'client_project_brief', 'where'=>array('client_id'=>$value,'type'=>'wb')));
                $general['creative_brief']=$this->admin_m->getCount(array('table'=>'client_project_brief', 'where'=>array('client_id'=>$value,'type'=>'cb')));
                $general['department'] = $this->admin_m->get_list('department');
                $general['packages'] = $this->admin_m->get_list('packages');
                $general['records'] = $value;
                $general['info'] = $this->admin_m->get(array('table'=>'client','where'=>array('client_id'=>$value),'output_type'=>'row'));
                $general['data'] = $this->uri->segment(1);
                $general['main_content'] = 'front/intake';
                $this->load->view('front/inc/view', $general);
            } 
            if(empty($res)){
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Not exists or Link expired.');
                redirect('front/register');
            }
        }
    }
    
    public function not_found(){
        $general['main_content'] = 'front/not_found';
        $this->load->view('front/inc/view', $general);
    }
}
?>