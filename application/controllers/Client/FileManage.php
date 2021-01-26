<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FileManage extends Client_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index(){
        $general['main_content'] = 'client/files/view';
        $this->load->view('client/inc/view', $general);
	}
    
    public function add(){
        $general['main_content'] = 'client/files/view';
        $this->load->view('client/inc/view', $general);
	}
}
?>