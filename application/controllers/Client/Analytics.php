<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytics extends Client_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_data(){
        
    }
    
    public function index()
    {
        if($_POST){
            $year = $_POST['analytics_year'];
        } else{
            $year = date("Y");
        }
        $query2 = "SELECT lead_type, upload_year, upload_month FROM leads where upload_year LIKE '$year'";
        $datas= $this->admin_m->rawQuery($query2);

        $records2 = array();
        $i=0;
        foreach($datas as $row):
            $i++;
            $records2[$row['lead_type']][$row['upload_month']][$i] = count($row['upload_month']);
        endforeach;
        //print_r(count($records2['logo']['12']));
       // exit;
        $query = "SELECT lead_type, COUNT(*) as count FROM leads where upload_year LIKE '$year' GROUP BY lead_type";
        $data=$this->admin_m->rawQuery($query);
        $records = array();
        foreach($data as $row):
            $records[$row['lead_type']] = array(
              'count' => $row['count'],
              'year' => $row['upload_year'],
              'month' => $row['upload_month'],
              'month_wise' => $records2
            );
        endforeach;
        $general['records2'] = $records2;
        $general['records'] = $records;
        $general['main_content'] = 'client/analytics/view';
        //$general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
    }
    
    public function list()
    {
        $general['records'] = $this->admin_m->get_list('leads');
        $general['main_content'] = 'client/analytics/list';
        //$general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
    }
    
    public function add()
    {
        if(!empty($_POST)):
             $s = lead_file_upload($_FILES['lead_file'],"./uploads/"."client_projects");

            foreach($s as $row => $key){
                $id = $this->admin_m->add_data('leads',$s[$row]);
            }
            if($id && $s){
                $this->session->set_flashdata('msg', '1');
                $this->session->set_flashdata('alert_data', 'Success');
                redirect('/client/analytics/index', 'refresh');
            } else{
                $this->session->set_flashdata('msg', '2');
                $this->session->set_flashdata('alert_data', 'Error');
                redirect('/client/analytics/index', 'refresh');
            }
        endif;
        $general['main_content'] = 'client/analytics/add';
        //$general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
    }
    
    public function pay($id)
    {
        if($id != 0 || $id !== 'NULL'){
          if(!empty($_POST)){
              print_r($_POST['package_price']);
              exit;
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
                  'select'=>'type',
                  'table'=>'client_project_brief',
                  'where'=>array('project_brief_id'=>$id),
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
                  $where='';
                }
                $general['packages']=$this->admin_m->get_list('packages', array('package_type'=>$where));
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
  }
}
?>
