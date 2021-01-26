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
    
    public function add_to_cart()
    {
        $this->load->library('cart');
        $data = array(
          'id'      =>  rand()*32,
          'qty'     => 1,
          'price'   => $_GET['price'],
          'name'    => $_GET['name'],
          // 'options' => array('Size' => 'L', 'Color' => 'Red')
        );
        $id = $this->cart->insert($data);
        if(!empty($id)){
          $this->session->set_flashdata('msg', '1');
          $this->session->set_flashdata('alert_data', 'Added To Cart');
          redirect('client/market');
        }
    }
    public function view_cart(){
      $general['main_content'] = 'client/market/cart';
      //$general['permission'] = $this->permission;
      $this->load->view('client/inc/view', $general);
    }

    public function update_cart(){
      foreach($_POST as $row => $key){
        $data[$row] = array(
          'rowid' => $key['rowid'],
          'qty'   => $key['qty']
        );
      }
      $id = $this->cart->update($data);
      if(!empty($id)){
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Cart Updated');
        redirect('client/market/view_cart');
      }
    }

    public function del_item($id){
      $id = $this->cart->remove($id);
      if(!empty($id)){
        $this->session->set_flashdata('msg', '1');
        $this->session->set_flashdata('alert_data', 'Item Removed');
        redirect('client/market/view_cart');
      }
    }
    public function pay()
    {
          if(!empty($_POST)){
              require_once('application/libraries/stripe-php/init.php');
              \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
              $chargeStripe = \Stripe\Charge::create ([
                      "amount" => 100 * $this->cart->format_number($this->cart->total()),
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
                      $this->cart->destroy();
                      $this->session->set_flashdata('msg', '1');
                      $this->session->set_flashdata('alert_data', 'Payment has been made. Kindly Log In to your Dashboard');
                      redirect('/client/market', 'refresh');
              }
          } else{
                $general['main_content'] = 'client/market/pay';
                $general['permission'] = $this->permission;
                $this->load->view('client/inc/view', $general);
          }
  
  }
}
?>
