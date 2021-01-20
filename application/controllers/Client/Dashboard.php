<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends Client_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $ss = $this->admin_m->get_single_column('client', array('client_id' => 
                $this->session->userdata('client_id')) , 'login_times');
        if ($ss->login_times > 1)
        {
            $general['records'] = $this->admin_m->get(
                array('table'=> 'client_projects',
                'where' =>  array('client_id' => 
                $this->session->userdata('client_id'))
            ));
 
            $general['main_content'] = 'client/dashboard';
            $general['permission'] = $this->permission;
            $this
                ->load
                ->view('client/inc/view', $general);
        }
        else
        {
            $general['main_content'] = 'onetime';
            $general['permission'] = $this->permission;
            $this
                ->load
                ->view('client/inc/view', $general);
        }
    }
    public function edit($table)
    {
        if ($this
            ->session
            ->userdata('user_active'))
        {
            $id = $this
                ->uri
                ->segment(3);
            $table_id = $table . '_id ';
            $data['records'] = $this
                ->admin_m
                ->get_list($table, array(
                $table_id => $id
            ));
            $data['main_content'] = 'admin/' . $table . '/edit';
            $general = $data + $this->general();
            $this
                ->load
                ->view('admin/inc/view', $general);
        }
        else
        {
            redirect('login');
        }
    }
}
?>
