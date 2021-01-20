<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Market extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = file_get_contents('https://www.dynistybranding.com/wp-json/wc/v2/products?consumer_key=ck_9171c5951e6e9dab7a8b88ae37c9618b31dc83b5&consumer_secret=cs_be58e4ef34c3414c6d9600f9221b9e605215e3f4&per_page=2');
        $general['records'] = json_decode($result);
        $general['main_content'] = 'admin/market/view';
        //$general['permission'] = $this->permission;
        $this->load->view('admin/inc/view', $general);
    }

}
?>
