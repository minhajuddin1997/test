<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(1);
class Market extends Client_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = file_get_contents('https://www.dynistybranding.com/wp-json/wc/v2/products?filter[orderby]=date_created&order=desc&consumer_key=ck_9171c5951e6e9dab7a8b88ae37c9618b31dc83b5&consumer_secret=cs_be58e4ef34c3414c6d9600f9221b9e605215e3f4');
        // $getResults = $this->admin_m->get_list('market');
        // $ss = json_decode($result);
        // if(empty($getResults)):
        //     foreach($ss as $row):
        //         $date = $row->date_created;
        //         $name = $row->name;
        //         $price = $row->price;
        //         $data = array(
        //           'product_name' =>   $row->name,
        //           'product_price' =>   $row->price,
        //           'date' =>  $row->date_created
        //         );
        //         $this->admin_m->add_data('market',$data);
        //     endforeach;
        // else:
        //     $getSingle = $this->admin_m->get_list('market',$where="",$limit="1",$order_col="date",$order_by="DESC");
        //     $dateLatest = $getSingle[0]->date;
        //     if($ss[0]->date_created == "" || empty($ss[0]->date_created)){
        //         for($i=0; i<count($ss); $i++){
        //             if($ss[$i]->date_created != "" || !empty($ss[0]->date_created)){
        //                 $secondDate = $ss[$i]->date_created;
        //                 break;
        //             }
        //         }
        //     } else{
        //         $secondDate = $ss[0]->date_created;
        //     }
        // endif;
   
        $general['records'] = json_decode($result);
        $general['main_content'] = 'client/market/view';
        //$general['permission'] = $this->permission;
        $this->load->view('client/inc/view', $general);
    }
    
    public function add_to_cart($id, $price)
    {
        $this->load->library('session');
        if(empty($session_data)){
            $data_session = [
                $is => [
                    'id' => $id,
                    'price' => $price
                ]
            ];
        }
   
       // $this->session->unset_userdata('data_session');

        $session_data = $this->session->set_userdata('data_session',$data_session);
        echo json_encode($session_data);
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
