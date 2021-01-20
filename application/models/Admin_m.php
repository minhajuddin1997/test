<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
    public function insert($data){
        $this->db->insert($data['table'],$data['content']);
        return $this->db->insert_id();
    }
    public function get_value_by_id($table = "",$id = "",$field = ""){
		$this->db->select($field)->where($table.'_id',$id);
        $query = $this->db->get($table);
        $result = $query->row();
        return $result;
	}
	public function get_value_by_id_new($table = "",$field = "", $where){
		$this->db->select($field)->where($where);
        $query = $this->db->get($table);
        $result = $query->row();
        return $result;
	}
    public function checkExistingData($data){
         //check whether user data already exists in database with same oauth info
        $this->db->select('*');
        $this->db->from($data['table']);
        $this->db->where($data['where']);
        $results = $this->db->get();
        $ret = $results->row();
        if($ret){
            if($ret->client_login_detail == 'disable'){
                return count($results->result_array()) > 0 ? 1 : 0;
            } else{
                return 0;
            }
        }
    }
    public function get_list_single($tabel="",$where=""){
		$this->db->select('*');
        $this->db->from($tabel);
        $this->db->where($where);
        $results = $this->db->get();
		if($results){
			return $results->result();
		}	
	}
    public function update_data($tabel,$data,$where){
        $this->db->where($where); 
        $ss = $this->db->update($tabel, $data);
        if($ss){
            return $ss; 
        }
    }
    public function rawQuery($query){
        $sql=$query;    
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	public function get($data){
        if(isset($data['select']) && !empty($data['select'])){
            $this->db->select($data['select']);
        }
        if(isset($data['select_max']) && !empty($data['select_max'])){
            $this->db->select_max($data['select_max']); 
        }
        if(isset($data['select_min']) && !empty($data['select_min'])){
            $this->db->select_min($data['select_min']);
        }
        
        if(isset($data['select_avg']) && !empty($data['select_avg'])){
            $this->db->select_avg($data['select_avg']);
        }
        if(isset($data['select_sum']) && !empty($data['select_sum'])){
            $this->db->select_sum($data['select_sum']);
        }
        if(!empty($data['join_array']) && is_array($data['join_array'])){
          foreach($data['join_array'] as $record){
            $this->db->join($record['join_table'],$record['join'],$record['join_type']);
          } 
        }
        if(!empty($data['join'])){               
            $this->db->join($data['join_table'],$data['join'],$data['join_type']);
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->db->where($data['where']);
        }
        
        if(isset($data['custom_where']) && !empty($data['custom_where'])){
            if(is_array($data['custom_where'])){
                $output = null; 
                $i = 0;
                foreach($data['custom_where'] as $rec){
                    $output .= $i > 0 ?' AND ':'';
                    $output .= $rec;
                    $i++;
                }
                $this->db->where($output); 
            }else{
                $this->db->where($data['custom_where']);
            }
        }
        if(isset($data['or_where']) && !empty($data['or_where'])){
            $this->db->or_where($data['or_where']);
        }
        if(isset($data['or_where_in']) && !empty($data['or_where_in'])){
            $this->db->or_where_in($data['or_where_in']); 
        }       
        if(!empty($data['where_not_in_key']) && !empty($data['where_not_in_val'])){
            $this->db->where_not_in($data['where_not_in_key'],$data['where_not_in_val']);
        }       
        if(!empty($data['like']) && !empty($data['like_col'])){
            $this->db->like($data['like_col'],$data['like']);
        }       
        if(!empty($data['or_like_col']) && !empty($data['or_like'])){ 
                $this->db->or_like($data['or_like_col'],$data['or_like'],true);
        }
        
        if(!empty($data['or_like_array']) && is_array($data['or_like_array'])){
            foreach($data['or_like_array'] as $record){
                if(!empty($record['or_like_col']) && !empty($record['or_like'])){
                    $this->db->or_like($record['or_like_col'],$record['or_like'],true);   
                }
            }
        }  
        if(isset($data['not_like']) && !empty($data['not_like'])){ 
            $this->db->not_like($data['not_like']);
        }       
        if(isset($data['or_not_like']) && !empty($data['or_not_like'])){
            $this->db->or_not_like($data['or_not_like']);
        }
        if(isset($data['group_by']) && !empty($data['group_by'])){
            $this->db->group_by($data['group_by']);
        }       
        if(isset($data['distinct']) && !empty($data['distinct'])){
            $this->db->distinct($data['distinct']);
        }       
        if(isset($data['having']) && !empty($data['having'])){
            $this->db->having($data['having']);
        }
        if(isset($data['order_by']) && !empty($data['order_by'])){
            $this->db->order_by($data['order_by']);
        }
        if(isset($data['having']) && !empty($data['having'])){
            $this->db->having($data['having']);
        }
        if(isset($data['limit']) && !empty($data['limit'])){ 
            $this->db->limit($data['limit']);
        }
        if(!empty($data['limit']) && !empty($data['offset'])){ 
            $this->db->limit($data['limit'],$data['offset']);
        }
        if(isset($data['count_all']) && !empty($data['count_all'])){
            $this->db->count_all($data['count_all']);
        }
        
        $query = $this->db->get($data['table']);    
        
        if(isset($data['output_type']) && $data['output_type'] == 'row'){
            $result = $query->row();
        }
        elseif(isset($data['output_type']) && $data['output_type'] == 'result'){
            $result = $query->result();
        }
        else{
            $result = $query->result_array();
        }               
        return $result; 
    }
	public function add_data($tabel,$data){
		$this->db->insert($tabel,$data);
		return $this->db->insert_id();
	}
	public function get_list($tabel="",$where="",$limit="",$order_col="",$order_by="",$like=""){
		$this->db->select('*');
		$this->db->from($tabel);						
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		if($order_by){
			$this->db->order_by($order_col, $order_by);
		}	
		if($like){
			$this->db->like($order_col,$like);
		}	
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}
	public function get_single_column($tabel="",$where="",$field=""){
		$this->db->select($field);
		$this->db->from($tabel);
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();

		if($result){
			return $result;
		}else{
			return;
		}  
	}
    public function getCount($data=''){
        if (isset($data['where']) && !empty($data['where'])) {
            $this->db->where($data['where']);
        }
        return $this->db->count_all_results($data['table']);
    }
     public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('customer_id');
            $this->db->from('users');
            $this->db->where('');
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();

            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();

                //update user data
                $userData['customer_updated_at'] = date("Y-m-d H:i:s");
                $update = $this->db->update('customer', $userData, array('customer_id' => $prevResult['customer_id']));

                //get user ID
                $userID = $prevResult['customer_id'];
            }else{
                //insert user data
                $userData['customer_created_at']  = date("Y-m-d H:i:s");
                $userData['customer_updated_at'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert('customer', $userData);

                //get user ID
                $userID = $this->db->insert_id();
            }
        }
        //return user ID
        return $userID?$userID:FALSE;
    }
}
?>