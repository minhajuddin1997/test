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
    
    // public function add(){
    //     $client_id = $this->session->userdata('client_id');
    //     $data = $_POST['dataCards']['cards'];
    //     $count = count($data);

    //     for($i=0; $i<$count;$i++){
    //         $data = array(
    // 	       'select'=>'*',
    // 	       'table'=>'kanban',
    // 	       'where' => array('client_project_id' => $data[$i]->id),
	//         );
    //         $get = $this->admin_m->get($data);
    //         if(empty($get)){
    //             $data2 = array(
    //                 'client_id'=>1,
    //                 'client_project_id'=>$data[$i]->id,
    //                 'to_do'=>1,
    //                 'progress'=>1,
    //                 'done'=>1,
    //                 'type'=>'task',
    //             );
    //             $this->admin_m->insert(array('table'=>'kanban','content'=>$data2));
    //         }
    //     }

    //     exit;
    //     $data2 = array(
    //       'client_id'=>$client_id,
    //       'client_project_id'=>1,
    //       'to_do'=>$_POST['to_do'],
    //       'progress'=>$_POST['progress'],
    //       'done'=>$_POST['done'],
    //       'type'=>$_POST['type'],
    //     );
    //     $result = $this->admin_m->insert(array('table'=>'kanban','content'=>$data2));
    //     if($result){
    //         echo json_encode(1);
    //     } else {
    //         echo json_encode(0);
    //     }
    // }
    public function update_data(){
            $task_name = $_POST['update']['cards'];
            for($i=0; $i<count($task_name);$i++){
                $data2 = $task_name[$i]['id'];
                $datas1 = $task_name[$i]['position'];
                $name = $task_name[$i]['title'];
                $query = "UPDATE kanban SET task_name = '" . $name ."', status = '" .$datas1. "' WHERE task_id = ".$data2;
                $result = $this->admin_m->rawQuery($query);
            }
            echo json_encode($task_name);

    }
    public function kanban_data(){
        if($_POST['dd']):
            $task_id = $_POST['dd']['id'];
            $title = $_POST['dd']['title'];
            $position = $_POST['dd']['position'];
            $client_id = $_POST['dd']['client_id'];
            $query = "INSERT into kanban VALUES (null, '$task_id', '$title', '', '$position','false')";
            //$result = mysql_query($query) or die ('Could not add because: ' . mysql_error());
            $result = $this->admin_m->rawQuery($query);
            // echo json_encode($_POST);
           echo json_encode($_POST['dd']);
        endif;

        if(isset($_GET)):
            $query = "select task_name as title, status as position, task_id as id, description as description, priority as priority from kanban";
            $result = $this->admin_m->rawQuery($query);
            foreach($result as $data) {
              $arr[] = $data;
            }
            echo json_encode($arr);
        endif;	
        if(isset($_POST['del'])):
            $task_name = $_POST['update']['cards'];
            $query = "DELETE FROM kanban";
            $result = $this->admin_m->rawQuery($query);
        
            //echo $query;
        endif;
    }
}
?>