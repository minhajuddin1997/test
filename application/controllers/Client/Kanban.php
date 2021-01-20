<?php
class Kanban extends Client_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
   
            $general['developer'] = $this->admin_m->get(array('table'=>'developer', 'output_type'=>'row'));
            $general['main_content'] ='client/kanban/view';
            $this->load->view('client/inc/view', $general);

    }
    
    public function add(){
        $client_id = $this->session->userdata('client_id');
        $data = $_POST['dataCards']['cards'];
        $count = count($data);

        for($i=0; $i<$count;$i++){
            $data = array(
    	       'select'=>'*',
    	       'table'=>'kanban',
    	       'where' => array('client_project_id' => $data[$i]->id),
	        );
            $get = $this->admin_m->get($data);
            if(empty($get)){
                $data2 = array(
                    'client_id'=>1,
                    'client_project_id'=>$data[$i]->id,
                    'to_do'=>1,
                    'progress'=>1,
                    'done'=>1,
                    'type'=>'task',
                );
                $this->admin_m->insert(array('table'=>'kanban','content'=>$data2));
            }
        }

        exit;
        $data2 = array(
          'client_id'=>$client_id,
          'client_project_id'=>1,
          'to_do'=>$_POST['to_do'],
          'progress'=>$_POST['progress'],
          'done'=>$_POST['done'],
          'type'=>$_POST['type'],
        );
        $result = $this->admin_m->insert(array('table'=>'kanban','content'=>$data2));
        if($result){
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }
    
}
?>